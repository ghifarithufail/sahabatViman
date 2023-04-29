<?php

namespace App\Http\Controllers;

use App\Models\DataKelurahan;
use App\Models\Koord_desa;
use App\Models\Koord_kecamatan;
use Illuminate\Http\Request;
use PDF;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Crypt;

class KoordDesaController extends Controller
{
    public function koord_desa(Request $request){
        if($request->has('search')){
            $Koord_desa = Koord_desa::where('nama','LIKE','%' .$request->search. '%')-> paginate(10);
        }
        else{
            $Koord_desa = Koord_desa::orderBy('created_at', 'DESC')
            ->paginate(10);
        }
        return view('koord_desa.index', compact('Koord_desa'));
    }

    public function cari(Request $request){
        if($request->has('search')){
            $Koord_desa = Koord_desa::where('deskripsi','LIKE','%' .$request->search. '%')-> paginate(20);
        }
        else{
            $Koord_desa = Koord_desa::orderBy('created_at', 'DESC')
            ->with('Koord_kecamatans','Datakelurahans')
            ->paginate(20);
        }
        return view('koord_desa.index', compact('Koord_desa'));
    }

    public function postKD(){
        $dataKoord_kecamatan = Koord_kecamatan::all();
        $dataKelurahan = DataKelurahan::all();
        return view('koord_desa.create', compact('dataKoord_kecamatan','dataKelurahan'));
    }

    public function kDStore(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'deskripsi' => 'required',
            'Koord_kecamatan_id' => 'required',
            'dapil' => 'required',
        ]);
        $auto =['table'=>'koord_desas','length'=>8,'prefix'=>'DS-'];
        $id = IdGenerator::generate($auto);
        Koord_desa::create([
            'id' => $id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'Koord_kecamatan_id' => $request->Koord_kecamatan_id,
            'dapil' => $request->dapil
        ]);
        // $Koord_desa = Koord_desa::create($request->all());
        // $Koord_desa->save();
        return Redirect()->route('koord_desa')->with('sukses','data berhasill ditambahkan');;
    }

    public function getKoord_desa($id){
        $decryptID = Crypt::decryptString($id);
        $dataKD = Koord_desa::find($decryptID);
        $Koord_desa = Koord_desa::with('data_relawan','Koord_kecamatans');
        $dataKoord_kecamatan = Koord_kecamatan::all();
        return view('koord_desa.update', compact('dataKD','dataKoord_kecamatan','Koord_desa'));
    }

    public function updateKD($id, Request $request){
        $Koord_desa = Koord_desa::find($id);
        $Koord_desa->update($request->all());
        return redirect()->route('koord_desa')->with('sukses','data berhasill di update');
    }

    public function deleteKD($id){
        $Koord_desa = Koord_desa::find($id);
        $Koord_desa->delete();
        return redirect()-> route('koord_desa');
    }

    public function viewPDF(){
        $Koord_desa = Koord_desa::with('data_relawan','Koord_kecamatans')->get();
        return view('koord_desa.pdf', compact('Koord_desa'));
    }
}
