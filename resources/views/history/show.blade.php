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
        <p class="text-center font-weight-bold">Kami Akan Cek Pembayaranmu Segera</p>

    @elseif($order->status == 3)
        <p class="text-center font-weight-bold">Terimakasih Atas Pembayarannya</p>
        <p class="text-center font-weight-bold">Paket Kamu Akan Segera Kami Kirimkan</p>

    @elseif($order->status == 4)
        <p class="text-center font-weight-bold">Paket Kamu Sedang Dalam Pengiriman</p>
    
    @elseif($order->status == 5)
        <p class="text-center font-weight-bold">Paket Kamu Telah Sampai</p>

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
                        <td>
                            <a class="text-dark" href="{{ url ('products') }}/{{ $order_detail->product_id }}">{{ $order_detail->product->name }}</a>
                        </td>
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
                        <td class="font-weight-bold" colspan="5" align="right">Ongkir</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->ongkir) }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" colspan="5" align="right">Total Yang Harus Dibayar</td>
                        <td class="font-weight-bold" align="left">Rp. {{ number_format($order->total_price+$order->code+$order->ongkir) }}</td>
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
            @endif 
            
            <a class="btn btn-primary" href="{{ url('history') }}/{{ $order->id }}/{{ 'info' }}">Rincian Pembayaran</a>

            @if(\Auth::user()->hasAnyRole('admin'))
                @if($order->status == 3)
                    <form action="{{ url('history') }}/{{ $order->id }}/{{ 'verifikasi-pengiriman' }}" method="post" class="d-inline">
                    @csrf
                        <button type="submit" class="btn btn-warning"><i class="fa fa-info mr-1"></i>Verifikasi Pengiriman</button>
                    </form>
                @endif  
            @endif

            @if(\Auth::user()->hasAnyRole('admin'))
            @elseif($order->status == 4)
                <form action="{{ url('history') }}/{{ $order->id }}/{{ 'verifikasi-selesai' }}" method="post" class="d-inline">
                @csrf
                    <button type="submit" class="btn btn-warning"><i class="fa fa-info mr-1"></i>Verifikasi Barang Telah Diterima</button>
                </form>
			@endif

        </div>
    </div>
    
</div>

@endsection