<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;   


class NegaraController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin',['only' => ['index','create','store','edit','update','delete','show']]);
    }
    public function index(Request $request){
        $negara = Negara::paginate(10);

        $query = Negara::query();
        
        if($request->has('name') && !empty($request->input('name'))){
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $NegaraResult = $query->orderBy('name','asc')->paginate(10)->appends($request->query());
        return view('tetapan.Negara.index', compact('negara','NegaraResult'));
    }

    public function create(){

        return view('tetapan.Negara.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
        ],[
            'name.required'=>'Nama negara diperlukan!!!!',
            'name.max'=>'Nama negara jangan lebih dari 150 patah perkataan!!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Negara();
        $data->name = $request->input('name');
        $data->save();

        return redirect()->route('tetapannegara.create')->with('success','Negara berjaya ditambah!');

    }

    public function edit(Request $request, $id){
        $data = Negara::find($id);

        return view('tetapan.Negara.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
        ],[
            'name.required'=>'Nama negara diperlukan!!!!',
            'name.max'=>'Nama negara jangan lebih dari 150 patah perkataan!!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $negara = Negara::find($id);
        if(!$negara){
            return redirect()->back()->with('error','NEGARA NOT EXIST');
        }

        $negara->name = $request->input('name');

        $negara->save();

        return redirect()->route('tetapannegara.index')->with('success','Negara berjaya dikemaskini!');
    }

    public function delete(Request $request,$id){
        $data = Negara::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('tetapannegara.index')->with('success','Negara berjaya dihapus!');
    }

    public function show(Request $request,$id){
        $data = Negara::find($id);
        return view('tetapan.Negara.show',compact('data'));
    }


}
