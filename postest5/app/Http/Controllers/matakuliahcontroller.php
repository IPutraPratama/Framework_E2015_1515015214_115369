<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\matakuliah;
use Input;
use Redirect;
use Informasi;


class matakuliahcontroller extends Controller
{
    public function awal(){

    return view('matakuliah.awal',['data'=>matakuliah::all()]);
}
	public function tambah(){
	return view('matakuliah.tambah');
}
public function simpan(Request $input){
		$matakuliah = new matakuliah;
        $matakuliah->id        = $input->id;
        $matakuliah->title     = $input->title;
        $matakuliah->keterangan= $input->keterangan;
        $informasi = $matakuliah->save() ? 'berhasil input' : 'gagal simpan';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
}

public function edit($id){
 	 $matakuliah=matakuliah::find($id);
     return view('matakuliah.edit')->with(array('matakuliah'=>$matakuliah));

 }
 public function lihat($sid){
 	$matakuliah=matakuliah::find($id);
 	return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
 }

 public function update($id,Requests $input){
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
