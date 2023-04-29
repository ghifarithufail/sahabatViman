@extends('layout.default')
@section('content')
    <link rel="stylesheet" href="{{ asset('atlantis-lite-master\back/css/home.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="kontaner ml-3">

        <div class="judul text-center">
            <h1 class="text-center mb-4 mt-5 text-bold">Team</h1>
        </div>
        {{-- <a href="/koordinator-kecamatan-create" type="button" class="btn btn-success">Tambah +</a> --}}

        <div class="input-group">
            <a href="/teams-create" type="button" class="btn btn-success">Tambah +</a>
            {{-- <form action="/pdf-korcam" method="POST" target="__blank">
        @csrf
        <button class="btn btn-danger ml-2" style="width: 110px" ><i class="fas fa-file mr-1"></i> PDF</button>
      </form> --}}
        </div>
        <div class="table-responsive">
            <table class="table table-hover nowrap">
                <div class="input-group">
                    <form action="/teams" method="GET">
                        <input type="search" id="inputPassword6" placeholder="Cari Koordinator Tim" name="search"
                            class="form-control mt-3" aria-describedby="passwordHelpInline">
                    </form>
                    <form action="/team-nama" method="GET">
                        <input type="search" id="inputPassword6" placeholder="Cari Tim" name="search"
                            class="form-control mt-3" aria-describedby="passwordHelpInline">
                    </form>
                </div>
                <div class="row">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tim</th>
                            <th scope="col">Koordinator</th>
                            {{-- <th scope="col">Dapil</th> --}}
                            <th scope="col">Waktu</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($team as $data => $row)
                            <tr>
                                <th scope="row">{{ $data + $team->firstItem() }}</th>
                                <td>{{ $row->team }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->created_at->format('D d-M-Y (H:i)') }}</td>
                                <td>
                                    <a href="{{ route('getTeam', Crypt::encryptString($row->id)) }}"
                                        class="btn btn-warning edit m-1">Edit</a>
                                    <a href="#" class="btn btn-danger delete m-1" data-id="{{ $row->id }}"
                                        data-calon="{{ $row->nama }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

            <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                $('.delete').click(function() {
                    var team_id = $(this).attr('data-id');
                    var T = $(this).attr('data-calon');
                    swal({
                            title: "Kamu Yakin?",
                            text: "Ingin delete " + T + " !!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            console.log(willDelete);
                            if (willDelete) {
                                window.location = "/deleteT/" + team_id + ""
                                swal("Berhasil! Data ini Berhasil dihapus!", {
                                    icon: "success",
                                });
                            }
                        });
                });
            </script>
            <script>
                @if (Session::has('sukses'))
                    toastr.success('{{ Session::get('sukses') }}')
                @endif
            </script>
            {{ $team->links() }}
        @endsection
