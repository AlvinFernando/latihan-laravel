@extends('layouts.frontends')
@section('content')


<section id="contact" class="contact">
    <section id="hero" class="d-flex justify-content-center align-items-center" style="background: unset;">
        <div class="container position-relative aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <h1>Child Today,<br>Leader Tomorrow</h1>
          <p>Dengan kurikulum yang update, kami menjamin lulusan akan mudah terserap di dunia pendidikan jenjang tinggi</p>
          <a href="/login" class="btn-get-started">LOGIN</a>
        </div>
      </section>

    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="col-lg-4 mt-6 mt-lg-0">
        {!! Form::open(['url' => '/postregister', 'class' => 'form-wrap']) !!}
        <h1>PENDAFTARAN</h1>
                <!-- FORM PENDAFTARAN -->
                {!!Form::text('nama_depan','', ['class' => 'form-control', 'placeholder' => 'Nama Depan']);!!}<br />
                {!!Form::text('nama_belakang','', ['class' => 'form-control', 'placeholder' => 'Nama Belakang']);!!}<br />
                
                <div class="form-select" id="service-select">
                {!!Form::select('jk', ['' => 'Pilih Jenis Kelamin', 'Pria' => 'Pria', 'Wanita' => 'Wanita'],'Pria');!!}<br />
                </div>

                <br />
                <div class="form-select" id="service-select">
                {!!Form::select('agama', ['','Agama', 'Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katholik' => 'Katholik', 'Hindu' => 'Hindu','Budha' => 'Budha', 'Kong Hu Chu' => 'Kong Hu Chu'], 'Islam');!!}
                </div>
                <br />
                {!!Form::textarea('alamat','', ['class' => 'form-control', 'placeholder' => 'Alamat']);!!}<br />
                {!!Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email']);!!}<br />
                {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']);!!}<br />
                                      
            <div class="text-center">
              <input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align: center;">
            </div>
            {!! Form::close() !!}
            <!-- END FORM PENDAFTARAN -->

    </div>
  </section>
@stop