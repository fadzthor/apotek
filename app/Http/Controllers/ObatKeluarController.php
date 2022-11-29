<?php

namespace App\Http\Controllers;

use App\Models\ObatKeluar;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ObatKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obat_keluars = ObatKeluar::latest()->get();
    
        return view('obat_keluar.index',compact('obat_keluars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                // create menu
                $obats = Obat::all(); 
                return view('obat_keluar.create',compact('obats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_pasien' => 'required',
            'jumlah' => 'required',
            'jumlah_pembayaran' => 'required'            
        ]);
        DB::table('obats')->where('id',$request->id_obat)->decrement('stok',$request->jumlah);
    
        ObatKeluar::create($request->all());

         // 1 VALIDEATE form nama
        // kalo validasi ggagal baka; dibalkin ke halaman create jenis obat 
        // $request->validate([
        //     'nama_pasien' => 'required',
        //     'jumlah' => 'required',
        //     'jumlah_pembayaran' => 'required'
        // ]);
    
        // 2 store data atau menyimpan data ke dalam database
        // eloquent bisa
        // ObatKeluar::create($request->all());

        // query builder juga bisa
        // DB::table('jenis_obats')->insert([
        //     'nama' => $request->nama
        // ]);
     
        // 3 menampilkan pesan sukses sewaktu berhasil input data
        return redirect()->route('obatkeluar.index')
                        ->with('success','Input data berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // tampil data
          $obatKeluar = ObatKeluar::find($id);
          // dd($jenisObat);
          return view('obat_keluar.show',compact('obatKeluar'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //
         $obatKeluar = ObatKeluar::find($id);
         $obats = Obat::all(); 
         return view('obat_keluar.edit',compact('obatKeluar','obats'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_pasien' => 'required',
            'jumlah' => 'required',
            'jumlah_pembayaran' => 'required'
        ]);

        $obatKeluar = ObatKeluar::find($id);

        DB::table('obats')->where('id',$request->id_obat)->increment('stok',$obatKeluar->jumlah);
        DB::table('obats')->where('id',$request->id_obat)->decrement('stok',$request->jumlah);

        // $jenisObat->update($request->all());
        // update requested id
        // update nama with value dari form input
        ObatKeluar::where('id', $id)->update([
            'nama_pasien' => $request->nama_pasien, // get value form name =  nama
            'jumlah' => $request->jumlah,
            'jumlah_pembayaran' => $request->jumlah_pembayaran
        ]);
        
        return redirect()->route('obatkeluar.index')
                        ->with('success','Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obatKeluar = ObatKeluar::find($id);
        // $obatMasuk = ObatMasuk::find($id_obat);
        DB::table('obats')->where('id',$obatKeluar->id_obat)->increment('stok',$obatKeluar->jumlah);
        ObatKeluar::find($id)->delete();

        // query builder
        // JenisObat::where('id',$id)->delete();
    
        return redirect()->route('obatkeluar.index')
                        ->with('success','Hapus data berhasil!');
    }
}
