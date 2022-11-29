<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenisobats = JenisObat::all(); 
        $obats = Obat::latest()->get();    
        
        return view('obat.index',compact('obats','jenisobats'));

         // tampil data
        //  $Obat = Obat::find($id);
        //  return view('obat.show',compact('Obat'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create menu
        $jenisobats = JenisObat::all(); 
        // dd($obats);
        return view('obat.create', compact('jenisobats'));
        

        // $obats = Obat::find($id);
        // return view('obat.create')->with('obats',$obats); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // kalo validasi gagal bakal dibalkin ke halaman create jenis obat 
            // $request->validate([
            //     'nama_obat' => 'required',
            //     'id_jenis_obat' => 'required',      
            //     'harga' => 'required',
            //     'tanggal_kadaluarsa' => 'required',
                
            // ]);

            // Obat::create($request->all());

            // return redirect()->route('obat.index')
            //                 ->with('success','Input data berhasil!');
            //old no img

            $this->validate($request, [
                'nama_obat' => 'required',
                'id_jenis_obat' => 'required',      
                'harga' => 'required',
                'stok' => 'required',
                'tanggal_kadaluarsa' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'    
            ]);
    
            //upload gambar
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/medicine', $gambar->hashName());
    
            //create post
            Obat::create([
                'gambar' => $gambar->hashName(),
                'nama_obat' => $request->nama_obat,
                'id_jenis_obat' => $request->id_jenis_obat,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa
            ]);
    
            //redirect to index
            return redirect()->route('obat.index')->with('success','Input data berhasil!');
                            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                // tampil data
                $Obat = Obat::find($id);
                // dd($jenisObat);
                return view('obat.show',compact('Obat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $jenisobats = JenisObat::all(); 
        $Obat = Obat::find($id);
        return view('obat.edit',compact('Obat','jenisobats'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_obat' => 'required',
            'id_jenis_obat' => 'required',      
            'harga' => 'required',
            'stok' => 'required',   
            'tanggal_kadaluarsa' => 'required' 
            
        ]);

        Obat::where('id', $id)->update([
            'nama_obat' => $request->nama_obat, // get value form name =  nama
            'id_jenis_obat' => $request->id_jenis_obat,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa
        ]);
        
        return redirect()->route('obat.index')
                        ->with('success','Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // eloquent
        Obat::find($id)->delete();

        // query builder
        // JenisObat::where('id',$id)->delete();
    
        return redirect()->route('obat.index')
                        ->with('success','Hapus data berhasil!');
    }
}
