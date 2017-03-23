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

public function edit($sid){
 	$matakuliah=matakuliah::find($id);
 	return view('matakuliah.edit')->with(array('matakuliah'=>$matakuliah));
 }
 public function lihat($sid){
 	$matakuliah=matakuliah::find($id);
 	return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
 }

 public function update($sid,Requests $input){
 	$matakuliah=matakuliah::find($id);
 	$matakuliah->title = $input->title;
 	$matakuliah->keterangan = $input->keterangan;
 	$informasi = $matakuliah->save() ? 'Berhasil update data':'Gagal Update Data';
 	return redirect('matakuliah')->with(['informasi'=>$informasi]);
 }
 public function hapus($sid){
 	$matakuliah=matakuliah::find($id);
 	$informasi= $matakuliah->delete() ? 'Berhasil hapus data':'Gagal hapus Data';
 	return redirect('matakuliah')->with(['informasi'=>$informasi]);
 }


}
