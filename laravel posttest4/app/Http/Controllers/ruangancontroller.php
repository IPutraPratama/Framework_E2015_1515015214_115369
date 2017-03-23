<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ruangan;

class ruangancontroller extends Controller
{
    public function awal(){

    return "Hello dari ruangancontroller";
}
	public function tambah(){
	return $this->simpan();
}
public function simpan(){
	$ruangan 		 = new ruangan();
	$ruangan->title  = 'A111';
	$ruangan->save();
	return "data ruangan dengan nama ruangan {$ruangan->title} telah disimpan";
}

public function edit($sid){
 	$ruangan=ruangan::find($id);
 	return view('ruangan.edit')->with(array('ruangan'=>$ruangan));
 }
 public function lihat($sid){
 	$ruangan=ruangan::find($id);
 	return view('ruangan.lihat')->with(array('ruangan'=>$ruangan));
 }

 public function update($sid,Requests $input){
 	$ruangan=ruangan::find($id);
 	$ruangan->title = $input->title;
 	$informasi = $ruangan->save() ? 'Berhasil update data':'Gagal Update Data';
 	return redirect('ruangan')->with(['informasi'=>$informasi]);
 }
 public function hapus($sid){
 	$ruangan=ruangan::find($id);
 	$informasi= $ruangan->delete() ? 'Berhasil hapus data':'Gagal hapus Data';
 	return redirect('ruangan')->with(['informasi'=>$informasi]);
 }


}
