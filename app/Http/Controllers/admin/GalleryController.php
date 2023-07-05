<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        $Data = Gallery::all();
        return view('admin.gallery.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->img;
        $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();

        $post = Gallery::create([
            'img' => 'uploads/posts/gallery/' . $new_gambar,
        ]);

        $gambar->move(public_path('uploads/posts/gallery/'), $new_gambar);

        Alert::Success('Success', 'gallery Anda Berhasil Disimpan');
        // $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = gallery::findorfail($id);

        return view('admin.gallery.edit', compact('item'));
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

        $gallery = Gallery::findorfail($id);

        if ($request->hasFile('img')) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/posts/gallery/'), $new_gambar);
            $post_data = [
                'img' => 'uploads/posts/gallery/' . $new_gambar,
            ];
        }

        $gallery->update($post_data);

        Alert::Success('Success', 'gallery Anda Berhasil DiUpdate');
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findorfail($id);
        $gallery->delete();
        Alert::Error('Delete', 'gallery Berhasil Dihapus');
        return redirect()->back();
    }
}
