<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
 protected $table = 'dosen';  
   public function penggguna(){
   	return $this->belongsTo(penggguna::class);
   }
 public function dosen_matakuliah(){
 	return $this->hasMany(dosen_matakuliah::class);
 }
 public function dosen_matakuliah(){
		return $this->hasMany(dosen_matakuliah::class);
	}

	public function getUsernameAttribute(){
		return $this->penggguna->username;
	}
	
	public function listDosenDanNip(){
    $out = [];
        foreach ($this->all() as $dsn) {
            $out[$dsn->id] = "{$dsn->nama} ({$dsn->nip})";
        }
        return $out;
    }

    public function listdosenDanmatakuliah()
    {
    	$out = [];
    	foreach ($this->all() as $dsnipa) {
    		$out[$dsnipa->id] = "{$dsnipa->dosen->nama} {$dsnipa->dosen->nip} (Matakuliah {$dsnipa->matakuliah->title})";
  
    	return $out;
    }
}