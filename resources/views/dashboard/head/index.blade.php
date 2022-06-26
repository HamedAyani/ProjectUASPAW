@extends('dashboard.layouts.main')

@section('container')
<div class="mt-3 mb-2">
    <a class="btn btn-primary mb-2" href="{{ url('dashboard/head/create') }}">Tambah Data</a>
    <form class="mb-2" action="{{ url('dashboard/head') }}" method="GET">
        <input  type="text" name="keyword" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><span data-feather="search"></span></i></button>
    </form>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    {{-- <div class="table-responsive"> --}}
        <table  class="table table-striped jambo_table bulk_action" style="text-align:center">
            <tr class="table-success mb-3">
                <th>ISBN</th>
                <th>Sampul Buku</th>
                <th>Judul Buku</th>
                <th>Stok Buku</th>
                <th>Lokasi Buku</th>
                <th colspan="3">Action</th>
            </tr>
            @foreach($datas as $value)
            <tr>
                <td>{{ $value->isbn }}</td>
                <td>
                    @if(strlen($value->sampulBuku) > 0)
                        <img src="{{ asset('sampul/'.$value->sampulBuku) }}" height="125" alt="">
                    @endif
                </td>
                <td>{{ $value->judulBuku }}</td>
                <td>{{ $value->stokBuku }}</td>
                <td>{{ $value->lokasiBuku }}</td>
                <td style="text-align:center"><a class="btn btn-warning btn-sm" href="{{ url('dashboard/head/'.$value->isbn.'/edit') }}">Edit Data</a></td>
                <form action="{{ url('dashboard/head/'.$value->isbn) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <td style="text-align:center"><button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button></td>
    
                </form>
            </tr>
            @endforeach
        {{-- </table> --}}
    </div>


</div>    
@endsection