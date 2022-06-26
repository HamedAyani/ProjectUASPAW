<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('dashboard.admin.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        //
        $modeladmin = Buku::find($isbn);
        return view('dashboard.admin.edit', compact('modeladmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isbn)
    {
        //
        $modeladmin = Buku::find($isbn);
        // $modeladmin->fill($request->all());

        $modeladmin->isbn = $request->isbn;
        $modeladmin->judulBuku = $request->judulBuku;
        $modeladmin->stokBuku = $request->stokBuku;
        $modeladmin->lokasiBuku = $request->lokasiBuku;
        $modeladmin->save();
        return redirect('dashboard/admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
