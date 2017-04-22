<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;

class dosen_matakuliahRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$validasi=['dosen_id'=>'required','matakuliah_id'=>'required'];
		if($this->is('dosen_matakuliah/tambah')){
		}
		return $validasi;
	}
}