<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $Data = Product::all();
        return view('admin.product.index', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'img' => 'mimes:png,jpg,jpeg|required|max:300'
        ]);

        $gambar = $request->img;
        $new_gambar = date('siHdmY') . '.webp';


        $post = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'slug' => Str::slug($request->name),
            'img' => 'uploads/posts/product/' . $new_gambar,
            'meta_desc' => $request->meta_desc,
            'lang' => $request->lang
        ]);

        $gambar->move(public_path('uploads/posts/product/'), $new_gambar);

        Alert::Success('Success', 'product Anda Berhasil Disimpan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = Product::findorfail($id);

        return view('admin.product.edit', compact('item'));
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
        $product = Product::findorfail($id);

        if ($request->hasFile('img')) {
            $gambar = $request->gambar;
            $new_gambar = date('siHdmY') . '.webp';
            $gambar->move(public_path('uploads/posts/product/'), $new_gambar);
            $post_data = [
                'name' => $request->name,
                'price' => $request->price,
                'slug' => Str::slug($request->name),
                'img' => 'uploads/posts/product/' . $new_gambar,
                'meta_desc' => $request->meta_desc,
                'lang' => $request->lang
            ];
        } else {
            $post_data = [
                'name' => $request->name,
                'price' => $request->price,
                'slug' => Str::slug($request->name),
                'meta_desc' => $request->meta_desc,
                'lang' => $request->lang
            ];
        }

        $product->update($post_data);

        Alert::Success('Success', 'product Anda Berhasil DiUpdate');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $product->delete();
        Alert::Error('Delete', 'product Berhasil Dihapus');
        return redirect()->back();
    }
}
