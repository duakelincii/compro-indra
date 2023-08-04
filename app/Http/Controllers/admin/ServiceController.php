<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index()
    {
        $Data = Service::all();
        // dd($Data);
        return view('admin.service.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
        $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();

        Service::create([
            'title' => $request->title,
            'img' => '/uploads/posts/service/' . $new_gambar,
            'ket' => $request->ket,
            'lang' => $request->lang
        ]);

        $gambar->move(public_path('uploads/posts/service/'), $new_gambar);
        Alert::Success('Success', 'service Anda Berhasil Disimpan');
        // $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = service::findorfail($id);

        return view('admin.service.edit', compact('item'));
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

        $service = Service::findorfail($id);

        if ($request->hasFile('img')) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/posts/service/'), $new_gambar);
            $post_data = [
                'title' => $request->title,
                'img' => '/uploads/posts/service/' . $new_gambar,
                'ket' => $request->ket,
                'lang' => $request->lang
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'ket' => $request->ket,
                'lang' => $request->lang

            ];
        }
        $service->update($post_data);
        Alert::Success('Success', 'service Anda Berhasil DiUpdate');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findorfail($id);
        $service->delete();
        Alert::Error('Delete', 'service Berhasil Dihapus');
        return redirect()->back();
    }
}
