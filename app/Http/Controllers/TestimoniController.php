<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testimoni;
use Illuminate\Support\Facades\DB;
use Session;

class TestimoniController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $testimonis = testimoni::with('biodata')->where('status','setuju')->get();
        return view('testii', ['testim'=> $testimonis]);
    }

    public function ktAlumni(Request $request){
        $tambah = new testimoni([
            'idUser' => $request->input('idUser'),
            'testimoni' => $request->input('testimoni')
        ]);
        $tambah->save();
  
        return redirect('/formAlumni');
    }

    public function show(){
        $testimonis = testimoni::with('biodata')->get();
        return view('listTesti', compact('testimonis'));
    }
    
    public function destroy($id_testimoni){
        $testimonis = testimoni::where('_id', $id_testimoni);
        $testimonis->delete();
        return redirect('/listTestii');
    }

    public function update(Request $request){
        $testimonis = testimoni::where('status', $request->status)->update(['status'=> 'ya']);
        return redirect('/listTestii');
    }

    public function testi(){
        $testimonis= testimoni::where('status', 'setuju')->get();
        return view('testi', compact('listTestii'));
    }

    public function statusTesti(Request $request,$id_testimoni){
        $testimonis= testimoni::where('_id', $id_testimoni)->first();
        $testimonis->status=$request->input('status');
        $testimonis->note=$request->input('note');
        $testimonis->save();
        return redirect('/listTestii');
    }

}
