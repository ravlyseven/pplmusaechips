@extends('template')

@section('title')
Akun
@endsection

@section('content')
<div class="container">
		<div class="row">
			<div class="col-10">
				<h1 class="mt-3">Daftar Akun Admin</h1>
				<a href="/akun/create"class="btn btn-primary my-3">Tambah Data</a>
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scoope="col">#</th>
							<th scoope="col">Nama</th>
							<th scoope="col">Password</th>
							<th scoope="col">Email</th>
							<th scoope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
                        @foreach( $admins as $admin )
						<tr>
							<th scoope="row">{{ $loop->iteration }}</th>
							<td>{{ $admin->NamaAdmin }}</td>
                            <td>{{ $admin->PasswordAdmin }}</td>
                            <td>{{ $admin->EmailAdmin }}</td>
							<td>
								<a href="" class="badge badge-success">edit</a>
								<a href="" class="badge badge-danger">delete</a>
                                <a href="/akun/{{ $admin->id }}" class="badge bandge-info">detail</a>
							</td>
						</tr>
                        @endforeach
                    </tbody>
				</table>
		
			</div>
		</div>
	</div>
@endsection