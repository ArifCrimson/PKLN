<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PermohonanModel;

class StatusPermohonanModel extends Model
{
    use HasFactory;

    protected $table = 'status_permohonan';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'flag'];

    public function permohonan(){
        return $this->hasMany(PermohonanModel::class);
    }

}
