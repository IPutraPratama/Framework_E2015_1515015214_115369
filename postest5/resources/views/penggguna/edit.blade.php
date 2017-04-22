@extends('master')
@section('container')
<div class="panel panel-info">
	<div class="panel-heading">
		<strong><a href="{{ url('/penggguna') }}">
		<i class="fa text-default fa-chevron-left"></i>
		</a>Perbarui Data penggguna</strong>
	</div>
	{!! Form::model($penggguna,['url'=>'penggguna/edit/'.$penggguna->id,'class'=>'form-horizontal'])!!}
		@include('penggguna.from.form')
		<div style="width: 100%;text-align: right;">
			<button class="btn btn-info">
				<i class="fa fa-save"></i>Perbarui
			</button>
			<button type="reset" class="btn btn-danger">
				<i class="fa fa-undo"></i>Ulangi
			</button>
		</div>
		{!!Form::close()!!}
		</div>
@stop