<?php

namespace App\Http\Controllers;

use App\kabarJurusan;

use Illuminate\Http\Request;

class kabarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('showKabar', 'kabarr');
    }

    public function inpKabar(Request $request)
    {
        $file = $request->file('foto');
        $place="";
        if ($file != null) {
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->move('imgKab', $filename);
        
      
            $place='imgKab/'.$filename;
        }
       
        $add=new kabarJurusan([
          'idUser' =>$request->input('idUser'),
          'judul' => $request->input('judul'),
          'tag' => $request->input('tag'),
          'kabar' => $request->input('isi'),
          'img' => $place
        ]);
        $add->save();
      
        return redirect()->back()->with('success', 'Data telah tersimpan');
    }

    public function showKabar($id)
    {
        $kabar= kabarJurusan::where('_id', $id)->get();
        return view('showKabar', ['kabar'=>$kabar]);
    }

    public function editKabar($id)
    {
        $kabar= kabarJurusan::where('_id', $id)->get();
        return view('editKabar', ['kabar'=>$kabar]);
    }

    public function prosesEdit(Request $request, $id)
    {
        $kabar= kabarJurusan::where('_id', $id)->first();
        $x=$request->input('x');
        $isi=$request->file('foto');
        $kabar->judul=$request->input('judul');
        $kabar->tag=$request->input('tag');
        $kabar->kabar=$request->input('isi');
        if ($isi!=null) {
            $filename = time().'.'.$isi->getClientOriginalExtension();
            $path = $isi->move('imgKab', $filename);
            $kabar->img=(string) $path;
            $kabar->save();
        } else {
            $kabar->img=$x;
            $kabar->save();
        }
        return redirect()->back()->with('success', 'Data telah teredit');
    }

    public function filterKab()
    {
        $kabar= kabarJurusan::all();
        return view('showKab', ['kabar'=>$kabar]);
    }

    public function deleteKabar($id)
    {
        $kabar= kabarJurusan::where('_id', $id);
        $kabar->delete();
        return redirect()->back();
    }

    public function statusKabar(Request $request, $id)
    {
        $kabar= kabarJurusan::where('_id', $id)->first();
        $kabar->status=$request->input('status');
        $kabar->note=$request->input('note');
        $kabar->save();
        return redirect('/filterKab');
    }

    public function kabarKu($idUser)
    {
        $kabar= kabarJurusan::where('idUser', $idUser)->get();
        return view('kabarKu', compact('kabar'));
    }

    public function kabarr()
    {
        $kabar= kabarJurusan::where('status', 'setuju')->get();
        return view('kabarr', compact('kabar'));
    }
}
