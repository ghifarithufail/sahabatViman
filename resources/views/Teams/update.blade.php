@extends('layout.default')
@section('content')

<body>

    <h1 class="text-center mb-4 mt-5">Update Data Team</h1>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="/updateT/{{ $dataT->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{$dataT->nama}}" placeholder="Masukan Nama Anda" class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                        <input type="text" name="team" value="{{$dataT->team}}" placeholder="Masukan Deskripsi" class="form-control"  aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                    </div>

                    <button type="submit" class="btn  form-control text-white" style="background-color: red">Submit</button>
                </form>
              </div>
            </div>
          </div>

</body>

@endsection
