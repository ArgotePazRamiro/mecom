<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class CategoryController extends Controller
{
    
    public function AllCategory()
    {

        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));

    }//End method

    public function AddCategory()
    {
        return view('backend.category.category_add');
    }//End method

    public function StoreCategory(Request $request)
    {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        Category::insert([

            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Categoría Insertada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.category')->with($notification);


    }//End method

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }//End method

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('category_image')) {

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(120,120)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Categoría e Imagen Actualizada Correctamente',
                'alert-type' => 'success',
            );

            return redirect()->route('all.category')->with($notification);
        }else {
            Category::findOrFail($cat_id)->update([

                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            ]);

            $notification = array(
                'message' => 'Categoría Actualizada Correctamente',
                'alert-type' => 'success',
            );

            return redirect()->route('all.category')->with($notification);
        }
        
    }//End method

    public function DeleteCategory($id)
    {
        
        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Categoría Eliminada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method



}
