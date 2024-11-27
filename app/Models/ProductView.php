<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductView extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'viewed_at'];


}
