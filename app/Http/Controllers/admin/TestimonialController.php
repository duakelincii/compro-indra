<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    public function index()
    {
        $Data = Testimonial::all();
        return view('admin.testimonial.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Testimonial::create($request->all());
        Alert::Success('Success', 'testimonial Anda Berhasil Disimpan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = Testimonial::findorfail($id);

        return view('admin.testimonial.edit', compact('item'));
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

        $testimonial = Testimonial::findorfail($id);
        $testimonial->update($request->except('_token'));

        Alert::Success('Success', 'testimonial Anda Berhasil DiUpdate');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findorfail($id);
        $testimonial->delete();
        Alert::Error('Delete', 'testimonial Berhasil Dihapus');
        return redirect()->back();
    }
}
