<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //memanggil model 

class Lists extends Model
{
    protected $table = 'list'; 
    protected $fillable = ['img','title','quantity','unit','desc'];
}
