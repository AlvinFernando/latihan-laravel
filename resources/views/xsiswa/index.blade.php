<!-- views -> siswa -> index.blade.php -->
@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Siswa</h3>
                                <div class="right">
                                    <a href="/xsiswa/exportExcel" class="btn btn-sm btn-primary">Export Excel</a>
                                    <a href="/xsiswa/exportPDF" class="btn btn-sm btn-danger">Export PDF</a>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                                </div>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>Nama Depan</td>
                                            <td>Nama Belakang</td>
                                            <td>Jenis Kelamin</td>
                                            <td>Agama</td>
                                            <td>Alamat</td>
                                            <td>Rata-rata Nilai</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_xsiswa as $xsiswa)
                                        <tr>
                                            <td><a href="/xsiswa/{{$xsiswa->id}}/profile">{{$xsiswa->nama_depan}}</a></td>
                                            <td><a href="/xsiswa/{{$xsiswa->id}}/profile">{{$xsiswa->nama_belakang}}</a></td>
                                            <td>{{$xsiswa->jk}}</td>
                                            <td>{{$xsiswa->agama}}</td>
                                            <td>{{$xsiswa->alamat}}</td> 
                                            <td>{{$xsiswa->rataRataNilai()}}</td>
                                            <td>
                                                <a href="/xsiswa/{{$xsiswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete-xsiswa" xsiswa-id={{$xsiswa->id}}>Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="xsiswa/create" method="POST" enctype="multipart/form-data"> <!-- memanggil controller create-->
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('nama_depan') ? ' has-error' : ''}}">
                          <label for="exampleInputEmail1">Nama Depan</label>
                          <input name ="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                          @if ($errors->has('nama_depan'))
                              <span class="help-block">{{$errors->first('nama_depan')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input name ="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Email</label>
                            <input name ="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('jk') ? ' has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                            <select name ="jk" class="form-control" id="exampleFormControlSelect1">
                              <option value="Pria" {{(old('jk') == 'Pria') ? 'selected' : ''}}>Pria</option>
                              <option value="Wanita" {{(old('jk') == 'Wanita') ? 'selected' : ''}}>Wanita</option>
                            </select>
                            @if ($errors->has('jk'))
                                <span class="help-block">{{$errors->first('jk')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select name ="agama" class="form-control" id="exampleFormControlSelect1">
                              <option value="Islam" {{(old('agama') == 'Islam') ? 'selected' : ''}}>Islam</option>
                              <option value="Kristen" {{(old('agama') == 'Kristen') ? 'selected' : ''}}>Kristen</option>
                              <option value="Katholik" {{(old('agama') == 'Katholik') ? 'selected' : ''}}>Katholik</option>
                              <option value="Hindu" {{(old('agama') == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                              <option value="Budha" {{(old('agama') == 'Budha') ? 'selected' : ''}}>Budha</option>
                              <option value="Kong Hu Chu" {{(old('agama') == 'Kong Hu Chu') ? 'selected' : ''}}>Kong Hu Chu</option>
                            </select>
                            @if ($errors->has('agama'))
                                <span class="help-block">{{$errors->first('agama')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name ="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                        </div>

                        <div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @if ($errors->has('avatar'))
                                <span class="help-block">{{$errors->first('avatar')}}</span>
                            @endif
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script>
        $('.delete-xsiswa').click(function(){
            var xsiswa_id = $(this).attr('xsiswa-id');
            swal({
                title: "Yakin  ? ",
                text: "Mau menghapus data siswa dengan id "+xsiswa_id+" ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/xsiswa/"+xsiswa_id+"/delete";
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        });
    </script>
@endsection
