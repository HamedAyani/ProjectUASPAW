@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    {{-- <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1> --}}
    <form method="POST" action="{{ url('dashboard/admin/'.$modeladmin->isbn) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{ $modeladmin->isbn }}" readonly>
        </div>
        <div class="form-group">
            <label for="Judul Buku">Judul Buku</label>
            <input type="text" class="form-control" name="judulBuku" value="{{ $modeladmin->judulBuku }}" readonly>
        </div>
        <div class="form-group">
            <label for="Stock Buku">Stock Buku</label>
            <input type="number" class="form-control" name="stokBuku" value="{{ $modeladmin->stokBuku }}">
        </div>
        <div class="form-group">
            <label for="Lokasi Buku">Lokasi Buku</label>
            <input type="text" class="form-control" name="lokasiBuku" value="{{ $modeladmin->lokasiBuku }}" readonly>
        </div>
        <div class="form-group">
            <label for="Sampul Buku">Sampul Buku</label>
            <input type="file" class="form-control" name="sampulBuku" value="{{ $modeladmin->sampulBuku }}" readonly>
            @if(strlen($modeladmin->sampulBuku) > 0)
                <img src="{{ asset('sampul/'.$modeladmin->sampulBuku) }}" height="100" alt="">
            @endif
        </div>
    
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        
    
    </form>
</div>    
@endsection