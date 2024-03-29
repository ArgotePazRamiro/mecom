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
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    
    public function VendorAllProduct()
    {
        $id = Auth::user()->id;
        $products = Product::where('vendor_id', $id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all', compact('products'));
        
    }//End method

    public function VendorAddProduct()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('vendor.backend.product.vendor_product_add',compact('brands','categories'));

    }//End method

    public function VendorGetSubCategory($category_id)
    {
        
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);

    }//End method

    public function VendorStoreProduct(Request $request)
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
            'vendor_id' => Auth::user()->id,
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
            'message' => 'Vendedor Agregó Producto Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('vendor.all.product')->with($notification);

    }//End method

    public function VendorEditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id',$id)->get();
        
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('vendor.backend.product.vendor_product_edit',compact('brands','categories','products','subcategory','multiImgs'));

    }//End method

    public function VendorUpdateProduct(Request $request)
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
            
            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Vendedor Actualizó Producto Correctamente, Sin Modificar Imágenes',
            'alert-type' => 'success',
        );

        return redirect()->route('vendor.all.product')->with($notification);

    }//End method

    public function VendorUpdateProductThabnail(Request $request)
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
            'message' => 'Vendedor Actualizó Miniatura de Producto Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    //Multi Image Update
    public function VendorUpdateProductmultiImage(Request $request)
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
            'message' => 'Vendedor Actualizó Imagen de Producto Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    public function VendorMultiimgDelete($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Vendedor Eliminó Imagen de Producto Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

    public function VendorProductInactive($id)
    {
        
        Product::findOrFail($id)->Update(['status' => 0]);

        $notification = array(
            'message' => 'Producto Inactivo',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        
    }//End method

    public function VendorProductActive($id)
    {
        
        Product::findOrFail($id)->Update(['status' => 1]);

        $notification = array(
            'message' => 'Producto Activo',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        
    }//End method

    public function VendorProductDelete($id)
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
            'message' => 'Vendedor Eliminó Producto Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method






}
