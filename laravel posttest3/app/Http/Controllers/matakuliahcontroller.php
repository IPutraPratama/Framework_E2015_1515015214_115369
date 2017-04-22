<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\matakuliah;

class matakuliahcontroller extends Controller
{
    public function awal(){

    return "Hello dari matakuliahcontroller";
}
	public function tambah(){
	return $this->simpan();
}
public function simpan(){
	$matakuliah 		  = new matakuliah();
	$matakuliah->title  = 'Basis Data';
	$matakuliah->keterangan  = 'Praktikum';
	$matakuliah->save();
	return "data dengan nama matakuliah {$matakuliah->title} telah disimpan";
}
}
