<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $datas = Buku::where('isbn', 'like', '%'.$keyword.'%')
            ->orWhere('judulBuku', 'like', '%'.$keyword.'%')
            ->get();
        return view('dashboard.head.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelhead = new Buku;
        return view('dashboard.head.create', compact('modelhead'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $modelhead = new Buku;
        // $modelhead->fill($request->all());

        $modelhead->isbn = $request->isbn;
        $modelhead->judulBuku = $request->judulBuku;
        $modelhead->stokBuku = $request->stokBuku;
        $modelhead->lokasiBuku = $request->lokasiBuku;
        // $modelhead->sampulBuku = $request->sampulBuku;
        if($request->hasFile('sampulBuku')){
            $file = $request->file('sampulBuku');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('sampul', $filename);
            $modelhead->sampulBuku = $filename;
        }

        $modelhead->save();
        return redirect('dashboard/head');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        //
        $modelhead = Buku::find($isbn);
        return view('dashboard.head.edit', compact('modelhead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isbn)
    {
        //
        $modelhead = Buku::find($isbn);
        // $modelhead->fill($request->all());

        $modelhead->isbn = $request->isbn;
        $modelhead->judulBuku = $request->judulBuku;
        $modelhead->stokBuku = $request->stokBuku;
        $modelhead->lokasiBuku = $request->lokasiBuku;
        if($request->hasFile('sampulBuku')){
            $file = $request->file('sampulBuku');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('sampul', $filename);

            File::delete('sampul'.$modelhead->sampulBuku);
            
            $modelhead->sampulBuku = $filename;
        }
        $modelhead->save();
        return redirect('dashboard/head');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        //
        $modelhead = Buku::find($isbn);
        $modelhead->delete();
        return redirect('dashboard/head');

    }
}
