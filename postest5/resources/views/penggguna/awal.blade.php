@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data penggguna</strong>
		<a href="{{url('penggguna/tambah') }}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>penggguna</a>
			<div class="clearfix"></div>
	</div>
	<table class="table">
<thead>
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
			<?php $x=1;?>
			@foreach ($data as $penggguna)
				<tr>
					<td>{{ $x++ }}</td>
					<td>{{ $penggguna->username or 'username kosong'}}</td>
					<td>{{ $penggguna->password or 'password kosong'}}</td>
					<td>
						<div class="btn-group" role="group">
							<a href="{{url('penggguna/edit/'.$penggguna)}}" class="btn btn warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah">
								<i class="fa fa-pencil"></i>
							</a>

							<a href="{{url('penggguna/'.$penggguna->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat">
								<i class="fa fa-eye"></i>
							</a>

							<a href="{{url('penggguna/hapus/'.$penggguna->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus">
								<i class="fa fa-premove"></i>
							</a>
						</div>

						</td>
						</tr>
						@endforeach	
				</tr>
		</tbody>
	</table>
</div>
@stop