@extends('template')

@section('title')
Akun
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Detail Akun Admin</h1>
                				
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nama : {{ $admin->NamaAdmin }}</h5>
                        <h5 class="card-text">Password : {{ $admin->PasswordAdmin }}</h5>
                        <h5 class="card-text">Email : {{ $admin->EmailAdmin }}</h5>
                        <a href="/akun">Back</a>
                    </div>
                </div>
		
			</div>
		</div>
	</div>
@endsection