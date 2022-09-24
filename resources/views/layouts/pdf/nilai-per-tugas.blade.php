<!DOCTYPE html>
<html>
<head>
	<title>Nilai Tugas {{ $tugas->tugas_ke }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}

	</style>
	<div class="mb-3">
		<h5 class="text-center">Daftar Nilai Mahasiswa</h5>
        <div class="mt-4">
        <table>
            <!-- <tr>
                <th width="15%">Tugas Ke</th>
                <th width="1%">:</th>
                <th>{{ $tugas->tugas_ke }}</th>
            </tr> -->
            <tr>
                <td width="30%">Tugas Ke</td>
                <td width="20%"><div class="mx-3 my-1">:</div></td>
                <td>{{ $tugas->tugas_ke }}</td>
            </tr>
            <tr>
                <td width="15%">Deadline</td>
                <td width="1%"><div class="mx-3 my-1">:</div></td>
                <td>{{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('l, d F Y')}}</td>
            </tr>
        </table>
        </div>
	</div>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Mahasiswa</th>
				<th>Nilai</th>
				<th>Link Youtube</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($nilai as $row)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$row->mhs->name}}</td>
				<td>{{$row->nilai}}</td>
				<td>
                    <a target="_blank" href="{{ $row->hasilTugas->link_tugas }}">{{ $row->hasilTugas->link_tugas }}</a>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>