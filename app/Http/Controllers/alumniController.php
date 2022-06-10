<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\biodata;
use App\dataAlumni;
use App\User;
use App\kirimForm;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\alumniImport;
use App\Imports\dataAlumniImport;

class alumniController extends Controller
{

    public function index($id)
    {
        $alum = biodata::where('nim', $id)->get();
        return view('alumniDash',compact('alum'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showAlumni()
    {
        $alum= biodata::all();
        return view('showAlum', ['alum'=>$alum]);
    }
    public function proAlumni(Request $request)
    {
        $file = $request->file('foto');

        $filename = time().'.'.$file->getClientOriginalExtension();
        $path = $file->move('img', $filename);
        $place='img/'.$filename;
   
        $add=new biodata([
      'nim' =>$request->input('nim'),
      'foto' => $place,
      'nama' => $request->input('nama'),
      'noHp' => $request->input('noHp'),
      'kotaLahir' => $request->input('kotaLahir'),
      'jk' => $request->input('jk'),
      'tanggalLahir' => $request->input('tanggalLahir'),
      'prodi' => $request->input('prodi'),
      'tahunLulus' => $request->input('tahunLulus'),
      'alamat' => $request->input('alamat'),
      'kodePos' => $request->input('kodePos'),
      'provinsi' => $request->input('provinsi'),
      'kota' => $request->input('kota'),
      'email' => $request->input('email'),
      'pekerjaan' => $request->input('pekerjaan'),
      'jp' => $request->input('jp'),
      'namaPerusahaan' => $request->input('namaPerusahaan'),
      'alamatPerusahaan' => $request->input('alamatPerusahaan'),
      'status' => 'subscribe'
  ]);
        $user=new User([
    'id' => $request->input('nim'),
    'name' => $request->input('nama'),
    'email' => $request->input('nim'),
    'password' => md5($request->input('nim')),
    'roles' => 'alumni'
]);
        $user->save();

        $add->save();
  
        return redirect()->back()->with('success', 'Data telah tersimpan');
    }

    public function delAl($nim)
    {
        $bio= biodata::where('nim', $nim)->delete();
        return redirect('/showBiodata');
    }

    public function editAl($nim)
    {
        $bio=  biodata::where('nim', $nim)->get();
        return view('editAlumni', ['bio'=>$bio]);
    }
    public function editProfile($nim)
    {
        $bio=  biodata::where('nim', $nim)->get();
        return view('editProfile', ['bio'=>$bio]);
    }

    public function updateAl(Request $request)
    {
        $nim= $request->input('nim');
        $bio= biodata::where('nim', $nim)->first();
        $foto=$request->file('foto');
        $x=$request->input('x');
        $bio->nama = $request->input('nama');
        $bio->noHp = $request->input('noHp');
        $bio->kotaLahir = $request->input('kotaLahir');
        $bio->jk = $request->input('jk');
        $bio->tanggalLahir = $request->input('tanggalLahir');
        $bio->prodi = $request->input('prodi');
        $bio->tahunLulus = $request->input('tahunLulus');
        $bio->alamat = $request->input('alamat');
        $bio->kodePos = $request->input('kodePos');
        $bio->provinsi = $request->input('provinsi');
        $bio->kota = $request->input('kota');
        $bio->pekerjaan = $request->input('pekerjaan');
        $bio->jp = $request->input('jp');
        $bio->namaPerusahaan = $request->input('namaPerusahaan');
        $bio->alamatPerusahaan = $request->input('alamatPerusahaan');
        if($foto!=null){
            $filename = time().'.'.$foto->getClientOriginalExtension();
            $path = $foto->move('img', $filename);
            $place='img/'.$filename;
            $bio->foto=$place;
        }
        else{
            $bio->foto=$x;
        }


        $bio->save();
        
        return redirect()->back()->with('success', 'Data telah tersimpan');
    }
    
    public function alumni(Request $request)
    {
      $add=new dataAlumni([
          'nim' =>$request->input('nim'),
          'nama' => $request->input('nama'),
          'prodi' => $request->input('prodi'),
          'tahunLulus' => $request->input('tahunLulus'),
          'jk' => $request->input('jk'),
      ]);
      $add->save();
      
      return redirect()->back()->with('success', 'Data telah tersimpan');
    }
    public function showData()
    {
        $dataAlum= dataAlumni::all();
        return view('dataAlumni',['dataAlum'=>$dataAlum]);
    }
    public function importBio(Request $request) 
	{
		$this->validate($request, [
			'importBiodata' => 'required|mimes:csv,xls,xlsx'
		]);
		$file = $request->file('importBiodata');
		$nama_file = rand().$file->getClientOriginalName();
		$file->move('file_bio',$nama_file);
		Excel::import(new alumniImport, public_path('/file_bio/'.$nama_file));
		return redirect()->back();
	}
    public function importAlumni(Request $request) 
	{
		$this->validate($request, [
			'importAlumni' => 'required|mimes:csv,xls,xlsx'
		]);
		$file = $request->file('importAlumni');
		$nama_file = rand().$file->getClientOriginalName();
		$file->move('file_alumni',$nama_file);
		Excel::import(new dataAlumniImport, public_path('/file_alumni/'.$nama_file));
		return redirect()->back();
	}
    public function subscribe($nim)
    {
        $bio=biodata::where('nim', $nim)->first();
        if($bio->status == 'subscribe'){
            $bio->status = 'unsubscribe';
            $bio->save();
        }
        elseif($bio->status == 'unsubscribe'){
            $bio->status = 'subscribe';
            $bio->save();
        }
        return redirect()->back();
    }

}
