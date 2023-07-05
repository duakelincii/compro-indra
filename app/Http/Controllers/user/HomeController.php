<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['product'] = Product::all();
        $data['banner'] = Banner::all();
        $data['service'] = Service::all();
        $data['blog'] = Blog::OrderBy('id','DESC')->paginate(3);
        return view('welcome',$data);
    }
}
