@extends('layouts/sidebar')

@section('title')
<title>Musae Chips - Finances</title>
@endsection

@section('content')
  <div class="container">
    
    <div class="row">
        <div class="col-xl-5 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="h5 mb-1 font-weight-bold text-dark text-center">Omset</div>
                @foreach($orders as $order)
                  <div class="row">
                    <div class="col">
                      <div class="h5 mb-1 text-s font-weight-bold text-primary">{{ date('d-m-Y', strtotime($order->created_at)) }}</div>
                    </div>
                    <div class="col">
                      <div class="h5 mb-1 text-s font-weight-bold text-primary">= Rp. {{ number_format ($order->total_price) }}</div>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>

        <div class="col-xl col-md mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="h5 mb-1 font-weight-bold text-dark text-center">Pengeluaran</div>
                @foreach($spendings as $spending)
                  <div class="row">
                    <div class="col">
                      <div class="h5 mb-1 text-s font-weight-bold text-primary">{{ date('d-m-Y', strtotime($spending->created_at)) }}</div>
                    </div>
                    <div class="col">
                      <div class="h5 mb-1 text-s font-weight-bold text-primary">{{ $spending->name }}</div>
                    </div>
                    <div class="col">
                      <div class="h5 mb-1 text-s font-weight-bold text-primary">= Rp. {{ number_format ($spending->price) }}</div>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-5 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">Total Omset</div>
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">Total Pengeluaran</div>
                  <hr class="sidebar-divider my-0">
                  <div class="h5 mt-1 text-s font-weight-bold text-primary">Laba</div>
                </div>
                <div class="col">
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">= Rp. {{(number_format ($omset))}}</div>
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">= Rp. {{(number_format ($pengeluaran))}}</div>
                  <hr class="sidebar-divider my-0">
                  <div class="h5 mt-1 text-s font-weight-bold text-primary">= Rp. {{(number_format ($laba))}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

  </div>
@endsection