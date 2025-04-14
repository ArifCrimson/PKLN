<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator; 
use \App\Models\YbCategoryModel;

class YbcategoriesController extends Controller
{

    public function __construct(){
        $this->middleware('role:admin',['only' => ['index','create','store','edit','update','delete','show']]);
    }
    public function index(Request $request){
        $YB = YbCategoryModel::paginate(10);

        $query = YbCategoryModel::query();
        
        if($request->has('name') && !empty($request->input('name'))){
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $YBResult = $query->orderBy('name','asc')->paginate(10)->appends($request->query());
        return view('tetapan.YBCategories.index', compact('YB','YBResult'));
    }

    public function create(){

        return view('tetapan.YBCategories.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
        ],[
            'name.required'=>'Nama YB diperlukan!!!!',
            'name.max'=>'Nama YB jangan lebih dari 150 patah perkataan!!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new YbCategoryModel();
        $data->name = $request->input('name');
        $data->save();

        return redirect()->route('tetapanybkategori.create')->with('success','YB berjaya ditambah!');

    }

    public function edit(Request $request, $id){
        $data = YbCategoryModel::find($id);

        return view('tetapan.YBCategories.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
        ],[
            'name.required'=>'Nama YB diperlukan!!!!',
            'name.max'=>'Nama YB jangan lebih dari 150 patah perkataan!!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $negara = YbCategoryModel::find($id);
        if(!$negara){
            return redirect()->back()->with('error','YB NOT EXIST');
        }

        $negara->name = $request->input('name');

        $negara->save();

        return redirect()->route('tetapanybkategori.index')->with('success','YB berjaya dikemaskini!');
    }

    public function delete(Request $request,$id){
        $data = YbCategoryModel::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('tetapanybkategori.index')->with('success','YB berjaya dihapus!');
    }

    public function show(Request $request,$id){
        $data = YbCategoryModel::find($id);
        return view('tetapan.YBCategories.show',compact('data'));
    }

}
