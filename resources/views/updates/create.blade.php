@extends('layouts/sidebar')

@section('title')
<title>Musae Chips - Pembukuan</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Pembukuan</h1>
                
                <form method="post" action="/updates">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <textarea type="text" class="form-control" id="price" placeholder="price" name="price"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" class="form-control" id="content" placeholder="content" name="content" style="height:250px;"></textarea>
                        <!-- <input type="text" class="form-control" id="content" placeholder="" name="content" style=""> -->
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection