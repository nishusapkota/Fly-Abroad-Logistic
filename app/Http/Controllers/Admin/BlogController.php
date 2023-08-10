<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{

    public function index()
    {

        return response()->json([
            'status' => 200,
            'data' => BlogResource::collection(Blog::all())
        ]);
    }

    public function changeStatus($id) {
        $blog =Blog::findOrFail($id);
        if($blog->visibility == 1){
            $blog->update([
                'visibility' => 0
            ]);
        }else{
            $blog->update([
                'visibility' => 1
            ]);
        }     
}

    public function store(StoreBlogRequest $request)
    {
        $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('blog'), $img_name);
        Blog::create([
            'image' => 'blog/' . $img_name,
            'title' => $request->title,
            'description' => $request->description,
            // 'visibility' => $request->visibility ? '1' : '0'
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Blog Created Successfully...'
        ]);
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            if ($request->hasFile('image')) {
                if ($blog->image) {
                    // Delete the existing image before uploading the new one
                    unlink(public_path($blog->image));
                }
                $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('blog'), $img_name);
            }
            // You should move the creation of the $img_name above this line to avoid potential undefined variable error.
            $blog->update([
                'image' => isset($img_name) ? 'blog/' . $img_name : $blog->image,
                'title' => $request->title,
                'description' => $request->description,
                // 'visibility' => $request->visibility ? '1' : '0'
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Blog Updated Successfully...'
            ]);
        } else {
            return response()->json([
                'status' => 404, // Change the status code to indicate "Not Found"
                'message' => 'Record not found...'
            ]);
        }
    }

    public function destroy($id)
    {
        try{
            $blog = Blog::find($id);
            unlink(public_path($blog->image));
            $blog->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Blog deleted successfully..'
            ]);
        }catch(ModelNotFoundException $exception){
            return response()->json([
                'status' => 200,
                'message' => 'Record not found..'
            ]);
        }
    }
}
