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
        $image = $request->file('foto');
        $result=" ";
       
        if ($result != null) {
            $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        }
        $content = $request->isi;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
  
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
         }
  
        $content = $dom->saveHTML();
       
        $add=new kabarJurusan([
          'idUser' =>$request->input('idUser'),
          'judul' => $request->input('judul'),
          'tag' => $request->input('tag'),
          'kabar' => $content,
          'img' => $result
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
        $foto=$request->file('foto');
        $result =$x;
        if($foto != null){
            $result = CloudinaryStorage::replace($x,$foto->getRealPath(), $foto->getClientOriginalName());
        }
        $kabar->judul=$request->input('judul');
        $kabar->tag=$request->input('tag');
        $kabar->kabar=$request->input('isi');
        $kabar->img=$result;
        $kabar->save();
        return redirect()->back()->with('success', 'Data telah teredit');
    }

    public function filterKab()
    {
        $kabar= kabarJurusan::all();
        return view('showKab', ['kabar'=>$kabar]);
    }

    public function deleteKabar($id)
    {
        $kabar= kabarJurusan::where('_id', $id)->first();
        CloudinaryStorage::delete($kabar->img);
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
