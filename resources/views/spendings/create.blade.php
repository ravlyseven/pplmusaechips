@extends('layouts/sidebar')

@section('title')
<title>Musae Chips - Create Products</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Spendings</h1>
                
                <form method="post" action="/spendings">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pengeluaran</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Biaya Pengeluaran</label>
                        <input type="text" class="form-control" id="price" placeholder="price" name="price">
                    </div>
                    
                    <button type="submit" class="btn btn-warning">Tambah Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection