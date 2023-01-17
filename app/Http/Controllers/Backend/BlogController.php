<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    
    public function AllBlogCategory()
    {
        
        $blogcategories = BlogCategory::latest()->get();

        return view('backend.blog.category.blogcategory_all', compact('blogcategories'));

    }//End Method

    public function AddBlogCategory()
    {
        
        return view('backend.blog.category.blogcategory_add');

    }//End Method

    public function StoreBlogCategory(Request $request)
    {
        BlogCategory::insert([

            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Categoría de Blog Insertada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.blog.category')->with($notification);


    }//End method

    public function EditBlogCategory($id)
    {
        
        $blogcategories = BlogCategory::findOrFail($id);

        return view('backend.blog.category.blogcategory_edit', compact('blogcategories'));

    }//End method

    public function UpdateBlogCategory(Request $request)
    {

        $blog_id = $request->id;
        
        BlogCategory::findOrFail($blog_id)->update([

            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Categoría de Blog Actualizada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.blog.category')->with($notification);

    }//End method

    public function DeleteBlogCategory($id)
    {
        
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Categoría de Blog Eliminada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        

    }//End method

}