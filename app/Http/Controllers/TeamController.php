<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TeamController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $team = Team::where('nama','LIKE','%' .$request->search. '%')-> paginate(20);
        }
        else{
            $team = Team::orderBy('created_at', 'DESC')->paginate(20);
        }
        return view('Teams.index', compact('team'));
    }

    public function tim(Request $request){
        if($request->has('search')){
            $team = Team::where('team','LIKE','%' .$request->search. '%')-> paginate(20);
        }
        else{
            $team = Team::orderBy('created_at', 'DESC')->paginate(20);
        }
        return view('Teams.index', compact('team'));
    }

    public function create(){
        return view('Teams.create');
    }

    public function post(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'team' => 'required',
        ]);

        $auto =['table'=>'teams','length'=>8,'prefix'=>'T-'];
        $id = IdGenerator::generate($auto);
        Team::create([
            'id' => $id,
            'nama' => $request->nama,
            'team' => $request->team,
        ]);
        return Redirect('/teams')->with('sukses','data berhasill ditambahkan');;
    }

    public function getTeam($id){
        $decryptID = Crypt::decryptString($id);
        $dataT = Team::find($decryptID);
        return view('Teams.update', compact('dataT'));
    }

    public function udpateT($id, Request $request){
        $team = Team::find($id);
        $team->update($request->all());
        return redirect('/teams')->with('sukses','data berhasill di update');
    }

    public function deleteT($id){
        $team = Team::find($id);
        $team->delete();
        return redirect('/teams');
    }
}
