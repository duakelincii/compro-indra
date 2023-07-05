<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function index()
    {
        $Data = About::all();
        return view('admin.about.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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

        $post = About::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => 'uploads/posts/about/' . $new_gambar,
            'status' => 0
        ]);

        $gambar->move(public_path('uploads/posts/about/'), $new_gambar);

        Alert::Success('Success', 'about Anda Berhasil Disimpan');
        // $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = About::findorfail($id);

        return view('admin.about.edit', compact('item'));
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

        $about = About::findorfail($id);

        if ($request->hasFile('img')) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/posts/about/'), $new_gambar);
            $post_data = [
                'title' => $request->title,
                'desc' => $request->text,
                'img' => 'uploads/posts/about/' . $new_gambar,
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'desc' => $request->text,
            ];
        }

        $about->update($post_data);

        Alert::Success('Success', 'about Anda Berhasil DiUpdate');
        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findorfail($id);
        $about->delete();
        Alert::Error('Delete', 'about Berhasil Dihapus');
        return redirect()->back();
    }
}
