<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  color: black;
}
</style>
</head>
<body>


  {{-- @if ($relawan as $data => $row)
  <div class="p-6 bg-white border-b border-gray-200">
   <h1 class="text-2xl"><td>{{$row->Koord_desas->Koord_kecamatans->nama}}</td></h1>
   <p>{{$row->Koord_desas->nama}}</p>
   <p>by {{ $post->user->name }}</p>
  </div>
  @endif --}}


<h1> Detail Report Konstituante</h1>
    @foreach ($relawan->take(1) as $data => $row)
    <p>Team : {{$row->Koord_desas->Koord_kecamatans->teams->team}}</p>
      <p>Koordinator Kecamatan : {{$row->Koord_desas->Koord_kecamatans->nama}}</p>
      <p>Koordinator Desa : {{$row->Koord_desas->nama}}</p>
      <p>Nama Relawan : {{$row->user->name}}</p>
      <p>Jumlah Konstituante : {{$relawan->count()}}</p>
    @endforeach
<table id="customers" class="nowrap">
  <tr>
    <th scope="col">No</th>
            <th scope="col">Nama</th>
            {{-- <th scope="col">User</th> --}}
            {{-- <th scope="col">Role</th> --}}
            <th scope="col">NIK</th>
            {{-- <th scope="col">KK</th> --}}
            {{-- <th scope="col">Tempat Lahir</th> --}}
            {{-- <th scope="col">status</th> --}}
            {{-- <th scope="col">alamat</th>
            <th scope="col">RT</th>
            <th scope="col">RW</th> --}}
            {{-- <th scope="col">TPS</th> --}}
            {{-- <th scope="col">Kelurahan</th>
            <th scope="col">TPS</th>
            <th scope="col">KORTIM</th>
            <th scope="col">KORCAM</th>
            <th scope="col">KORDES</th>
            <th scope="col">Verifikasi</th> --}}
            <th scope="col">Waktu</th>
  </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($relawan as $data => $row)
        <tr>
          <td>{{$no++}}</td>
            <td>{{$row->nama}}</td>
            {{-- <td>{{$row->user->name}}</td> --}}
            {{-- <td>{{$row->user->role}}</td> --}}
            <td>{{$row->nik}}</td>
            {{-- <td>{{$row->tempat_lahir}}</td>
            <td>{{$row->alamat}}</td>
            <td>{{$row->rt}}</td>
            <td>{{$row->rw}}</td>
            <td>{{$row->Datakelurahans->kelurahan}}</td>
            <td>{{$row->Datakelurahans->tps}}</td>
            <td>{{$row->Koord_desas->Koord_kecamatans->teams->nama}}</td>
            <td>{{$row->Koord_desas->Koord_kecamatans->nama}}</td>
            <td>{{$row->Koord_desas->nama}}</td>
            <td>{{$row->is_visible}}</td> --}}
            <td>{{$row->created_at->format ('D d-M-Y (H:i)')}}</td>
        </tr>
         @endforeach
</table>
</body>
</html>


