<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function AllSubCategory()
    {

        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_all', compact('subcategories'));

    }//End method

    public function AddSubCategory()
    {
        $categories = Category::orderBy('category_name','ASC')->get();

        return view('backend.subcategory.subcategory_add', compact('categories'));
    }//End method

    public function StoreSubCategory(Request $request)
    {
        
        SubCategory::insert([

            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'SubCategoría Insertada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subcategory')->with($notification);


    }//End method

    public function EditSubCategory($id)
    {

        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('categories', 'subcategory'));

    }//End method

    public function UpdateSubCategory(Request $request)
    {
        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([

            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'SubCategoría Actualizada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subcategory')->with($notification);

    }//End method

    public function DeleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategoría Eliminada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }//End method
    
}
