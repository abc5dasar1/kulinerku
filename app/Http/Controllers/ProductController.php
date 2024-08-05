<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $product = Product::get();
        return view('admin.product.index', compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Product::create($data);

        return redirect()->to('product')->with('message', 'Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = Product::find($id);
        return view('admin.product.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $product->update($data);

        return redirect()->to('product')->with('message', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->to('product')->with('message', 'Berhasil');
    }
}
