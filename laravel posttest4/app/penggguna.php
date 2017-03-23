<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggguna extends Model
{
protected $table= 'penggguna';
protected $fillbale= ['uername','password'];
}
