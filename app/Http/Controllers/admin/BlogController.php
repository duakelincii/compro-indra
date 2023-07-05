<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function index()
    {
        $Data = Blog::all();
        return view('admin.blog.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'img' => 'mimes:png,jpg,jpeg|required'
        ]);

        $gambar = $request->img;
        $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();

        $post = Blog::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => 'uploads/posts/blog/' . $new_gambar,
            'status' => 0
        ]);

        $gambar->move(public_path('uploads/posts/blog/'), $new_gambar);

        Alert::Success('Success', 'blog Anda Berhasil Disimpan');
        // $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = Blog::findorfail($id);

        return view('admin.blog.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
        ]);

        $blog = Blog::findorfail($id);

        if ($request->hasFile('img')) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/posts/blog/'), $new_gambar);
            $post_data = [
                'title' => $request->title,
                'desc' => $request->text,
                'img' => 'uploads/posts/blog/' . $new_gambar,
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'desc' => $request->text,
            ];
        }

        $blog->update($post_data);

        Alert::Success('Success', 'blog Anda Berhasil DiUpdate');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findorfail($id);
        $blog->delete();
        Alert::Error('Delete', 'blog Berhasil Dihapus');
        return redirect()->back();
    }
}
