<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\YbCategoryModel;
use App\Models\PanggilanModel;
use App\Models\PermohonanModel;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','yb_categories_id','portfolio_name','panggilan_id', 'name', 'no_kp', 'jawatan_hakiki', 'gelaran_di_jawatan', 'address_1', 'address_2', 'address_3', 'no_hp', 'email', 'gambar_attach_1'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function panggilan(){
        return $this->belongsTo(PanggilanModel::class);
    }

    public function yb_categories(){
        return $this->belongsTo(YbCategoryModel::class);
    }

    public function permohonan(){
        return $this->hasMany(PermohonanModel::class);
    }
}
