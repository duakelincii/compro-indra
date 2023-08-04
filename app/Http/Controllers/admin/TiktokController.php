<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tiktok;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TiktokController extends Controller
{
    public function index()
    {
        $data['tiktok'] = Tiktok::all();
        // dd($data);
        return view('admin.tiktok.index', $data);
    }

    public function create()
    {
        return view('admin.tiktok.create');
    }
    public function edit($id)
    {
        $item = Tiktok::findOrFail($id);
        return view('admin.tiktok.edit', compact('item'));
    }
    public function store(Request $request)
    {
        Tiktok::create($request->all());
        Alert::Success('Berhasil', 'Tiktok Berhasil Diupdate');
        return back();
    }
    public function update(Request $request, $id)
    {
        $item = Tiktok::findOrFail($id);
        $item->update($request->except('_token'));
        Alert::Success('Update', 'Tiktok Berhasil Diupdate');
        return back();
    }
    public function destroy($id)
    {

        $item = Tiktok::findOrFail($id);
        $item->delete();
        Alert::Error('Delete', 'Tiktok Berhasil Dihapus');
        return back();
    }

    public function status(Request $request)
    {
        $type = $request['status_type'];
        foreach ($request['status'] as $id => $status) {
            $banner = Tiktok::find($id);

            $banner['show'] = $type;
            $banner->save();
        }
        Alert::Success('Berhasil', 'Berhasil Mengupdate Status Tiktok');
        return back();
    }

    public function video($id)
    {
        $item = Tiktok::findOrFail($id);
        return view('admin.tiktok.video',compact('item'));
    }
}
