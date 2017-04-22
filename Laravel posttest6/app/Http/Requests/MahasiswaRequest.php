<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;

class MahasiswaRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$validasi=['nama'=>'required','nim'=>'required|integer','alamat'=>'required','username'=>'required'];
		if($this->is('mahasiswa/tambah')){
			$validasi['password'] = 'required';
		}
		return $validasi;
	}
}