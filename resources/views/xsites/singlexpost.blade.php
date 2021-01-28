@extends('layouts.frontends')
@section('content')
     <!-- ======= About Section ======= -->
     <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <br />
            <div class="col-lg-3 col-md-3 meta-details">
                <div class="user-details row">
                    <p class="user-name col-lg-12 col-md-12 col-6">
                        <span class="lnr lnr-user"></span>
                        <a href="#">{{ $xpost->user->name }}</a>
                       
                    </p>
                    <p class="date col-lg-12 col-md-12 col-6">
                        <span class="lnr lnr-calendar-full"></span>
                        <a href="#">{{ $xpost->created_at->diffForHumans()}}</a>
                       
                    </p>
                </div>
            </div>
            <div class="section-title">
                <br />
            <p>{{ $xpost->title }}</p>
            </div>

            <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                      <img src="frontend/assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                      <div class="member-content">
                        <h4>{{ $xpost->user->name }}</h4>
                        <span>{{ $xpost->user->role }}</span>
                        <p>
                          {!! $xpost->content !!}
                        </p>
                        <div class="social">
                          <a href=""><i class="icofont-twitter"></i></a>
                          <a href=""><i class="icofont-facebook"></i></a>
                          <a href=""><i class="icofont-instagram"></i></a>
                          <a href=""><i class="icofont-linkedin"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3></h3>
                <p class="font-italic">
                    {!! $xpost->content !!}
                </p>
                <a href="about.html" class="learn-more-btn">Learn More</a>
            </div>
            </div>

        </div>
        </section><!-- End About Section -->
@stop