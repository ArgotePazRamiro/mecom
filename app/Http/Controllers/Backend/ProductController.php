<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function AllProduct()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));

    }//End method

    public function AddProduct()
    {
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.product_add',compact('brands','categories','activeVendor'));

    }//End method

    public function StoreProduct(Request $request)
    {
        
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            
            'selling_price' => $request->selling_price,  
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            
            'product_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        /// Multiple Image Upload ///

        $images = $request->file('multi_img');

        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);

        }//End Foreach

        /// End Multiple Image Upload ///

        $notification = array(
            'message' => 'Producto Insertado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.product')->with($notification);

    }//End method

    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id',$id)->get();
        
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('brands','categories','activeVendor','products','subcategory','multiImgs'));

    }//End method

    public function UpdateProduct(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            
            'selling_price' => $request->selling_price,  
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            
            
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Producto Actualizado Correctamente, Sin Modificar Imágenes',
            'alert-type' => 'success',
        );

        return redirect()->route('all.product')->with($notification);

    }//End method

    public function UpdateProductThambnail(Request $request)
    {
        
        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Product::findOrFail($pro_id)->update([

            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Miniatura de Producto Actualizada Satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    //Multi Image Update
    public function UpdateProductMultiimage(Request $request)
    {
        
        $imgs = $request->multi_img;
        
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([

                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

        }//End Foreach

        $notification = array(
            'message' => 'Imagen de Producto Actualizada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    public function MultiImageDelete($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Imagen de Producto Eliminada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    public function ProductInactive($id)
    {
        
        Product::findOrFail($id)->Update(['status' => 0]);

        $notification = array(
            'message' => 'Producto Inactivo',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        
    }//End method

    public function ProductActive($id)
    {
        
        Product::findOrFail($id)->Update(['status' => 1]);

        $notification = array(
            'message' => 'Producto Activo',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        
    }//End method

    public function ProductDelete($id)
    {
        
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $imges = MultiImg::where('product_id',$id)->get();
        foreach ($imges as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Producto Eliminado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    public function ProductStock()
    {
        
        $products = Product::latest()->get();

        return view('backend.product.product_stock', compact('products'));

    }//End method

}
