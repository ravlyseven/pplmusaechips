@extends('template')

@section('title')
Tambah Akun
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Tambah Akun Admin</h1>
                
                <form method="post" action="/akun">
                    @csrf
                    <div class="form-group">
                        <label for="NamaAdmin">Nama</label>
                        <input type="text" class="form-control" id="NamaAdmin" placeholder="Input Nama" name="NamaAdmin">
                    </div>
                    <div class="form-group">
                        <label for="PasswordAdmin">Password</label>
                        <input type="text" class="form-control" id="PasswordAdmin" placeholder="Input Password" name="PasswordAdmin">
                    </div>
                    <div class="form-group">
                        <label for="EmailAdmin">Email</label>
                        <input type="text" class="form-control" id="EmailAdmin" placeholder="Input Email" name="EmailAdmin">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
				
		
			</div>
		</div>
	</div>
@endsection