@extends('layout.default')
@section('content')
<link rel="stylesheet" href="{{asset('atlantis-lite-master\back/css/home.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="kontaner ml-3">  
    <div class="card">
        <div class="judul text-center">
            <h1 class="text-center mb-4 mt-5 text-bold">REPORT TEAM</h1>
          </div>
          <div class="table-responsive">
          <table class="table table-hover">
            <div class="input-group mt-3">
              <form action="/report-team" method="GET">
                <input type="search" id="inputPassword6" placeholder="Cari Koodinator Team" name="search" class="form-control" aria-describedby="passwordHelpInline">
              </form>
              <form  action="/report-team-nama" method="GET">
                <input type="search" id="inputPassword6" placeholder="Cari Team" name="search" class="form-control ml-3" aria-describedby="passwordHelpInline">
              </form>
              <form action="/pdf-team" method="POST" target="__blank">
                @csrf
                <input type="search" id="inputPassword6" placeholder="PDF Koordinator TIM, dengan ID TIM" name="search" class="form-control ml-3" aria-describedby="passwordHelpInline">
              </form>
            </div>
            <div class="row">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Team</th>
                  <th scope="col">ID</th>
                  <th scope="col">Koordinator Team</th>
                  <th scope="col">Total Kecamatan</th>
                  {{-- <th scope="col">Total Balad Husein</th> --}}
                </tr>
              </thead>
              <tbody>
              @php
              $no = 1;
              @endphp
              @foreach ($team as $data =>$row)
              <tr>
                <th scope="row">{{$data + $team->firstItem()}}</th>
                <td>{{$row->team}}</td>
                <td>{{$row->id}}</td>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->kecamatans->count() }}</td>
                  {{-- <td>{{$row->datarelawan->count() }}</td> --}}
                  @endforeach
              </tr>
              </tbody>
            </table>
            {{$team->links()}}
        </div>
      </div> 
      
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      @endsection