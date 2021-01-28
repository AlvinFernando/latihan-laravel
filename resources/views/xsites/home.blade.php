@extends('layouts.frontends')
@section('content')
    
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex justify-content-center align-items-center" style="background: url('{{config('xsekolah.image_banner_url')}}');">
            <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
                <h1>{{config('xsekolah.welcome_message')}}</h1>
                <p style="color: white;">{{config('xsekolah.welcome_message2')}}</p>
                <a href="/login" class="btn-get-started">LOGIN</a>
            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Popular Courses Section ======= -->
            <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
               
                <p>Berita Terbaru</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach ($xposts as $xpost)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                        <img class="img-fluid"  src="{{$xpost->thumbnail()}}" alt="thumbnail">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                            
                            </div>
    
                            <p class="meta">{{ $xpost->created_at->diffForHumans() }} 
                                | Oleh <a href="#">{{$xpost->user->name}}</a></p>
                            <h3><a href="{{route('xsite.single.xpost', $xpost->slug)}}">{{$xpost->title}}</a></h3>
                            <p>{!! $xpost->content !!}</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <img src="{{asset('/frontend/assets')}}/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                <span>{{$xpost->user->name}}</span>
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                                <i class="bx bx-user"></i>&nbsp;50
                                &nbsp;&nbsp;
                                <i class="bx bx-heart"></i>&nbsp;65
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> <!-- End Course Item-->
                    @endforeach
                

                </div>

            </div>
            </section><!-- End Popular Courses Section -->


        </main><!-- End #main -->
@stop