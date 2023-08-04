<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $data['settings'] = Setting::first()->toArray();
        return view('admin.setting.index',$data);
    }

    public function store(Request $request)
    {
    $settings = Setting::first();

    if ($request->file('logo')) {
      $file = $request->file('logo');
      $extension = $file->getClientOriginalExtension(); // you can also use file name
      $fileName = 'logo.' . $extension;
      $path = public_path() . '/uploads/posts/setting';
      $file->move($path, $fileName);

      $settings->logo = '/uploads/posts/setting/' . $fileName;
      File::delete($settings->logo_icon);
    }

    $settings->nama_web = $request->get('nama_web');
    $settings->meta_keyword = $request->get('meta_keyword');
    $settings->meta_desc = $request->get('meta_desc');
    $settings->desc = $request->get('desc');
    $settings->alamat = $request->get('alamat');
    $settings->email = $request->get('email');
    $settings->url_facebook = $request->get('url_facebook');
    $settings->url_instagram = $request->get('url_instagram');
    $settings->url_twitter = $request->get('url_twitter');
    $settings->url_youtube = $request->get('url_youtube');
    $settings->phone = $this->gantiformat($request->get('phone'));
    $settings->url_tiktok = $request->get('url_tiktok');
    $settings->long = $request->get('long');
    $settings->lat = $request->get('lat');
    $settings->save();
    Alert::Success('Success','Data Berhasil Diupdate');
    return redirect(route('admin.setting.index'));
  }

  private function gantiformat($nomorhp)
  {
    //Terlebih dahulu kita trim dl
    $nomorhp = trim($nomorhp);
   //bersihkan dari karakter yang tidak perlu
    $nomorhp = strip_tags($nomorhp);
   // Berishkan dari spasi
   $nomorhp= str_replace(" ","",$nomorhp);
   // bersihkan dari bentuk seperti  (022) 66677788
    $nomorhp= str_replace("(","",$nomorhp);
   // bersihkan dari format yang ada titik seperti 0811.222.333.4
    $nomorhp= str_replace(".","",$nomorhp);

    //cek apakah mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($nomorhp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nomorhp), 0, 3)=='+62'){
            $nomorhp= trim($nomorhp);
        }
        // cek apakah no hp karakter 1 adalah 0
       elseif(substr($nomorhp, 0, 1)=='0'){
            $nomorhp= '+62'.substr($nomorhp, 1);
        }
    }
    return $nomorhp;
    }

}

