<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function index()
    {
        $Data = Banner::all();
        return view('admin.Banner.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Banner.create');
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
            'img' => 'mimes:png,jpg,jpeg|required'
        ]);

        $gambar = $request->img;
        $new_gambar = date('siHdmY') . '.webp';

        $post = Banner::create([
            'title' => $request->title,
            'img' => 'uploads/posts/banner/' . $new_gambar,
            'status' => 0
        ]);

        $gambar->move(public_path('uploads/posts/banner/'), $new_gambar);

        Alert::Success('Success', 'Banner Anda Berhasil Disimpan');
        // $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = Banner::findorfail($id);

        return view('admin.Banner.edit', compact('item'));
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

        $banner = Banner::findorfail($id);

        if ($request->hasFile('img')) {
            $gambar = $request->img;
            $new_gambar = date('siHdmY') . '.webp';
            $gambar->move(public_path('uploads/posts/banner/'), $new_gambar);
            $post_data = [
                'title' => $request->title,
                'img' => 'uploads/posts/banner/' . $new_gambar,
            ];
        } else {
            $post_data = [
                'title' => $request->title,
            ];
        }

        $banner->update($post_data);

        Alert::Success('Success', 'Banner Anda Berhasil DiUpdate');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Banner = Banner::findorfail($id);
        $Banner->delete();
        Alert::Error('Delete', 'Banner Berhasil Dihapus');
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $type = $request['status_type'];
        foreach ($request['status'] as $id => $status) {
            $banner = Banner::find($id);

            $banner['status'] = $type;
            $banner->save();
        }
        Alert::Success('Berhasil', 'Berhasil Mengupdate Status Banner');
        return redirect(route('admin.banner.index'));
    }
}
