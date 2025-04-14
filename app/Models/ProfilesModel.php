<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilesModel extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = ['id','portfolio_name', 'name', 'no_kp', 'jawatan_hakiki', 'gelaran_di_jawatan', 'address_1', 'address_2', 'address_3', 'no_hp', 'email', 'gambar_attach_1'];

}
