<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Testing;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TestingController extends Controller
{
    public function index()
    {
        $data['testings'] = Testing::all();
        return view('admin.testing.index', $data);
    }

    public function edit($id)
    {
        $data['item'] = Testing::findOrFail($id);
        return view('admin.testing.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $testings = Testing::findOrFail($id);

        $testings->desc = $request->get('desc');
        $testings->lang = $request->get('lang');
        $testings->save();
        Alert::Success('Success', 'Data Berhasil Diupdate');
        return redirect(route('admin.testing.index'));
    }

    public function message()
    {
        $data['message'] = Message::orderBy('id', 'DESC')->get();
        return view('admin.message.index', $data);
    }
}
