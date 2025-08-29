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
            'title' => 'required',
            'desc' => 'required',
            'author' => 'required',
        ]);

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
            'title' => 'required',
            'desc' => 'required',
            'author' => 'required',
        ]);
        
        $blog = Blog::findOrFail($id);
        
        // Update blog
        $blog->update([
            'title' => $data['title'],
            'desc' => $data['desc'],
            'author' => $data['author'],
        ]);
        // dd($blog);
        
        return redirect(route('blogs.index'))->with('Success','Blog Edited');
    }
    
    
    public function destroy($id)
{
    try {
        // 1. Find the record to delete
        $blog = Blog::findOrFail($id);
        // 2. Delete the record
        $blog->delete();
        // 3. Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully.'
        ], 200); // 200 OK status
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle the case where the item doesn't exist
        return response()->json([
            'success' => false,
            'message' => 'Item not found.'
        ], 404); // 404 Not Found status
    } catch (\Exception $e) {
        // Handle any other general exceptions (e.g., database connection issues)
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while deleting the item.',
            'error' => env('APP_DEBUG') ? $e->getMessage() : 'Please try again later.' // Show error details only in debug mode
        ], 500); // 500 Internal Server Error status
    }
}
}
