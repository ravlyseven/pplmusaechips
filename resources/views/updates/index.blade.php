@extends('layouts/sidebar')

@section('title')
<title>Updates</title>
@endsection

@section('content')
    <a href="updates/create"class="btn btn-primary ml-3 mb-3">Tambah Data</a>
    @foreach($updates as $update)
        <div class="container">
            <div class="row">
                <div class="card" style="width: 100rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$update->title}}</h5>
                        <p class="card-text">{!! Str::words($update->content) !!}
                        <a href="#">selengkapnya</a>
                        </p>
                        <a class="btn btn-primary" href="updates/{{ $update->id }}" class="card-link">Ubah</a>
                        <!-- <form action="{{ route('updates.destroy',$update->id) }}" method="post" class="d-inline"> -->
                        <form action="updates/{{ $update->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
