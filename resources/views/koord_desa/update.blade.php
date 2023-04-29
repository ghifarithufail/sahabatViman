@extends('layout.default')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <body>

        <h1 class="text-center mb-4 mt-5">Update Data Koordinator Desa</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="/updateKD/{{ $dataKD->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" value="{{ $dataKD->nama }}" placeholder="Masukan Nama Anda"
                                class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" value="{{ $dataKD->deskripsi }}"
                                    placeholder="Masukan Deskripsi" class="form-control" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Koordinator Kecamatan</label>
                                    <select name="Koord_kecamatan_id" id="kecamatan" data-width="100%"
                                        class="js-example-basic-multiple js-states form-control"
                                        aria-label="Default select example"">
                                        <option value="{{ $dataKD->Koord_kecamatan_id }}">--
                                            {{ $dataKD->Koord_kecamatans->nama }} --</option>
                                        @foreach ($dataKoord_kecamatan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }} - {{ $data->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Dapil</label>
                                    <input type="text" name="dapil" value="{{ $dataKD->dapil }}"
                                        placeholder="Masukan Nama Calon" class="form-control" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>


                                    <button type="submit" class="btn  form-control text-white"
                                        style="background-color: red">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#kecamatan").select2({
                    // theme: "classic"
                });
            });
        </script>
    </body>
@endsection
