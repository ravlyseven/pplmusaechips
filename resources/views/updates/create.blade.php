@extends('layouts/sidebar')

@section('title')
<title>Create Updates</title>
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Data Updates</h1>
                
                <form method="post" action="/updates">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" placeholder="" name="content" style="height: 250px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection