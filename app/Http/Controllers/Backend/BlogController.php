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

    /////////////////////////// BLOG POST METHOD ///////////////////////////////

    public function AllBlogPost()
    {
        
        $blogpost = BlogPost::latest()->get();

        return view('backend.blog.post.blogpost_all', compact('blogpost'));

    }//End Method

    public function AddBlogPost()
    {

        $blogcategory = BlogCategory::latest()->get();
        
        return view('backend.blog.post.blogpost_add', compact('blogcategory'));

    }//End Method

    public function StoreBlogPost(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1103,906)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        BlogPost::insert([

            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Post Insertado en el Blog Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.blog.post')->with($notification);


    }//End method

    public function EditBlogPost($id)
    {
        
        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        
        return view('backend.blog.post.blogpost_edit', compact('blogcategory', 'blogpost'));

    }//End method

    public function UpdateBlogPost(Request $request)
    {
        $post_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('post_image')) {

            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1103,906)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            BlogPost::findOrFail($post_id)->update([

                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'post_image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Post de Blog e Imagen Actualizado Correctamente',
                'alert-type' => 'success',
            );

            return redirect()->route('admin.blog.post')->with($notification);
        }else {

            BlogPost::findOrFail($post_id)->update([

                'category_id' => $request->category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Post de Blog Actualizado Correctamente',
                'alert-type' => 'success',
            );

            return redirect()->route('admin.blog.post')->with($notification);

        }
        
    }//End method

    public function DeleteBlogPost($id)
    {
        
        $blogpost = BlogPost::findOrFail($id);
        $img = $blogpost->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Post de Blog Eliminado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

}
