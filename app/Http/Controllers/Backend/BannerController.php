<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class BannerController extends Controller
{
    
    public function AllBanner()
    {

        $banner = Banner::latest()->get();
        return view('backend.banner.banner_all', compact('banner'));

    }//End method

    public function AddBanner()
    {

        return view('backend.banner.banner_add');

    }//End method

    public function StoreBanner(Request $request)
    {
        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
        $save_url = 'upload/banner/'.$name_gen;

        Banner::insert([

            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Banner Insertado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.banner')->with($notification);


    }//End method

    public function EditBanner($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.banner_edit', compact('banner'));
    }//End method

    public function UpdateBanner(Request $request)
    {
        $banner_id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('banner_image')) {

            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
            $save_url = 'upload/banner/'.$name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'banner_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Banner e Imagen Actualizado Correctamente',
                'alert-type' => 'success',
            );

            return redirect()->route('all.banner')->with($notification);
        }else {
            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Banner Actualizado Correctamente',
                'alert-type' => 'success',
            );

            return redirect()->route('all.banner')->with($notification);
        }
    }//End method

    public function DeleteBanner($id)
    {
        
        $banner = Banner::findOrFail($id);
        $img = $banner->banner_image;
        unlink($img);

        Banner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Banner Eliminado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method




}
