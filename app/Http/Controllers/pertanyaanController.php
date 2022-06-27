<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pertanyaan;
use App\biodata;
use App\jawaban;
use App\form;
use App\kirimForm;
use App\listIsi;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Exports\jawabanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class pertanyaanController extends Controller
{
    use FormBuilderTrait;

    public function __construct()
    {
        $this->middleware('auth')->except('pertanyaan', 'prosesIsi');
    }
    public function formPertanyaan($jenisForm, $idForm)
    {
        return view('formPertanyaan', compact('jenisForm', 'idForm'));
    }
    public function buatForm()
    {
        return view('buatForm');
    }
    public function editPertanyaan($jenisForm,$id)
    {
        $pertanyaan=pertanyaan::where('_id', $id)->get();
        return view('editPertanyaan', compact('pertanyaan','jenisForm'));
    }
    public function listPertanyaan($jenisForm, $idForm)
    {
        $pertanyaan=pertanyaan::where('idForm', $idForm)->get();
        $listForm=form::where('jenisForm', $jenisForm)->get();
        return view('showPertanyaan', compact('pertanyaan', 'idForm', 'listForm', 'jenisForm'));
    }
    public function listForm()
    {
        $form=form::all();
        return view('showForm', compact('form'));
    }
    public function prosesForm(Request $request)
    {
        $check=form::where('namaForm', $request->input('nama'))->first();
        $jenisForm = $request->input('jenisForm');

        if ($check != null) {
            return redirect('/');
        }
        $add=new form();
        $add->namaForm = $request->input('nama');
        $add->jenisForm = $jenisForm;
        $add->save();
        $form=form::where('namaForm', $request->input('nama'))->first();
        $idForm=$form->id;
       
        return redirect('/showPertanyaan'.'/'.$jenisForm.'/'.$idForm);
    }
    

    public function pertanyaan(FormBuilder $formBuilder, $jenisForm, $idForm, $nim = null)
    {
        $jenisF=[
            $jenisF=[
                'name' => 'jenisForm',
                'type' => 'hidden',
                'value' => $jenisForm,
            ]
            ];
        $coba=pertanyaan::where('idForm', $idForm)->where('status','setuju')->get()->toArray();
        if ($nim != null) {
            $emailAl=biodata::where('nim', $nim)->first();
            $idForm=[
                $idForm=
                ['name' => 'idForm',
                'type' => 'hidden',
                'value' => $idForm,
            ], $email=
            [
            'name' => 'Email*',
            'type' => 'static',
            'tag' => 'div',
            'attr' => ['class' => 'form-control-static'],
            'value' => $emailAl->email,
        ],
        $idForm=
        ['name' => 'email',
        'label' => 'email*',
        'type' => 'hidden',
        'value' => $emailAl->email,
    ],
            ];
        } else {
            $idForm=[
                $idForm=
                ['name' => 'idForm',
                'type' => 'hidden',
                'value' => $idForm,
            ], $idForm=
            ['name' => 'email',
            'label' => 'email*',
            'type' => 'email',
        ],
            ];
        }
       
        $sbmt=[
        $submit=
        ['name' => 'submit',
        'type' => 'submit',
    ],
    ];
        $ad=array_merge($jenisF, $idForm, $coba, $sbmt);
        $form = $formBuilder->createByArray($ad, [
    'method' => 'POST',
    'url' => '/jawaban']);

        return view('hasilForm', compact('form'));
    }

    public function prosesBuat(Request $request)
    {
        $jenisForm=$request->input('jenisForm');
        $idUser = $request->input('idUser');
        $roles = $request->input('roles');
        $status = "wait";
        if($roles == "admin" || $roles == "superAdmin"){
            $status="setuju";
        }
        $add=new pertanyaan();
        $nama= preg_replace('/[^a-zA-Z0-9_ -]/s ', '', $request->input('nama'));
        $add->name = $nama;
        $add->idForm=$request->input('idForm');
        $add->type = $request->input('type');
        $add->label = $request->input('nama');
        $add->jenisForm =  $jenisForm;
        $add->idUser = $idUser;
        $add->status = $status;
        
      
        if ($request->input('type') == "select") {
            $object;
            $request->validate([
            'isi.*' => 'required',
            
        ]);

            foreach ($request->isi as $key => $value) {
                $object[$value]=$value;
            }
            $add->choices = (object) $object;
            $add->save();
        } elseif ($request->input('type') == "choice") {
            $object;
            $request->validate([
        'isi.*' => 'required',
        
    ]);

            foreach ($request->isi as $key => $value) {
                $object[$value]=$value;
            }
            $add->choices = (object) $object;
            $add->choice_options = [
            'wrapper' => ['class' => 'choice-wrapper'],
            'label_attr' => ['class' => 'label-class'],
        ];
            $add->expanded = true;
            $add->save();
        }

        $add->save();
    
        return redirect('/showPertanyaan'.'/'.$jenisForm.'/'.$request->input('idForm'));
    }
    public function prosesEdit(Request $request)
    {
        $jenisForm=$request->input('jenisForm');
        $add=pertanyaan::where('_id', $request->input('id'))->first();
        $nama=  preg_replace('/[^a-zA-Z0-9_-]/s ', '', $request->input('nama'));
        $add->name = $nama;
        $add->idForm=$request->input('idForm');
        $add->type = $request->input('type');
        $add->label = $request->input('nama');
        
      
        if ($request->input('type') == "select") {
            $object;
            $request->validate([
            'isi.*' => 'required',
            
        ]);

            foreach ($request->isi as $key => $value) {
                $object[$value]=$value;
            }
            $add->choices = (object) $object;
            $add->save();
        } elseif ($request->input('type') == "choice") {
            $object;
            $request->validate([
        'isi.*' => 'required',
        
    ]);

            foreach ($request->isi as $key => $value) {
                $object[$value]=$value;
            }
            $add->choices = (object) $object;
            $add->choice_options = [
            'wrapper' => ['class' => 'choice-wrapper'],
            'label_attr' => ['class' => 'label-class'],
        ];
            $add->expanded = true;
            $add->save();
        }

        $add->save();
    
        return redirect('/showPertanyaan'.'/'.$jenisForm.'/'.$request->input('idForm'));
    }

    public function prosesIsi(Request $request, FormBuilder $formBuilder)
    {
        $jenisF=$request->input('jenisForm');
        if ($jenisF == 'perusahaan') {
            $pilGan=['choice','select'];
            $isian=['text','textarea'];
    
            $coba=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->whereIn('type', $pilGan)->get()->toArray();
            $coba2=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->whereIn('type', $isian)->get()->toArray();
            $coba3=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->where('type', 'file')->get()->toArray();
            $pr=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->where('type', 'file')->get();
            $form = $formBuilder->createByArray($coba);
            $form2 = $formBuilder->createByArray($coba2);
            $form3= $formBuilder->createByArray($coba3);
            $ad = $form3->getFieldValues();
            $path=[];
            
            foreach ($ad as $key => $val) {
                if ($val != null) {
                    $isi = time().'.'.$val->getClientOriginalExtension();
                    $path[$key] =(string) $val->move('file', $isi);
                }
            }
           
            $add=new jawaban();
            $add->email=$request->input('email');
            $add->idForm=$request->input('idForm');
            $add->pilihanGanda=$form->getFieldValues();
            $add->text=$form2->getFieldValues();
            $add->file=$path;
            $add->jenisForm=$jenisF;

            $add->save();
            return redirect()->back()->with('success', 'Data telah tersimpan');
        } else if($jenisF == 'alumni'){
            $emailBio=biodata::where('email', $request->input('email'))->first();
            $email=jawaban::where('email', $request->input('email'))->first();
            if ($email == null) {
                if ($emailBio != null) {
                    $pilGan=['choice','select'];
                    $isian=['text','textarea'];
            
                    $coba=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->whereIn('type', $pilGan)->get()->toArray();
                    $coba2=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->whereIn('type', $isian)->get()->toArray();
                    $coba3=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->where('type', 'file')->get()->toArray();
                    $pr=pertanyaan::where('idForm', $request->input('idForm'))->where('status','setuju')->where('type', 'file')->get();
                    $form = $formBuilder->createByArray($coba);
                    $form2 = $formBuilder->createByArray($coba2);
                    $form3= $formBuilder->createByArray($coba3);
                    $ad = $form3->getFieldValues();
                    $path=[];
                    
                    foreach ($ad as $key => $val) {
                        if ($val != null) {
                            $isi = time().'.'.$val->getClientOriginalExtension();
                            $path[$key] =(string) $val->move('file', $isi);
                        }
                    }
                   
                    $add=new jawaban();
                    $add->email=$request->input('email');
                    $add->idForm=$request->input('idForm');
                    $add->pilihanGanda=$form->getFieldValues();
                    $add->text=$form2->getFieldValues();
                    $add->file=$path;
                    $add->jenisForm=$jenisF;
    
                    $add->save();
                    return redirect()->back()->with('success', 'Data telah tersimpan');
                } else {
                    return redirect()->back()->withErrors(['msg' => 'Email yang anda gunakan belum terdaftar']);
                }
            } else {
                return redirect()->back()->withErrors(['msg' => 'Email Yang anda Masukan Sudah Digunakan']);
            }
        }
    }

    
    public function showJawaban($idForm)
    {
        $pilGan=['choice','select'];
        $isian=['text','textarea'];
        $pertanyaan=pertanyaan::whereIn('type', $pilGan)->where('status','setuju')->where('idForm', $idForm)->get();
        $pertanyaan2=pertanyaan::whereIn('type', $isian)->where('status','setuju')->where('idForm', $idForm)->get();
        $pertanyaan3=pertanyaan::where('type', 'file')->where('status','setuju')->where('idForm', $idForm)->get();
        $jawaban=jawaban::where('idForm', $idForm)->get();
        $dt=[];
        
        foreach ($pertanyaan as $key => $p) {
            // dd($p->choices);
    

            foreach ($p->choices as $ckey => $cval) {
                $dt[$p->name][$p->choices[$ckey]] = 0;
                // dd($dt);
       
                foreach ($jawaban as $j) {
                    if (isset($j->pilihanGanda[$p->name])) {
                        if ($j->pilihanGanda[$p->name] == $p->choices[$ckey]) {
                            $dt[$p->name][$j->pilihanGanda[$p->name]] += 1;
                        }
                    }
                }
            }
        }
  
 
        
        return view('jawaban', compact('pertanyaan', 'pertanyaan2', 'dt', 'jawaban', 'idForm', 'pertanyaan3'));
    }
    public function showJawabanUser($idUser,$idForm)
    {   
        $pilGan=['choice','select'];
        $isian=['text','textarea'];
        $pertanyaan=pertanyaan::whereIn('type', $pilGan)->where('status','setuju')->where('idUser',$idUser)->where('idForm', $idForm)->get();
        $pertanyaan2=pertanyaan::whereIn('type', $isian)->where('status','setuju')->where('idUser',$idUser)->where('idForm', $idForm)->get();
        $pertanyaan3=pertanyaan::where('type', 'file')->where('status','setuju')->where('idUser',$idUser)->where('idForm', $idForm)->get();
        $jawaban=jawaban::where('idForm', $idForm)->get();
        $dt=[];
        
        foreach ($pertanyaan as $key => $p) {
            // dd($p->choices);
    

            foreach ($p->choices as $ckey => $cval) {
                $dt[$p->name][$p->choices[$ckey]] = 0;
                // dd($dt);
       
                foreach ($jawaban as $j) {
                    if (isset($j->pilihanGanda[$p->name])) {
                        if ($j->pilihanGanda[$p->name] == $p->choices[$ckey]) {
                            $dt[$p->name][$j->pilihanGanda[$p->name]] += 1;
                        }
                    }
                }
            }
        }
  
 
        
        return view('jawaban', compact('pertanyaan', 'pertanyaan2', 'dt', 'jawaban', 'idForm', 'pertanyaan3'));
    }
    public function delPertanyaan($id)
    {
        $tanya= pertanyaan::where('_id', $id)->delete();
        return redirect()->back();
    }
    public function export_excel($idForm)
    {
        $pilGan=['choice','select'];
        $isian=['text','textarea'];
        $isi=jawaban::where('idForm', $idForm)->get();
        $valPil;
        $valTxt;
        $valEm;
        $keyPil;
        $keyTxt;
      
        foreach ($isi as $i) {
            foreach ($i->pilihanGanda as $b => $val) {
                $valPil[$b]=$val;
            }
            foreach ($i->text as $c => $val2) {
                $valTxt[$c]=$val2;
            }
            $valEm['email']=$i->email;
                
            $ll[]=array_merge($valEm, $valTxt, $valPil);
        }
           
        $export = new jawabanExport($ll);
        
        return Excel::download($export, 'coba.xlsx');
    }
    public function copyPertanyaan($idForm, Request $request)
    {
        $tasks = pertanyaan::where('idForm', $request->input('formCopy'))->get()->toArray();
        $idfrm=[
            'idForm' => $idForm,
        ];
        $tsk=[];
        foreach ($tasks as $t) {
            $tsk=array_merge($t, $idfrm);
            $add=new pertanyaan($tsk);
            $add->save(['upsert' => true]);
        }

        return redirect()->back();
    }
    public function prosesLink(Request $request)
    {
        $chk=kirimForm::all()->first();
        if ($chk == null) {
            $isi=new kirimForm();
            $isi->link=$request->input('link');
           
            $isi->save();
        } else {
            $upt=kirimForm::all()->first();
            $upt->link=$request->input('link');
            $upt->save();
        }
        return redirect()->back();
    }

    public function formLink()
    {
        return view('formLink');
    }
    public function listPengisi()
    {
        $jawaban= jawaban::with('biodata')->get();
        return view('showPengisi', compact('jawaban'));
    }
    public function statusPertanyaan(Request $request, $id)
    {
        $kabar= pertanyaan::where('_id', $id)->first();
        $kabar->status=$request->input('status');
        $kabar->keterangan=$request->input('note');
        $kabar->save();
        return redirect()->back();
    }

}
