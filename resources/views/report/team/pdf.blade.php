<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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

<h1 class="text-center">Report Data Team</h1>

<table id="customers">
  <tr>
    <th scope="col">No</th>
    <th scope="col">Team</th>
    <th scope="col">Koordinator Team</th>
    <th scope="col">Koordinator Kecamatan</th>
    <th scope="col">Deskripsi Kecamatan</th>
    <th scope="col">Total Desa/Kelurahan</th>
    <th scope="col">Total Konstituante</th>
  </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($team as $data => $row)
        <tr>
        <td>{{$no++}}</td>
        <td>{{$row->teams->team}}</td>
        <td>{{$row->teams->nama}}</td>
        <td>{{$row->nama}}</td>
        <td>{{$row->deskripsi}}</td>
        <td>{{$row->desas->count() }}</td>
        <td>{{$row->relawans->count() }}</td>
        </tr>
         @endforeach
</table>

</body> 
</html>


