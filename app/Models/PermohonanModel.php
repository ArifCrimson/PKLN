<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\YbCategoryModel;
use App\Models\Profile;
use App\Models\PanggilanModel;
use App\Models\Negara;
use App\Models\StatusPermohonanModel;


class PermohonanModel extends Model
{
    use HasFactory;

    protected $table = 'permohonan';

    protected $primaryKey = 'id';

    protected $fillable = ['tempoh_lawatan_start', 'tempoh_lawatan_end', 'negara_id', 'tujuan_lawatan', 'address_1', 'address_2', 'address_3', 'status_permohonan_id' ,'profiles_id','jumlah_hari','tarikh_kembali','status','accepted_by_urusetia_at','approved_by_pelulus_at','notice_to_pemohon_at'];

    public function profiles(){
        return $this->belongsTo(Profile::class);
    }

    public function negara(){
        return $this->belongsTo(Negara::class);
    }

    public function status_name(){
        return $this->belongsTo(StatusPermohonanModel::class, 'status_permohonan_id');
    }

    // public function statusId(){
    //     return $this->belongsTo(StatusPermohonanModel::class, 'status_permohonan');
    // }
}
