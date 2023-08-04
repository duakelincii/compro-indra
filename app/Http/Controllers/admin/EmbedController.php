<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Embed;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmbedController extends Controller
{
    public function index()
    {
        $data['embed'] = Embed::all();
        // dd($data);
        return view('admin.embed.index', $data);
    }

    public function create()
    {
        return view('admin.embed.create');
    }
    public function edit($id)
    {
        $item = Embed::findOrFail($id);
        return view('admin.embed.edit', compact('item'));
    }
    public function store(Request $request)
    {
        Embed::create($request->all());
        Alert::Success('Berhasil', 'embed Berhasil Diupdate');
        return back();
    }
    public function update(Request $request, $id)
    {
        $item = Embed::findOrFail($id);
        $item->update($request->except('_token'));
        Alert::Success('Update', 'embed Berhasil Diupdate');
        return back();
    }
    public function destroy($id)
    {

        $item = Embed::findOrFail($id);
        $item->delete();
        Alert::Error('Delete', 'embed Berhasil Dihapus');
        return back();
    }
}
