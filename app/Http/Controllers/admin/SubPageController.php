<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubPage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class SubPageController extends Controller
{
    public function index()
    {
        $Data = SubPage::all();
        return view('admin.subpage.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subpage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->type);
        SubPage::create($request->all());
        Alert::Success('Success', 'SubPage Anda Berhasil Disimpan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = SubPage::findorfail($id);

        return view('admin.subpage.edit', compact('item'));
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

        $subpage = SubPage::findorfail($id);
        $request['slug'] = Str::slug($request->type);
        $subpage->update($request->except('_token'));

        Alert::Success('Success', 'SubPage Anda Berhasil DiUpdate');
        return redirect()->route('admin.subpage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subpage = SubPage::findorfail($id);
        $subpage->delete();
        Alert::Error('Delete', 'SubPage Berhasil Dihapus');
        return redirect()->back();
    }
}
