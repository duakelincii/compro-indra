<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UrlController extends Controller
{
    public function index()
    {
        $Data = Url::all();
        return view('admin.url.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.url.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Url::create($request->all());
        Alert::Success('Success', 'url Anda Berhasil Disimpan');
        // $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = Url::findorfail($id);

        return view('admin.url.edit', compact('item'));
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

        $url = Url::findorfail($id);
        $url->update($request->except('_token'));

        Alert::Success('Success', 'url Anda Berhasil DiUpdate');
        return redirect()->route('admin.url.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = Url::findorfail($id);
        $url->delete();
        Alert::Error('Delete', 'url Berhasil Dihapus');
        return redirect()->back();
    }
}
