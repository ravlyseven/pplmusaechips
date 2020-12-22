@extends('layouts/sidebar')

@section('title')
<title>Products</title>
@endsection

@section('content')
    <div class="container-fluid">
    @guest
    @else
        @if(\Auth::user()->hasAnyRole('admin'))
        <a href="products/create" class="btn btn-warning ml-3 mb-3">Tambah Data</a>
        @endif
    @endguest

        <div class="row">
            <!-- Tampilan Produk -->
            @foreach($products as $product)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <img class="img-thumbnail bg-warning" src="{{ asset('storage/'.$product->photo) }}">
                            </div>
                            <div class="col mr-2">
                                <a href="products/{{ $product->id }}">
                                <div class="h5 mb-1 text-s font-weight-bold text-primary">{{$product->name}}</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($product->price) }}</div>
                                </a>

                                @guest
                                @else
                                    @if(\Auth::user()->hasAnyRole('admin'))
                                    <a class="btn btn-primary" href="products/{{ $product->id }}/edit" class="card-link">Ubah</a>
                                    <form action="products/{{ $product->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    @endif
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

