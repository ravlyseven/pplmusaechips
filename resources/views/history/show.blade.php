@extends('layouts/sidebar')

@section('title')
<title>Musae Chips - Order Detail</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-warning">
        <h6 class="m-0 font-weight-bold text-light">Order Detail</h6>
    </div>

    <div class="mt-3">
    @if($order->status == 1)
        <img class="rounded mx-auto d-block" width="30%;" src="{{ asset('images/rekening.jpeg') }}">
    
    
    @elseif($order->status == 2)
        <p class="text-center font-weight-bold">Terimakasih Atas Pembayarannya</p>
        <p class="text-center font-weight-bold">Paket Kamu Akan Segera Kami Kirimkan</p>

    @endif
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($order_details as $order_detail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <img width="100px;" src="{{ asset('storage/'.$order_detail->product->photo) }}">
                        </td>
                        <td>{{ $order_detail->product->name }}</td>
                        <td>{{ $order_detail->quantity }}</td>
                        <td align="left">Rp. {{ number_format($order_detail->product->price) }}</td>
                        <td align="left">Rp. {{ number_format($order_detail->total_price) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Kode Unik</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->code) }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Total Yang Harus Dibayar</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->total_price+$order->code) }}</td>
                    </tr>
                </tbody>
            </table>    
            <a class="btn btn-warning" href="{{ url('history') }}">Kembali</a>
            @if($order->status == 1)  
            <form action="{{ url('history') }}/{{ $order->id }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Batal Order</button>
            </form>
            <a class="btn btn-primary" href="{{ url('history') }}/{{ $order->id }}/{{ 'info' }}">Rincian Pembayaran</a>
            @endif  
        </div>
    </div>
    
</div>

@endsection