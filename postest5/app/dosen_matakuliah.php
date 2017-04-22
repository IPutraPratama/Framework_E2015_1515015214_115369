<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\dosen_matakuliah;

class dosen_matakuliah extends Model
{
    protected $table='dosen_matakuliah';
}
public function Dosen()
    {
        return $this->belongsTo(dosen::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

       public function jadwal_matakuliah()
    {
        return $this->hasMany(jadwal_matakuliah::class);
    }

    public function getNamadosenAttribute(){
        return $this->dosen->nama;
    }

    public function getNipdosenAttribute(){
        return $this->dosen->nip;
    }
    
    public function getTitlematakuliahAttribute(){
        return $this->matakuliah->title;
    }

    public function listdosenDanmatakuliah()
    {
        $out = [];
        foreach ($this->all() as $dsnipa) {
            $out[$dsnipa->id] = "{$dsnipa->dosen->nama} {$dsnipa->dosen->nip} (matakuliah {$dsnipa->matakuliah->title})";
        }
        return $out;
    }
}
