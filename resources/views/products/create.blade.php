@extends('layouts/sidebar')

@section('title')
<title>Create Products</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Products</h1>
                
                <form method="post" action="/products" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="number" class="form-control" id="price" placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" class="form-control" id="stock" placeholder="stock" name="stock">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight (gram)</label>
                        <input type="number" class="form-control" id="weight" placeholder="weight" name="weight">
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Produk</label>
                        <input type="file" class="form-control" id="photo" placeholder="photo" name="photo" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea type="text" class="form-control" id="description" placeholder="description" name="description" style="height:250px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="{{ url('products') }}" class="btn btn-danger">Kembali</a>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection