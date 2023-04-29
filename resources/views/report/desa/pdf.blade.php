<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 15px
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
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

<h1>Koordinator Desa Tabel</h1>

<table id="customers">
  <tr>
    <th scope="col">No</th>
    <th scope="col">Koordinator Desa</th>
    <th scope="col">Kelurahan/Desa</th>
    <th scope="col">TPS</th>
    <th scope="col">Relawan</th>
    <th scope="col">Kontituante</th>
    <th scope="col">Waktu</th>
  </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($desa as $data => $row)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$row->Koord_desas->nama}}</td>
            <td>{{$row->Koord_desas->deskripsi}}</td>
            {{-- <td>{{$row->Datakelurahans->kelurahan}}</td> --}}
            <td>{{$row->Datakelurahans->tps}}</td>
            <td>{{$row->user->name}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->created_at->format ('D d-M-Y (H:i)')}}</td>
        </tr>
         @endforeach
</table>

</body> 
</html>


