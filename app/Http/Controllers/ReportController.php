<?php

namespace App\Http\Controllers;

use App\Models\DataKelurahan;
use App\Models\Kelurahan;
use App\Models\KelurahanData;
use App\Models\Koord_desa;
use App\Models\Koord_kecamatan;
use App\Models\Relawan;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function allData(Request $request){
        $jumlahuser = User::count();
        $jumlahdesa = Koord_desa::count();
        $jumlahkecamatan = Koord_kecamatan::count();
        $jumlahrelawan = Relawan::count();
        $jumlahtim = Team::count();

        $total = Relawan::select(DB::raw("COUNT(*) as total"))
        ->whereYear("created_at",date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('total');

        return view('home' ,compact('jumlahuser','jumlahdesa','jumlahkecamatan','jumlahrelawan','jumlahtim','total'));
    }

    // ------------------------------------- DATA RELAWAN REPORT ------------------------------------- //

    public function dataRelawan(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('user_id','LIKE','%' .$request->search. '%')->with('user','Koord_desas','Datakelurahans')->paginate(100);
        }
        else{
            $relawan = Relawan::paginate(10);
        }
        return view('data_relawan.index', compact('relawan'));
    }

    public function dataRelawans(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('nama','LIKE','%' .$request->search. '%')->paginate(100);
        }
        else{
            $relawan = Relawan::orderBy('created_at', 'DESC')
            ->paginate(10);
        }
        return view('data_relawan.index', compact('relawan'));
    }

    public function verifikasi(Request $request){
        if($request->has('search')){
            $relawan = Relawan::where('is_visible','LIKE','%' .$request->search. '%')->paginate(100);
        }
        else{
            $relawan = Relawan::paginate(10);
        }
        return view('data_relawan.index', compact('relawan'));
    }

    public function detail(User $user){

        $relawan = $user->datarelawans;
        $iya = $user->datarelawans->where('is_visible','iya')->count();
        $belum = $user->datarelawans->where('is_visible','belum')->count();
        $tidak = $user->datarelawans->where('is_visible','tidak')->count();

        return view('report.user.pdf', compact('relawan','iya','belum','tidak'));
    }

    public function pdf(User $user){

        $relawan = $user->datarelawans;

        return view('report.user.detail', compact('relawan'));
    }


    public function viewPDF(){
        $relawan = Relawan::with('user','Koord_desas','Datakelurahans')->get();
        return view('data_relawan.pdf', compact('relawan'));
    }

    public function getDataRelawan($id){
        $data = relawan::find($id);
        $desa = Koord_desa::all();
        $datakelurahan = KelurahanData::all();
        return view('data_relawan.update', compact('data','desa','datakelurahan'));
    }

    public function udpateDR($id, Request $request){
        $relawan = relawan::find($id);
        $relawan->update($request->all());
        return redirect('/data-relawan')->with('sukses','data berhasill di update');
    }

    // ------------------------------------- DATA KELURAHAN REPORT ------------------------------------- //

    public function datakelurahan(Request $request){
        if($request->has('search')){
            $kelurahan = KelurahanData::where('kelurahan','LIKE','%' .$request->search. '%')->with('relawansData')->paginate(65);
        }
        else{
            $kelurahan = KelurahanData::with('relawansData')->paginate(10);
        }
        return view('report.kelurahan.index',compact('kelurahan'));
    }

    public function viewPDFKelurahan(){
        $kelurahan = KelurahanData::with('relawansData')->get();
        return view('report.kelurahan.pdf', compact('kelurahan'));
    }

    // ------------------------------------- DATA TEAM REPORT ------------------------------------- //
    public function dataTeam(Request $request){
        if($request->has('search')){
            $team = Team::where('nama','LIKE','%' .$request->search. '%')
            ->withCount(['kecamatans'])
            ->paginate(10);
        }
        else{
            $team = Team::withCount(['kecamatans'])->paginate(10);
        }
        return view('report.team.index',compact('team'));
    }

    public function Team(Request $request){
        if($request->has('search')){
            $team = Team::where('team','LIKE','%' .$request->search. '%')
            ->withCount(['kecamatans'])
            ->withCount(['datarelawan'])
            ->paginate(10);
        }
        else{
            $team = Team::withCount(['kecamatans','datarelawan'])->paginate(10);
        }
        return view('report.team.index',compact('team'));
    }

    public function viewPDFTim(){
        $team = Team::withCount(['kecamatans'])->get();
        return view('report.team.timPdf', compact('team'));
    }
    
    // ------------------------------------- DATA KECAMATAN REPORT ------------------------------------- //

    public function datakecamatan(Request $request){
        if($request->has('search')){
            $kecamatan = Koord_kecamatan::where('nama','LIKE','%' .$request->search. '%')
            ->withCount(['desas'])
            ->withCount(['relawans'])
            ->paginate(10);
        }
        else{
            $kecamatan = Koord_kecamatan::withCount(['desas','relawans'])->paginate(10);
        }
        return view('report.kecamatan.index',compact('kecamatan'));
    }

    public function kecamatan(Request $request){
        if($request->has('search')){
            $kecamatan = Koord_kecamatan::where('deskripsi','LIKE','%' .$request->search. '%')->withCount(['relawans'])->paginate(20);
        }
        else{
            $kecamatan = Koord_kecamatan::with(['relawans'])->paginate(20);
        }
        return view('report.kecamatan.index',compact('kecamatan'));
    }

    public function viewPDFKecamatan(){
        $kecamatan = Koord_kecamatan::with('relawans','desas')->get();
        return view('report.kecamatan.pdf', compact('kecamatan'));
    }

    // ------------------------------------- DATA DESA REPORT ------------------------------------- //

    public function reportDesa(Request $request){
        if($request->has('search')){
            $desa = Koord_desa::where('nama','LIKE','%' .$request->search. '%')->withCount('data_relawan')->paginate(10);
        }
        else{
            $desa = Koord_desa::paginate(10);
        }
        return view('report.desa.index',compact('desa'));
    }

    public function Desa(Request $request){
        if($request->has('search')){
            $desa = Koord_desa::where('deskripsi','LIKE','%' .$request->search. '%')->withCount('data_relawan')->paginate(10);
        }
        else{
            $desa = Koord_desa::with('data_relawan','Datakelurahans','Koord_kecamatans')->paginate(10);
        }
        return view('report.desa.index',compact('desa'));
    }
    

    public function viewPDFDesa(){
        $desa = Koord_desa::with('data_relawan','Datakelurahans','Koord_kecamatans')->get();
        return view('report.desa.pdf', compact('desa'));
    }

    // ------------------------------------- DATA USER REPORT ------------------------------------- //

    public function datauser(Request $request){
        if($request->has('search')){
            $user = User::where('name','LIKE','%' .$request->search. '%')->withCount('datarelawans')->paginate(10);
        }
        else{
            $user = User::paginate(10);
        }
        return view('report.user.index',compact('user'));
    }
}
