@extends('layouts/sidebar')

@section('title')
<title>Orders</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\Cart::getContent()->toArray() as $item)
                            <tr>
                                <td>{{$item['name']}}</td>
                                <td>Rp {{number_format($item['price'])}}</td>
                                <td>{{$item['quantity']}}</td>
                                <td>
                                    @php
                                        $total = intVal($item['price']) * intVal($item['quantity'])
                                    @endphp
                                    <p>Rp {{number_format($total)}}</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="{{url('remove-from-cart', $item['id'])}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>

@endsection