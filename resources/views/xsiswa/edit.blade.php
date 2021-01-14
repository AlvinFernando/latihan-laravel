<!-- views -> siswa -> index.blade.php -->
@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Edit Data Siswa</h1>
                    @if (session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                        </div>
                    @endif
                    
                    <div class="row">  
                        <div class="col-lg-12">  
                        <form action="/xsiswa/{{$xsiswa->id}}/update" method="POST" enctype="multipart/form-data"> <!-- memanggil controller create-->
                            {{csrf_field()}}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Nama Depan</label>
                            <input name ="nama_depan" type="text" class="form-control" id="exampleInputEmail1" 
                                aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$xsiswa->nama_depan}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Belakang</label>
                                <input name ="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$xsiswa->nama_belakang}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                <select name ="jk" class="form-control" id="exampleFormControlSelect1">
                                <option value="Pria" @if($xsiswa->jk == 'Pria') selected @endif>Pria</option>
                                <option value="Wanita" @if($xsiswa->jk == 'Wanita') selected @endif>Wanita</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Agama</label>
                                <select name ="agama" class="form-control" id="exampleFormControlSelect1">
                                <option value="Islam" @if($xsiswa->agama == 'Islam') selected @endif>Islam</option>
                                <option value="Kristen" @if($xsiswa->agama == 'Kristen') selected @endif>Kristen</option>
                                <option value="Katholik" @if($xsiswa->agama == 'Katholik') selected @endif>Katholik</option>
                                <option value="Hindu" @if($xsiswa->agama == 'Hindu') selected @endif>Hindu</option>
                                <option value="Budha" @if($xsiswa->agama == 'Budha') selected @endif>Budha</option>
                                <option value="Kong Hu Chu" @if($xsiswa->agama == 'Kong Hu Chu') selected @endif>Kong Hu Chu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name ="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$xsiswa->alamat}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                
                            </div>

                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        </form>

                    </div> 
                    </div>    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content1')
            
@endsection

