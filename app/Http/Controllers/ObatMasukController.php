<?php

namespace App\Http\Controllers;

use App\Models\ObatMasuk;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ObatMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obat_masuks = ObatMasuk::latest()->get();
    
        return view('obat_masuk.index',compact('obat_masuks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $obats = Obat::all(); 
        return view('obat_masuk.create',compact('obats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(Request $request)
    {   
        // $this->validate($request, [
        //     'distributor' => 'required',
        //     'id_obat' => 'required',      
        //     'jumlah' => 'required',
        //     'tanggal_masuk' => 'required'            
        // ]);

        // $distributor = $request->input('distributor');
        // $tanggal_masuk = $request->input('tanggal_masuk');
        // $data = Obat::all(); 
        // return compact('obats');
        
        //   // Insert Obat Racikan sebanyak yang diinputkan
        // for ($i=0; $i < count($data['obats']); $i++) {
        //     $this->insert([
        //         'id_obat' => $data['obats'][$i],
        //         'distributor' => $distributor,
        //         'tanggal_masuk' => $tanggal_masuk,
        //         'jumlah' => $data['jumlah'][$i],
        //     ]);
        //     DB::table('obats')->where('id', $data['obats'][$i])->increment('stok', $data['jumlah'][$i]);
        // }

        // OLD
        // dd($request->all());

        $request->validate([
            'distributor' => 'required',
            'id_obat' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required'             
        ]);
        DB::table('obats')->where('id',$request->id_obat)->increment('stok',$request->jumlah);
    
        ObatMasuk::create($request->all());

        // OLD
     
        // 3 menampilkan pesan sukses sewaktu berhasil input data
        return redirect()->route('obatmasuk.index')
                        ->with('success','Input data berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         // tampil data
         $obatMasuk = ObatMasuk::find($id);
         // dd($jenisObat);
         return view('obat_masuk.show',compact('obatMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //
        $obatMasuk = ObatMasuk::find($id);
        $obats = Obat::all(); 
        return view('obat_masuk.edit',compact('obatMasuk','obats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //
        $request->validate([
            'distributor' => 'required',
            'id_obat' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        $obatMasuk = ObatMasuk::find($id);
        
        DB::table('obats')->where('id',$request->id_obat)->decrement('stok',$obatMasuk->jumlah);
        DB::table('obats')->where('id',$request->id_obat)->increment('stok',$request->jumlah);

        ObatMasuk::where('id', $id)->update([
            'distributor' => $request->distributor,
            'id_obat' => $request->id_obat,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk, // get value form name =  nama
        ]);
        
        return redirect()->route('obatmasuk.index')
                        ->with('success','Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obatMasuk = ObatMasuk::find($id);
        // $obatMasuk = ObatMasuk::find($id_obat);
        DB::table('obats')->where('id',$obatMasuk->id_obat)->decrement('stok',$obatMasuk->jumlah);
        // DB::table('obats')->where('id',$id)->decrement('stok',$obatMasuk->jumlah);
       
        ObatMasuk::find($id)->delete();
        

        // query builder
        // JenisObat::where('id',$id)->delete();
    
        return redirect()->route('obatmasuk.index')
                        ->with('success','Hapus data berhasil!');
    }
}
