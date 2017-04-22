<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggguna extends Model
{
protected $table= 'penggguna';
protected $fillable= ['uername','password'];

public function dosen(){
		return $this->hasOne(dosen::class);
	}
	public function mahasiswa()
	{
		return $this->hasOne(mahasiswa::class);
	}
}
