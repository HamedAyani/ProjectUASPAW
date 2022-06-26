@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1> --}}
    <form method="POST" action="{{ url('dashboard/head') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" placeholder="Masukkan isbn">
        </div>
        <div class="form-group">
            <label for="Judul Buku">Judul Buku</label>
            <input type="text" class="form-control" name="judulBuku" placeholder="Masukkan Judul Buku">
        </div>
        <div class="form-group">
            <label for="Stock Buku">Stock Buku</label>
            <input type="number" class="form-control" name="stokBuku" placeholder="Masukkan Stock Buku">
        </div>
        <div class="form-group">
            <label for="Lokasi Buku">Lokasi Buku</label>
            <input type="text" class="form-control" name="lokasiBuku" placeholder="Masukkan Lokasi Buku">
        </div>
        <div class="form-group">
            <label for="Sampul Buku">Sampul Buku</label>
            <input type="file" class="form-control" name="sampulBuku" placeholder="Masukkan Lokasi Buku">
        </div>
    
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        
    
    </form>

</div>    
@endsection