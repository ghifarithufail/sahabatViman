@extends('layout.default')
@section('content')

<body>

    <h1 class="text-center mb-4 mt-5">Tambah Data Team</h1>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="/tPost" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" for="floatingInput" name="nama" placeholder="Masukan Nama Anda" class="form-control"  aria-describedby="emailHelp">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message = 'Nama harus di isi'}}</div>
                        @enderror
                        <div id="emailHelp" class="form-text">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Team</label>
                        <input type="text" name="team" placeholder="Masukan Team" class="form-control"  aria-describedby="emailHelp">
                        @error('team')
                            <div class="alert alert-danger">{{ $message = 'Team harus di isi'}}</div>
                        @enderror
                        <div id="emailHelp" class="form-text">
                    </div>

                    <button type="submit" class="btn  form-control text-white" style="background-color: red">Submit</button>
                </form>
              </div>
            </div>
          </div>
</body>

@endsection
