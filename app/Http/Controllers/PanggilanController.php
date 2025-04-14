<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator; 
use \App\Models\PanggilanModel;

class PanggilanController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin',['only' => ['index','create','store','edit','update','delete','show']]);
    }
    public function index(Request $request){
        $panggilan = PanggilanModel::paginate(10);

        $query = PanggilanModel::query();
        
        if($request->has('name') && !empty($request->input('name'))){
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $panggilanResult = $query->orderBy('name','asc')->paginate(10)->appends($request->query());
        return view('tetapan.Panggilan.index', compact('panggilan','panggilanResult'));
    }

    public function create(){

        return view('tetapan.Panggilan.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
        ],[
            'name.required'=>'Nama panggilan diperlukan!!!!',
            'name.max'=>'Nama panggilan jangan lebih dari 150 patah perkataan!!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new PanggilanModel();
        $data->name = $request->input('name');
        $data->save();

        return redirect()->route('tetapanpanggilan.create')->with('success','Panggilan berjaya ditambah!');

    }

    public function edit(Request $request, $id){
        $data = PanggilanModel::find($id);

        return view('tetapan.Panggilan.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
        ],[
            'name.required'=>'Nama panggilan diperlukan!!!!',
            'name.max'=>'Nama panggilan jangan lebih dari 150 patah perkataan!!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $negara = PanggilanModel::find($id);
        if(!$negara){
            return redirect()->back()->with('error','PANGGILAN NOT EXIST');
        }

        $negara->name = $request->input('name');

        $negara->save();

        return redirect()->route('tetapanpanggilan.index')->with('success','Panggilan berjaya dikemaskini!');
    }

    public function delete(Request $request,$id){
        $data = PanggilanModel::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('tetapanpanggilan.index')->with('success','Panggilan berjaya dihapus!');
    }

    public function show(Request $request,$id){
        $data = PanggilanModel::find($id);
        return view('tetapan.Panggilan.show',compact('data'));
    }

}
