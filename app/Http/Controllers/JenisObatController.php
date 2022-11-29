<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;

// tipe data array di looping, datanya dikeluarkan sebagai objek

class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $jenis_obats = JenisObat::latest()->paginate(5);
    
        // return view('jenis_obat.index',compact('jenis_obats'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        // index data
        // jenis obats as array
        $jenis_obats = JenisObat::latest()->get();
    
        return view('jenis_obat.index',compact('jenis_obats'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create menu
        return view('jenis_obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1 VALIDEATE form nama
        // kalo validasi ggagal baka; dibalkin ke halaman create jenis obat 
        $request->validate([
            'nama' => 'required'            

            // ,'email' => 'required|email'            
        ]);
    
        // 2 store data atau menyimpan data ke dalam database
        // eloquent bisa
        JenisObat::create($request->all());

        // query builder juga bisa
        // DB::table('jenis_obats')->insert([
        //     'nama' => $request->nama
        // ]);
     
        // 3 menampilkan pesan sukses sewaktu berhasil input data
        return redirect()->route('jenisobat.index')
                        ->with('success','Input data berhasil!');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // tampil data
        $jenisObat = JenisObat::find($id);
        // dd($jenisObat);
        return view('jenis_obat.show',compact('jenisObat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jenisObat = JenisObat::find($id);
        return view('jenis_obat.edit',compact('jenisObat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // this id requested to update
    {
        //
        $request->validate([
            'nama' => 'required'
        ]);
    
        // $jenisObat->update($request->all());
        // update requested id
        // update nama with value dari form input
        JenisObat::where('id', $id)->update([
            'nama' => $request->nama // get value form name =  nama
        ]);
        
        return redirect()->route('jenisobat.index')
                        ->with('success','Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisObat  $jenisObat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // destroy data
        // $jenisObat->delete();

        // eloquent
        JenisObat::find($id)->delete();

        // query builder
        // JenisObat::where('id',$id)->delete();
    
        return redirect()->route('jenisobat.index')
                        ->with('success','Hapus data berhasil!');
    }
}
