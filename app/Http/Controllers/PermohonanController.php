<?php

namespace App\Http\Controllers;

use App\Mail\NoticeToPemohon;
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
use Illuminate\Support\Facades\Mail;

class PermohonanController extends Controller
{

    public function __construct(){
        $this->middleware('role:admin|urusetia|pelulus|user',['only' => ['index','create','store','edit','update','delete','report']]);
        $this->middleware('role:admin|urusetia',['only' => ['terima','semakPermohonan','semakTerima','semakRejected','reportUrusetia','urusetiaNotify']]);
        $this->middleware('role:admin|pelulus',['only' => ['terima_pelulus','pelulusSemakPermohonan','pelulusTerima','pelulusRejected']]);
    }

    public function index(){
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $negara = Negara::all();
        $status = StatusPermohonanModel::all();
        $permohonan = PermohonanModel::all();

        $userId = Auth::id();
        $profiles = Profile::where('user_id', $userId)->pluck('id');
        $permohonanAssociate = PermohonanModel::whereIn('profiles_id', $profiles)->whereIn('status_permohonan_id', [2,3])->paginate(5);
        return view('permohonan.index', compact('ybcategories','panggilan','negara','status','permohonan','permohonanAssociate'));
    }

    public function report(Request $request){
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $negara = Negara::all();
        $status = StatusPermohonanModel::all();
        $permohonan = PermohonanModel::all();

        $userId = Auth::id();
        $profiles = Profile::where('user_id', $userId)->pluck('id');
        $query = PermohonanModel::whereIn('profiles_id', $profiles)->join('profiles','permohonan.profiles_id','=','profiles.id');
        if($request->has('no_kp') && !empty($request->input('no_kp'))){
            $query->where('no_kp', 'like', '%' . $request->input('no_kp') . '%');
        }
        $permohonanAssociate = $query->whereIn('status_permohonan_id', [1,4])->orderBy('created_at','desc')->paginate(5,['permohonan.*','profiles.no_kp']);
        return view('permohonan.history',compact('ybcategories' ,'panggilan','negara','status','permohonan','permohonanAssociate'));
    }
    public function create(){

        $user = auth()->user();
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $negara = Negara::all();
        $profiles = Profile::where('user_id', $user->id)->get();


        return view('permohonan.create_permohonan', compact('profiles','ybcategories','panggilan','negara'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'profil' => 'required|exists:profiles,id',
            'tempohLawatan' => 'required|date',
            'tempohLawatantamat' => 'required|date|after_or_equal:tempohLawatan',
            'negara' => 'required|exists:negara,id',
            'tujuan' => 'required|string|max:500',
            'tarikhback' => 'required|date',
            'alamat' => 'required|string|max:500',
            'alamat2' => 'nullable|string|max:500',
            'alamat3' => 'nullable|string|max:500',

        ],[
            'profil.required' => 'Profile perlu dipilih',
            'profil.exists' => 'Profile tidak wujud',
            'tempohLawatan.required' => 'Tempoh Lawatan Bermula mesti dikemukakan!!!',
            'tempohLawatan.date' => 'Tarikh sahaja!!!',
            'tempohLawatantamat.required' => 'Tempoh Lawatan Berakhir mesti dikemukakan!!!',
            'tempohLawatantamat.date' => 'Tarikh sahaja!!!',
            'tarikhback.required' => 'Tarikh kembali bertugas mesti dikemukakan!!!',
            'tarikhback.date' => 'Tarikh sahaja!!!',
            'negara.required' => 'Negara mesti Dipilih!!!',
            'negara.exists' => 'Negara tidak wujud!!!',
            'tujuan.required' => 'Tujuan Lawatan mesti dikemukakan!!!',
            'tujuan.string' => 'Tujuan Lawatan mesti dalam bentuk teks!!!',
            'tujuan.max' => 'Tujuan Lawatan tidak boleh melebihi 500 karakter!!!',
            'alamat.required' => 'Alamat mesti dikemukakan!!!',
            'alamat.string' => 'Alamat mesti dalam bentuk teks!!!',
            'alamat.max' => 'Alamat tidak boleh melebihi 500 karakter!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $permohonan = new PermohonanModel();
        $profiles_id = $request->input('profil');
        $permohonan->tempoh_lawatan_start = $request->input('tempohLawatan');
        $permohonan->tempoh_lawatan_end = $request->input('tempohLawatantamat');
        $permohonan->tarikh_kembali = $request->input('tarikhback');

        $startdate = Carbon::parse($request->input('tempohLawatan'));
        $enddate = Carbon::parse($request->input('tempohLawatantamat'));
        $jumlahcuti = $startdate->diffInDays($enddate);
        $permohonan->jumlah_hari = $jumlahcuti;
        $permohonan->negara_id = $request->input('negara');
        $permohonan->tujuan_lawatan = $request->input('tujuan');
        $permohonan->address_1 = $request->input('alamat');
        $permohonan->address_2 = $request->input('alamat2');
        $permohonan->address_3 = $request->input('alamat3');
        $permohonan->status_permohonan_id = 2;
        $permohonan->profiles_id = $profiles_id;

        $permohonan->save();

        return redirect()->route('permohonan.create')->with('success','Permohonan berjaya dihantar!');
    }

    public function edit(Request $request,$id){

        $user = auth()->user();
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $negara = Negara::all();
        $profiles = Profile::where('user_id', $user->id)->get();
        $permohonan = PermohonanModel::find($id);
        return view('permohonan.edit', compact('ybcategories' ,'panggilan', 'negara','profiles' ,'permohonan'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'profil' => 'required|exists:profiles,id',
            'tempohLawatan' => 'required|date',
            'tempohLawatantamat' => 'required|date',
            'tarikhback' => 'required|date',
            'negara' => 'required|exists:negara,id',
            'tujuan' => 'required|string|max:500',
            'alamat' => 'required|string|max:500',
            'alamat2' => 'nullable|string|max:500',
            'alamat3' => 'nullable|string|max:500',
        ],[
            'profil.required' => 'Profile perlu dipilih',
            'profil.exists' => 'Profile tidak wujud',
            'tempohLawatan.required' => 'Tempoh Lawatan Bermula mesti dikemukakan!!!',
            'tempohLawatan.date' => 'Tarikh sahaja!!!',
            'tempohLawatantamat.required' => 'Tempoh Lawatan Berakhir mesti dikemukakan!!!',
            'tempohLawatantamat.date' => 'Tarikh sahaja!!!',
            'tarikhback.required' => 'Tarikh kembali bertugas mesti dikemukakan!!!',
            'tarikhback.date' => 'Tarikh sahaja!!!',
            'negara.required' => 'Negara mesti Dipilih!!!',
            'negara.exists' => 'Negara tidak wujud!!!',
            'tujuan.required' => 'Tujuan Lawatan mesti dikemukakan!!!',
            'tujuan.string' => 'Tujuan Lawatan mesti dalam bentuk teks!!!',
            'tujuan.max' => 'Tujuan Lawatan tidak boleh melebihi 500 karakter!!!',
            'alamat.required' => 'Alamat mesti dikemukakan!!!',
            'alamat.string' => 'Alamat mesti dalam bentuk teks!!!',
            'alamat.max' => 'Alamat tidak boleh melebihi 500 karakter!!!',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $permohonan = PermohonanModel::find($id);

        if(!$permohonan){
            return redirect()->route('permohonan.index')->with('error','Permohonan tidak ditemui');
        }

        $permohonan->profiles_id = $request->input('profil');
        $permohonan->tempoh_lawatan_start = $request->input('tempohLawatan');
        $permohonan->tempoh_lawatan_end = $request->input('tempohLawatantamat');
        $permohonan->tarikh_kembali = $request->input('tarikhback');
        $startdate = Carbon::parse($request->input('tempohLawatan'));
        $enddate = Carbon::parse($request->input('tempohLawatantamat'));
        $jumlahcuti = $startdate->diffInDays($enddate);
        $permohonan->jumlah_hari = $jumlahcuti;
        $permohonan->negara_id = $request->input('negara');
        $permohonan->tujuan_lawatan = $request->input('tujuan');
        $permohonan->address_1 = $request->input('alamat');
        $permohonan->address_2 = $request->input('alamat2');
        $permohonan->address_3 = $request->input('alamat3');

        $permohonan->save();

        return redirect()->route('permohonan.index')->with('success','Permohonan berjaya dikemaskini!');
    }

    //urusetia
    public function terima(){

        $permohonan = PermohonanModel::where(function($query){
            $query->where('status','!=','Emel Dihantar')
            ->orWhereNull('status');
        })->paginate(5);
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $negara = Negara::all();
        $profiles = Profile::all();


        return view('urusetia.terima', compact('permohonan','ybcategories','panggilan','negara','profiles'));
    }
    public function semakPermohonan($id){
        $permohonan = PermohonanModel::find($id);
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $statusper = StatusPermohonanModel::all();
        $negara = Negara::all();
        $profile = Profile::all(); 
        return view('urusetia.semak', compact('permohonan','ybcategories' ,'panggilan' ,'negara' ,'profile','statusper'));
    }

    public function semakTerima(Request $request,$id){
        $permohonan = PermohonanModel::find($id);
        $permohonan->status = 'Urusetia Terima';
        $permohonan->accepted_by_urusetia_at = now();
        $permohonan->status_permohonan_id = 3;
        $permohonan->save();
        return redirect()->route('permohonan.terima')->with('success', 'Permohonan Diterima dan Dihantar Ke Pelulus!');
    }

    public function semakRejected(Request $request,$id){
        $permohonan = PermohonanModel::find($id);
        $permohonan->catatan_urusetia = $request->input('catatan_urusetia');
        $permohonan->status = 'Permohonan Ditolak';
        $permohonan->accepted_by_urusetia_at = now();
        $permohonan->status_permohonan_id = 4;
        $permohonan->save();
        return redirect()->route('permohonan.terima')->with('success', 'Permohonan Berjaya Ditolak!');
    }

    public function reportUrusetia(Request $request){
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $negara = Negara::all();
        $status = StatusPermohonanModel::all();
        
        $query = PermohonanModel::where('status','=','Emel Dihantar')->join('profiles','permohonan.profiles_id','=','profiles.id')->select('permohonan.*','profiles.no_kp');
        
        if($request->has('no_kp') && !empty($request->input('no_kp'))){
            $query->where('profiles.no_kp', 'like', '%' . $request->input('no_kp') . '%');
        }

        $permohonanAssociate = $query->orderBy('permohonan.created_at','desc')->paginate(5)->appends($request->query());
        
        return view('urusetia.historysemak',compact('ybcategories' ,'panggilan','negara','status','permohonanAssociate'));
    }

    public function urusetiaNotify(Request $request,$id){
        $permohonan = PermohonanModel::find($id);
        $permohonan->status = 'Emel Dihantar';
        $permohonan->notice_to_pemohon_at = now();
        Mail::to($permohonan->profiles->email)->send(new NoticeToPemohon($permohonan));

        $permohonan->save();
        return redirect()->route('permohonan.terima')->with('success','Status Permohonan Telah dihantar ke Pemohon');
    }

//pelulus
    public function terima_pelulus(){
        $permohonan = PermohonanModel::where('status_permohonan_id', 3)->paginate(5);
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $statusper = StatusPermohonanModel::all();
        $negara = Negara::all();
        $profile = Profile::all(); 

        return view('pelulus.index',compact('permohonan','ybcategories','panggilan','statusper','negara','profile'));
    }

    public function pelulusSemakPermohonan(Request $request, $id){
        $permohonan = PermohonanModel::find($id);
        $ybcategories = YbCategoryModel::all();
        $panggilan = PanggilanModel::all();
        $statusper = StatusPermohonanModel::all();
        $negara = Negara::all();
        $profile = Profile::all(); 

        return view('pelulus.semak',compact('permohonan','ybcategories','panggilan','statusper','negara','profile'));
    }

    public function pelulusTerima(Request $request, $id){
        $permohonan = PermohonanModel::find($id);
        $permohonan->status = 'Pelulus Terima';
        $permohonan->approved_by_pelulus_at = now();
        $permohonan->status_permohonan_id = 1;
        $permohonan->save();
        return redirect()->route('permohonan.pelulusIndex')->with('success', 'Permohonan Berjaya Diluluskan!');
    }

    public function pelulusRejected(Request $request, $id){
        $permohonan = PermohonanModel::find($id);
        $permohonan->status = 'Permohonan Ditolak';
        $permohonan->approved_by_pelulus_at = now();
        $permohonan->status_permohonan_id = 4;
        $permohonan->catatan_pelulus = $request->input('catatan_pelulus');
        $permohonan->save();
        return redirect()->route('permohonan.pelulusIndex')->with('success', 'Permohonan Berjaya Ditolak!');
    }

    public function delete(Request $request,$id){
        $permohonan = PermohonanModel::find($id);
        if($permohonan){
            $permohonan->delete();
        }
        return redirect()->route('permohonan.index')->with('success','Permohonan berjaya dihapus!!!');
    }
}
