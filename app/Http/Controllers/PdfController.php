<?php

namespace App\Http\Controllers;

use App\Models\DataKelurahan;
use App\Models\KelurahanData;
use App\Models\Koord_desa;
use App\Models\Koord_kecamatan;
use App\Models\Relawan;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{

    // ---------------------------- TEAM ------------------------------ //
    public function teams(Request $request){
        if($request->has('search')){
            $team = Koord_kecamatan::where('team_id','LIKE','%' .$request->search. '%')->withCount('desas')->paginate(20);
        }
        else{
            $team = Koord_kecamatan::with('desas')->paginate(20);
        }
        return view('report.team.pdf',compact('team'));
    }

    // ---------------------------- KORCAM ------------------------------ //

    public function korcam(Request $request){
        if($request->has('search')){
            $korcam = Koord_desa::where('deskripsi','LIKE','%' .$request->search. '%')->withCount('data_relawan')->paginate(20);
        }
        else{
            $korcam = Koord_desa::with('data_relawan','Datakelurahans')->paginate(20);
        }
        return view('pdf.korcam.index',compact('korcam'));
    }

    public function viewPDF(Request $request){
        if($request->has('search')){
            $korcam = Koord_desa::orderBy('created_at', 'DESC')
            ->where('Koord_kecamatan_id','LIKE','%' .$request->search. '%')
            ->with('Koord_kecamatans')
            ->get();
        }
        else{
            $korcam = Koord_desa::with('data_relawan','Datakelurahans','Koord_kecamatans')->get();
        }
        return view('report.kecamatan.pdf', compact('korcam'));
    }


    public function kordes(Request $request){
        if($request->has('search')){
            $desa = Relawan::where('Koord_desa_id','LIKE','%' .$request->search. '%')->paginate(20);
        }
        else{
            $desa = Relawan::with('user','Koord_desas','Datakelurahans')->paginate(20);
        }
        return view('pdf.kordes.index', compact('desa'));
    }

    public function PDFDesa(Request $request){
        if($request->has('search')){
            $desa = Relawan::orderBy('created_at', 'DESC')
            ->where('Koord_desa_id','LIKE','%' .$request->search. '%')
            ->with('user','Koord_desas','Datakelurahans')
            ->get();
        }
        else{
            $desa = Relawan::with('user','Koord_desas','Datakelurahans','kecamatans')->get();
        }
        return view('report.desa.pdf', compact('desa'));
    }

    public function kelurahan(Request $request){
        if($request->has('search')){
            $kelurahan = KelurahanData::where('kelurahan','LIKE','%' .$request->search. '%')->withCount('relawansData')->paginate(20);
        }
        else{
            $kelurahan = KelurahanData::with('relawansData')->paginate(20);
        }
        return view('pdf.kelurahan.index',compact('kelurahan'));
    }

    public function PDFkelurahan(Request $request){
        if($request->has('search')){
            $kelurahan = KelurahanData::where('kelurahan','LIKE','%' .$request->search. '%')->with('relawansData')->get();
        }
        else{
            $kelurahan = KelurahanData::with('relawansData')->get();
        }
        return view('report.kelurahan.pdf',compact('kelurahan'));
    }

    public function user(Request $request){
        if($request->has('search')){
            $user = User::where('name','LIKE','%' .$request->search. '%')->withCount('datarelawans')->paginate(20);
        }
        else{
            $user = User::with('datarelawans')->paginate(20);
        }
        return view('pdf.user.index',compact('user'));
    }

    public function PDFUser(Request $request){
        if($request->has('search')){
            $user = User::where('name','LIKE','%' .$request->search. '%')->with('datarelawans')->get();
        }
        else{
            $user = User::with('datarelawans')->get();
        }
        return view('pdf.user.pdf',compact('user'));
    }

    public function relawan(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('nama','LIKE','%' .$request->search. '%')->paginate(20);
        }
        else{
            $relawan = Relawan::with('user','Koord_desas','Datakelurahans')->paginate(20);
        }
        return view('pdf.relawan.index', compact('relawan'));
    }

    public function PDFRelawan(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('user_id','LIKE','%' .$request->search. '%')->with('user','Koord_desas','Datakelurahans')->get();
        }
        else{
            $relawan = Relawan::with('user','Koord_desas','Datakelurahans','korcam')->get();
        }
        return view('report.user.detail',compact('relawan'));
    }

    // public function download(Request $request){

    //     if($request->has('search')){
    //         $relawan = Relawan::where('user_id','LIKE','%' .$request->search. '%')->with('user','Koord_desas','Datakelurahans')->get();
    //     }

    //     $pdf = PDF::loadview('pdf.relawan.pdf', ['relawan'=>$relawan])->setPaper('f4', 'landscape');

    //     return $pdf->stream('relawan.pdf');
    // }
}

