<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        // return view('blogs.index');
        $blogs = Blog::all();
        // return view('blogs.index', ['blogitems'=> $blogs]);
        // return view('blogs.index', compact('blogs'));
        return view('blogs.index', get_defined_vars());
    }
    public function addblogs()
    {
        return view('blogs.addblog');
    }
    public function save(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|string|min:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'author' => 'required|string|max:255',
        ]);

        $data = $request->only(['title', 'desc' , 'author']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
            $data['image'] = 'uploads/blogs/' . $imageName;
        }

        $newBlog = Blog::create($data);

        return redirect(route('blogs.index'));
    }
    public function edit(Blog $blog)
    {
        // dd($blog);
        return view('blogs.editblog', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|string|min:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'author' => 'required|string|max:255',
        ]);

        $blog = Blog::findOrFail($id);

        // Update blog
        $blog->update([
            'title' => $data['title'],
            'desc' => $data['desc'],
            'author' => $data['author'],
        ]);
        // dd($blog);

        return redirect(route('blogs.index'))->with('Success', 'Blog Edited');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();
        return redirect(route('blogs.index'));
    }

    // public function destroy($id)
    // {
    //     try {
    //         $blog = Blog::findOrFail($id);

    //         $blog->delete();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Item deleted successfully.'
    //         ], 200);
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Item not found.'
    //         ], 404);
    //     } catch (\Exception $e) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred while deleting the item.',
    //             'error' => env('APP_DEBUG') ? $e->getMessage() : 'Please try again later.' // Show error details only in debug mode
    //         ], 500);
    //     }
    // }
}
