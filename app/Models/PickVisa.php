<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickVisa extends Model
{
    use HasFactory;
    protected $fillable = ['alpha_2_code','alpha_3_code','numeric_code', 'slug', 'name', 'display_name', 'keywords', 'translations'];
}
