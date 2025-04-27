<?php

namespace App\Http\Controllers;
use App\Models\PanggilanModel;
use App\Models\PermohonanModel;
use App\Models\YbCategoryModel;
use App\Models\Profile;
use App\Models\User;
use App\Models\Negara;
use App\Models\StatusPermohonanModel;
use Illuminate\Support\Facades\Validator;   

use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserProfilesController extends Controller
{
    //for roles and permission 
    public function __construct(){
        $this->middleware('role:admin|urusetia|pelulus|user',['only' => ['index','create','store','edit','update','delete','report','show']]);
        $this->middleware('role:user',['only' => ['dashboard']]);
    }
    
    //for showing the details of applicant
    public function index(){
        
        $user = auth()->user();
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $profiles = Profile::where('user_id', $user->id)->paginate(5);

        return view('pemohon.index' , compact('ybcategories','profiles','panggilan'));
    }

    public function create(){

        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();


        
        return view('pemohon.create' , compact('ybcategories','panggilan'));
    }

    public function store(Request $request){
        //validation 
        $validator = Validator::make($request->all(),[
            'fname' => 'required|string|max:500',
            'portname' => 'required|string|max:255',
            'panggilan' => 'required|exists:panggilan,id',
            'ic'=> 'required|numeric|digits:12',
            'email' => 'required|email|string', 
            'phone' => 'required|numeric|min:11',
            'yb_categories_id' => 'required|exists:yb_categories,id',
            'jawatan'=>'required|string',
            'gelaran'=>'required|string',
            'alamat1'=>'required|string',
            'alamat2'=>'nullable|string',
            'alamat3'=>'nullable|string',
            'gambar_attach_1'=>'nullable|image',
        ],[
            'fname.required'=>'Nama tidak boleh kosong',
            'fname.max'=>'Nama melebihi maksimum yang dibenarkan',
            'portname.required'=>'Portofolio tidak boleh kosong',
            'portname.max'=>'Nama Portfolio melebihi maksimum yang dibenarkan',
            'panggilan.required'=>'Jenis panggilan tidak boleh kosong',
            'ic.required'=>'No Kad Pengenalan tidak boleh kosong',
            'ic.numeric'=>'No Kad Pengenalan tidak boleh ada huruf',
            'ic.digits'=>'No Kad Pengenalan harus 12 angka',
            'email.required'=>'E-mel tidak boleh kosong',
            'email.unique'=>'E-mel sudah terdaftar',
            'phone.required'=>'No Telefon tidak boleh kosong',
            'phone.min'=>'No Telefon tidak valid',
            'yb_categories_id.required'=>'Kategori panggilan tidak boleh kosong',
            'jawatan.required'=>'Jawatan tidak boleh kosong',
            'gelaran.required'=>'Gelaran tidak boleh kosong',
            'alamat1.required'=>'Ruang alamat ini tidak boleh kosong',
            'gambar_attach_1'=>'Gambar sahaja',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        //gather all the input data before saving.
        $profile = new Profile();
        $profile->name = $request->input( 'fname');
        $profile->portfolio_name = $request->input('portname');
        $profile->panggilan_id = $request->input('panggilan');
        $profile->no_kp = $request->input('ic');

        $profile->email = $request->input('email');
        $profile->no_hp = $request->input('phone');
        $profile->yb_categories_id = $request->input('yb_categories_id');
        $profile->jawatan_hakiki = $request->input('jawatan');
        $profile->gelaran_di_jawatan = $request->input('gelaran');

        $profile->address_1 = $request->input('alamat1');
        $profile->address_2 = $request->input('alamat2');
        $profile->address_3 = $request->input('alamat3');
        if ($request->hasFile('gambar_attach_1')){
            $photo = $request->file('gambar_attach_1');
            $filename = date('y-m-d').$photo->getClientOriginalName();
            $path = 'photo-user/'.$filename;
            Storage::disk('public')->put($path,file_get_contents($photo));
            $profile->gambar_attach_1 = $filename;

        }

        // Save to database

        $profile->user_id = auth()->user()->id;

        $profile->save();

        // Alert::success('success','Profil berjaya dicipta!');

        return redirect()->route('userprofiles.create')->with('success','Profil berjaya dicipta!');

    }

    //to redirect to profiles edit interface
    public function edit(Request $request,$id){
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $panggilan_id = Profile::pluck('name','id');
        $ybcategories_id = Profile::pluck('name','id');
        $data = Profile::find($id);
        $this->authorize('edit',$data);

        return view('pemohon.edit',compact('ybcategories','data', 'panggilan' ,'panggilan_id','ybcategories_id'));
        // dd($data);
    }

    public function update(Request $request,$id){
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'fname' => 'required|string|max:500',
            'portname' => 'required|string|max:255',
            'panggilan' => 'required|exists:panggilan,id',
            'ic'=> 'required|numeric|digits:12',
            'email' => 'required|email|string', 
            'phone' => 'required|numeric|min:11',
            'yb_categories_id' => 'required|exists:yb_categories,id',
            'jawatan'=>'required|string',
            'gelaran'=>'required|string',
            'alamat1'=>'required|string',
            'alamat2'=>'nullable|string',
            'alamat3'=>'nullable|string',
            'gambar_attach_1'=>'nullable|image',
        ],[
            'fname.required'=>'Nama tidak boleh kosong',
            'fname.max'=>'Nama melebihi maksimum yang dibenarkan',
            'portname.required'=>'Portofolio tidak boleh kosong',
            'portname.max'=>'Nama Portfolio melebihi maksimum yang dibenarkan',
            'panggilan.required'=>'Jenis panggilan tidak boleh kosong',
            'ic.required'=>'No Kad Pengenalan tidak boleh kosong',
            'ic.numeric'=>'No Kad Pengenalan tidak boleh ada huruf',
            'ic.digits'=>'No Kad Pengenalan harus 12 angka',
            'email.required'=>'E-mel tidak boleh kosong',
            'email.unique'=>'E-mel sudah terdaftar',
            'phone.required'=>'No Telefon tidak boleh kosong',
            'phone.min'=>'No Telefon tidak valid',
            'yb_categories_id.required'=>'Kategori panggilan tidak boleh kosong',
            'jawatan.required'=>'Jawatan tidak boleh kosong',
            'gelaran.required'=>'Gelaran tidak boleh kosong',
            'alamat1.required'=>'Ruang alamat ini tidak boleh kosong',
            'gambar_attach_1'=>'Gambar sahaja',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $photo = $request->file('gambar_attach_1');
        // $filename = date('y-m-d').$photo->getClientOriginalName();
        // $path = 'photo-user/'.$filename;

        // Storage::disk('public')->put($path,file_get_contents($photo));
        
        $profile = Profile::find($id);
        if(!$profile){
            return redirect()->back()->with('error','PROFILE NOT EXIST');
        }
        $profile->name = $request->input('fname');
        $profile->portfolio_name = $request->input('portname');
        $profile->panggilan_id = $request->input('panggilan');
        $profile->no_kp = $request->input('ic');

        $profile->email = $request->input('email');
        $profile->no_hp = $request->input('phone');
        $profile->yb_categories_id = $request->input('yb_categories_id');
        $profile->jawatan_hakiki = $request->input('jawatan');
        $profile->gelaran_di_jawatan = $request->input('gelaran');

        $profile->address_1 = $request->input('alamat1');
        $profile->address_2 = $request->input('alamat2');
        $profile->address_3 = $request->input('alamat3');
        if ($request->hasFile('gambar_attach_1')){
            $photo = $request->file('gambar_attach_1');
            $filename = date('y-m-d').$photo->getClientOriginalName();
            $path = 'photo-user/'.$filename;
            Storage::disk('public')->put($path,file_get_contents($photo));
            $profile->gambar_attach_1 = $filename;

        }
        // $profile->gambar_attach_1 = $filename;

        // Save to database

        $profile->user_id = auth()->user()->id;

        $profile->save();

        return redirect()->route('userprofiles.index')->with('success','Profil berjaya dikemaskini!');
    }

    public function delete(Request $request,$id){
        $profile = Profile::find($id);

        if($profile){
            $profile->delete();
        }

        return redirect()->route('userprofiles.index')->with('success','Profil berjaya dihapus!');

    }

    public function show(Request $request,$id){
        $profile = Profile::find($id);
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        // $panggilan_id = Profile::pluck('name','id');
        // $ybcategories_id = Profile::pluck('name','id');

        return view('pemohon.show',compact('profile','panggilan','ybcategories'));
    }

    public function dashboard(){
        $ybcategories = YbCategoryModel::all();
        $negara = Negara::all();
        $status = StatusPermohonanModel::all();
        $panggilan = PanggilanModel::all();
        $permohonan = PermohonanModel::all();
        $userId = Auth::id();
        $profiles = Profile::where('user_id', $userId)->pluck('id');
        $permohonanAssociate = PermohonanModel::whereIn('profiles_id', $profiles)->whereIn('status_permohonan_id', [2,3])->get();

        return view('user.index',compact('ybcategories','profiles','panggilan','permohonan','permohonanAssociate'));
    }

    public function dashboardAdmin(){
        $ybcategories = YbCategoryModel::all();
        $negara = Negara::all();
        $status = StatusPermohonanModel::all();
        $panggilan = PanggilanModel::all();
        $permohonan = PermohonanModel::all();
        $userId = Auth::id();
        $profiles = Profile::where('user_id', $userId)->pluck('id');

        $user = auth()->user();
        $permohonanAssociateQuery = PermohonanModel::query();

        // For admin/urusetia
        if ($user->role === 'admin' || $user->role === 'urusetia') {
            $permohonanAssociate = $permohonanAssociateQuery->whereIn('status_permohonan_id', [2,3])->get();
        }
        // For users
        elseif ($user->role === 'user') {
            // $permohonanAssociate = $permohonanAssociate->where('user_id', $user->id)->get();
            $permohonanAssociate = $permohonanAssociateQuery->whereIn('profiles_id', $profiles)->get();
        }
        // For pelulus
        elseif ($user->role === 'pelulus') {
            $permohonanAssociate = $permohonanAssociateQuery->where('status_permohonan_id', 3)->get();
        }

        $todayCreated = PermohonanModel::whereDate('created_at', today())->count();
        $todayCreatedMonth = PermohonanModel::whereMonth('created_at',now()->month)->whereYear('created_at',now()->year)->count();
       
        // kira total aprroved
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $totalApproved = PermohonanModel::where('status_permohonan_id', 1)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
        // kira total declined    
        $totalDeclined = PermohonanModel::where('status_permohonan_id', 4)
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->count();

        $totalUser = User::count();

        return view('index',compact('ybcategories','profiles','panggilan','permohonan','permohonanAssociate','todayCreated','totalApproved','totalUser','totalDeclined','todayCreatedMonth'));
    }


}
