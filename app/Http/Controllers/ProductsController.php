<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Support\Facades\Storage;
use UxWeb\SweetAlert\SweetAlert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products/index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // cek inputan != null
        if($request->name == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->price == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->stock == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->weight == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->description == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        
        // cek inputan harga dan stok
        if ($request->price < 1) 
        {
            alert()->warning('Jumlah inputan minimal 1', 'Warning !!!');
            return back();
        }
        elseif ($request->stock < 0) 
        {
            alert()->warning('Jumlah inputan minimal 0', 'Warning !!!');
            return back();
        }
        elseif ($request->weight < 0) 
        {
            alert()->warning('Jumlah inputan minimal 0', 'Warning !!!');
            return back();
        }

        $data = new Product();
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->stock = $request->get('stock');
        $data->weight = $request->get('weight');
        $data->description = $request->get('description');
        if($request->hasFile('photo'))
        {
            $photo = $request->file('photo')->store('products', 'public');
            $data->photo = $photo;
        }
        $data->save();
        alert()->success('Create Success', 'Create Product');
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products/show', compact('product'));
        //return view('lokasi', compact('nama_model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view ('products/edit', compact('product'));
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
        // cek inputan != null
        if($request->name == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->price == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->stock == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->weight == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        elseif($request->description == null)
        {
            alert()->warning('Harap isi seluruh form', 'Warning !!!');
            return back();
        }
        
        // cek inputan harga dan stok
        if ($request->price < 1) 
        {
            alert()->warning('Jumlah inputan minimal 1', 'Warning !!!');
            return back();
        }
        elseif ($request->stock < 0) 
        {
            alert()->warning('Jumlah inputan minimal 0', 'Warning !!!');
            return back();
        }
        elseif ($request->weight < 0) 
        {
            alert()->warning('Jumlah inputan minimal 0', 'Warning !!!');
            return back();
        }

        $data = Product::findOrFail($id);
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->stock = $request->get('stock');
        $data->weight = $request->get('weight');
        $data->description = $request->get('description');
        if($request->hasFile('photo'))
        {
            if ($data->photo && file_exists(storage_path('app/public/'.$data->photo))) {
                Storage::delete('public', $data->photo);
            }
            $photo = $request->file('photo')->store('products', 'public');
            $data->photo = $photo;
        }
        $data->save();
        alert()->success('Update Success', 'Update Product');
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        \Storage::delete('public', $product->photo);
        alert()->success('Delete Success', 'Delete Product');
        return redirect('/products')->with('status', 'Data Berhasil Dihapus');
    }
}
