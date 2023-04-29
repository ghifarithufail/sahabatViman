<?php

namespace App\Http\Controllers;

use App\Models\Contoh;
use App\Models\DataKelurahan;
use App\Models\KelurahanData;
use App\Models\Koord_desa;
use App\Models\Koord_kecamatan;
use App\Models\Relawan;
use App\Models\User;
use DebugBar\RequestIdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RelawanController extends Controller
{
    public function relawan(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('nama','LIKE','%' .$request->search. '%')->paginate(10);
        }
        else{
            $relawan = Relawan::orderBy('created_at', 'DESC')
            ->paginate(10);
            // $user = User::with('datarelawans');
        }
        return view('relawan.index',['relawan' => $relawan], compact('relawan'));
    }
    

    public function verifikasi(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('is_visible','LIKE','%' .$request->search. '%')->paginate(20);
        }
        else{
            $relawan = Relawan::orderBy('created_at', 'DESC')
            ->with('user','Koord_desas','Datakelurahans')->paginate(20);
            // $relawan = Relawan::with('user')->paginate(30);
        }
        return view('relawan.index',['relawan' => $relawan], compact('relawan'));
    }

    public function postR(){
        $datakelurahan = KelurahanData::all();
        $datadesa = Koord_desa::all();
        return view('relawan.create',compact('datakelurahan','datadesa'));
    }

    public function rStore(Request $request){
        $this->validate($request,[
            'nik' => 'required|unique:relawans,nik',
            'nokk' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tps' => 'required',
            'Koord_desa_id' => 'required',
            'kelurahan_id' => 'required',
        ]);
        $relawan = new Relawan;
        $user = User::all();
        
        $relawan ->user_id = Auth::user()->id;
        $relawan->nik = $request->nik;
        $relawan->nokk  = $request->nokk;
        $relawan->nama  = $request->nama;
        $relawan->tempat_lahir  = $request->tempat_lahir;
        $relawan->tgl_lahir  = $request->tgl_lahir;
        $relawan->status  = $request->status;
        $relawan->jenis  = $request->jenis;
        $relawan->alamat  = $request->alamat;
        $relawan->rw  = $request->rw;
        $relawan->rt  = $request->rt;
        $relawan->tps  = $request->tps;
        $relawan->Koord_desa_id  = $request->Koord_desa_id;
        $relawan->kelurahan_id  = $request->kelurahan_id;


        $relawan->save();
        return Redirect('/relawan')->with('sukses','data berhasill ditambahkan');;
    }

    public function findRelawan(){
        $p = Contoh::all();

        return response()->json($p);
    }

    public function getRelawan($id){
        $decryptID = Crypt::decryptString($id);
        $data = relawan::find($decryptID);
        $desa = Koord_desa::all();
        $kelurahan = KelurahanData::all();
        return view('relawan.update', compact('data','desa','kelurahan'));
    }

    public function udpateR($id, Request $request){
        $relawan = relawan::find($id);
        $relawan->update($request->all());
        return redirect('/data-relawan')->with('sukses','data berhasill di update');
    }

    public function deleteR($id){
        $Koord_kecamatan = relawan::find($id);
        $Koord_kecamatan->delete();
        return redirect('/data-relawan');
    }
}
