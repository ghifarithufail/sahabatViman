<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/detail.css">
  <link rel="stylesheet" href="{{asset('atlantis-lite-master\back/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('atlantis-lite-master\back/css/atlantis.min.css')}}">
  <title>Report</title>
</head>
<body>
  <div class="container">
    <div class="row">
                <!-- BEGIN INVOICE -->
              <div class="col-xs-12">
                <div class="grid invoice">
                  <div class="grid-body">
                    <div class="invoice-title">
                      <div class="row">
                      </div>
                      <br>
                        <div class="text-center" style="margin-left: 380px">
                          <h2>REPORT<br>
                          <span class="big">Data Relawan</span></h2>
                        </div>
                    </div>
                    <div class="row ml-1">
                      <div class="col-xs-6">
                        <address>
                          <strong>Alamat:</strong><br>
                          Twitter, Inc.<br>
                          795 Folsom Ave, Suite 600<br>
                          San Francisco, CA 94107<br>
                          <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
                      </div>
                    </div>
                    <div class="row" style="width: 140%">
                      <div class="col-md-12">
                        @foreach ($relawan->take(1) as $data => $row)
                          <h3 style="text-transform: uppercase">HASIL REPORT RELAWAN {{$row->user->name}}</h3>
                        @endforeach
                        <table class="table table-striped">
                          <thead>
                            <tr class="line">
                              <td><strong>No</strong></td>
                              <td class="ml-4"><strong>Report Data Relawan</strong></td>
                              <td class="text-center"><strong></strong></td>
                              <td class="text-center"><strong></strong></td>
                              <td class="text-right"><strong>Nama</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><strong>Tim</strong><br></td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                              @foreach ($relawan->take(1) as $data => $row)
                              <td class="text-right">{{$row->Koord_desas->Koord_kecamatans->teams->team}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <td>1</td>
                              <td><strong>Koordinator Kecamatan</strong><br></td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                              @foreach ($relawan->take(1) as $data => $row)
                              <td class="text-right">{{$row->Koord_desas->Koord_kecamatans->nama}}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <td>2</td>
                              <td><strong>Koordinator Desa</strong></td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                              @foreach ($relawan->take(1) as $data => $row)
                              <td class="text-right">{{$row->Koord_desas->nama}}</td>
                              @endforeach

                            </tr>
                            <tr class="line">
                              <td>3</td>
                              <td><strong>Relawan</strong></td>
                              <td class="text-center"></td>
                              <td class="text-center"></td>
                              @foreach ($relawan->take(1) as $data => $row)
                              <td class="text-right">{{$row->user->name}}</td>
                              @endforeach
                            </tr>
                            <tr class="line">
                              <td></td>
                              <td><strong></strong></td>
                              <td class="text-center"></td>
                              <td class="text-right"><strong>Jumlah Konstituante :</strong></td>
                              <td class="text-right">{{$relawan->count()}}</td>
                            </tr>
                            <tr class="line">
                              <td></td>
                              <td><strong></strong></td>
                              <td class="text-center"></td>
                              <td class="text-right"><strong>Verifikasi (Belum |Tidak) :</strong></td>
                              <td class="text-right">{{$belum}} | {{$tidak}}</td>
                            </tr>
                            <tr class="line">
                              <td></td>
                              <td><strong></strong></td>
                              <td class="text-center"></td>
                              <td class="text-right"><strong>Total :</strong></td>
                              <td class="text-right">{{$iya}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-md-12 text-right identity">
                        <p>Designer identity<br><strong>Jeffrey Williams</strong></p>
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
              <!-- END INVOICE -->
            </div>
    </div>

  {{-- {{$relawan->links()}} --}}


</body>
</html>

