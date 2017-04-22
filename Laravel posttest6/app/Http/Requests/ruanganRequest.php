<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;

class ruanganRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$validasi=['id'=>'required','title'=>'required'];
		if($this->is('ruangan/tambah')){
		}
		return $validasi;
	}
}