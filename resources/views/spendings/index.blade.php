@extends('layouts/sidebar')

@section('title')
<title>Musae Chips - Spendings</title>
@endsection

@section('content')

<!-- DataTales Example -->
<a href="spendings/create" class="btn btn-warning ml-4 mb-3">Tambah Data</a>

<div class="card shadow mx-4">
    <div class="card-header py-3 bg-gradient-warning">
        <h6 class="m-0 font-weight-bold text-light">Riwayat Pengeluaran</h6>
    </div>
            
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pengeluaran</th>
                        <th>Total Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($spendings as $spending)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $spending->updated_at }}</td>
                        <td>{{ $spending->name }}</td>
                        <td>Rp. {{ (number_format ($spending->price)) }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="spendings/{{ $spending->id }}/edit" class="card-link">Ubah</a>
                            <form action="spendings/{{ $spending->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>    
        </div>
    </div>
    
</div>

@endsection