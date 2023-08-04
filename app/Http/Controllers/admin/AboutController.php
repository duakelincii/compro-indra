<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function index()
    {
        $data['abouts'] = about::all();
        return view('admin.about.index', $data);
    }

    public function edit($id)
    {
        $data['item'] = about::findOrFail($id);
        return view('admin.about.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $abouts = about::findOrFail($id);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = 'logo.' . $extension;
            $path = public_path() . '/uploads/posts/about';
            $file->move($path, $fileName);

            $abouts->logo = '/uploads/posts/about/' . $fileName;
            File::delete($abouts->logo_icon);
        }

        $abouts->desc = $request->get('desc');
        $abouts->visi = $request->get('visi');
        $abouts->misi = $request->get('misi');
        $abouts->lang = $request->get('lang');
        $abouts->save();
        Alert::Success('Success', 'Data Berhasil Diupdate');
        return redirect(route('admin.about.index'));
    }

    public function message()
    {
        $data['message'] = Message::orderBy('id', 'DESC')->get();
        return view('admin.message.index', $data);
    }
}
