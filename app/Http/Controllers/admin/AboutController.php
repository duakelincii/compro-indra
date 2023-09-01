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
        $abouts->desc = $request->get('desc');
        $abouts->lang = $abouts->lang;
        $abouts->save();
        Alert::Success('Success', 'Data Berhasil Diupdate');
        return redirect(route('admin.about.index'));
    }
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->move(public_path('/uploads/ckeditor'), $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/uploads/ckeditor/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function message()
    {
        $data['message'] = Message::orderBy('id', 'DESC')->get();
        return view('admin.message.index', $data);
    }
}
