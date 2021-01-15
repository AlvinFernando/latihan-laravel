@extends('layouts.master')
@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="main">

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                @if (session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
                <div class="panel panel-profile">
                <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">

                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img src="{{$xsiswa->getAvatar()}}" class="img-circle" alt="Avatar">
                            <h3 class="name">{{$xsiswa->nama_depan}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        <div class="profile-stat">
                            <div class="row">
                                <div class="col-md-4 stat-item">
                                    <!-- datasiswa -> tabelmapel -> jumlah mapel-->
                                    {{$xsiswa->xmapel->count()}} <span>Mata Pelajaran</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    15 <span>Awards</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    2174 <span>Points</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->

                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">DATA DIRI SISWA</h4>
                            <ul class="list-unstyled list-justify">
                                <li>Jenis Kelamin <span>{{$xsiswa->jk}}</span></li>
                                <li>Agama <span>{{$xsiswa->agama}}</span></li>
                                <li>Alamat <span>{{$xsiswa->alamat}}</span></li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <a href="/xsiswa/{{$xsiswa->id}}/edit" class="btn btn-warning">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->

                <!-- RIGHT COLUMN -->
                <div class="profile-right">
                     <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Nilai
                    </button>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mata Pelajaran</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>KODE</td>
                                        <td>NAMA</td>
                                        <td>SEMESTER</td>
                                        <td>NILAI</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($xsiswa->xmapel as $xmapel)
                                    <tr>
                                        <td>{{$xmapel->kode}}</td>
                                        <td>{{$xmapel->nama}}</td>
                                        <td>{{$xmapel->semester}}</td>
                                        <td><a href="#" class="nilai" data-type="text" data-pk="{{$xmapel->id}}" 
                                            data-url="/api/xsiswa/{{$xsiswa->id}}/editnilai" data-title="Masukkan Nilai">
                                            {{$xmapel->pivot->nilai}}</a></td>
                                        <td>
                                            <a href="/xsiswa/{{$xsiswa->id}}/{{$xmapel->id}}/deletenilai" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Yakin Anda Menghapusnya?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel">
                        <div id="chartNilai">

                        </div>
                    </div>
                </div>
                
                <!-- END RIGHT COLUMN -->
                </div>
                </div>

            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>

        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/xsiswa/{{$xsiswa->id}}/addnilai" method="POST" enctype="multipart/form-data"> <!-- memanggil controller create-->
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="xmapel">Mata Pelajaran</label>
                            <select class="form-control" id="xmapel" name="xmapel">
                                @foreach ($xmatapelajaran as $xmp)
                                    <option value="{{$xmp->id}}">{{$xmp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{$errors->has('nilai') ? ' has-error' : ''}}">
                          <label for="exampleInputEmail1">Nilai</label>
                          <input name ="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
                          @if ($errors->has('nilai'))
                              <span class="help-block">{{$errors->first('nilai')}}</span>
                          @endif
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
            </div>
        </div>
@stop

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script>
        Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Nilai Siswa'
            },
            xAxis: {
                categories: {!!json_encode($xcategories)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Nilai',
                data: {!!json_encode($xdata)!!}

            }]
        });

        $(document).ready(function() {
            $('.nilai').editable();
        });
    </script>
@endsection