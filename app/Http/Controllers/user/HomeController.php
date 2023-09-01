<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Embed;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SubPage;
use App\Models\Testimonial;
use App\Models\Testing;
use App\Models\Tiktok;
use App\Models\Url;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->lang = LaravelLocalization::getCurrentLocale();
    }

    public function index()
    {
        $data['product'] = Product::where('lang', $this->lang)->inRandomOrder()->paginate(3);
        $data['banner'] = Banner::where('status', 1)->get();
        $data['service'] = Service::all();
        $data['subpage'] = SubPage::where('lang', $this->lang)->get();
        $data['blog'] = Blog::OrderBy('id', 'DESC')->where('lang', $this->lang)->paginate(3);
        $data['setting'] = Setting::first();
        $data['about'] = About::where('lang', $this->lang)->first();
        $data['faq'] = Faq::where('lang', $this->lang)->get();
        $data['testimonial'] = Testimonial::where('lang', $this->lang)->get();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        $data['tiktok'] = Tiktok::where('show', true)->paginate(3);
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.welcome', $data);
        } else {
            return view('bahasa.inggris.welcome', $data);
        }
    }

    public function about()
    {
        $data['about'] = About::where('lang', $this->lang)->first();
        $data['setting'] = Setting::first();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.about', $data);
        } else {
            return view('bahasa.inggris.about', $data);
        }
    }

    public function blog()
    {
        $data['blog'] = Blog::where('lang', $this->lang)->get();
        $data['setting'] = Setting::first();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.blog', $data);
        } else {
            return view('bahasa.inggris.blog', $data);
        }
    }

    public function faq()
    {
        $data['faq'] = Faq::all();
        $data['setting'] = Setting::first();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.faq', $data);
        } else {
            return view('bahasa.inggris.faq', $data);
        }
    }

    public function contact()
    {
        $data['setting'] = Setting::first();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.contact', $data);
        } else {
            return view('bahasa.inggris.contact', $data);
        }
    }

    public function blogDetail($slug)
    {
        $data['blog'] = Blog::where('slug', $slug)->where('lang', $this->lang)->first();
        $data['setting'] = Setting::first();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.blogDetail', $data);
        } else {
            return view('bahasa.inggris.blogDetail', $data);
        }
    }

    public function testing()
    {
        $data['testing'] = Testing::where('lang', $this->lang)->first();
        $data['setting'] = Setting::first();
        $data['url'] = Url::all();
        $data['embed'] = Embed::all();
        if ($this->lang == 'id') {
            return view('bahasa.indonesia.testing', $data);
        } else {
            return view('bahasa.inggris.testing', $data);
        }
    }

    public function store(Request $request)
    {
        Message::create($request->all());

        return back();
    }
}
