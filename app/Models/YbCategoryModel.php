<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YbCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'yb_categories';

    protected $fillable = ['name','flag'];
}
