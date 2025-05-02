@extends('frontend.inc.master')

@section('main-container')
<main class="page-content">
    <!-- Page Heading -->
    <section class="section player-today">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="previous-next-head">
                <h1><span>Latest</span> News</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card-auction-video h-100 blog-card">
                        <div class="video-thumbnail-wrapper">
                            <img class="blog-image" src="{{ asset('assets/images/blog/blog-image.png') }}">
                        </div>                                    
                        <div class="content-video-blog">
                            <div class="auction-date-video">
                                <i class="bi bi-calendar-fill"></i>
                                <p>06-04-2025</p>
                            </div>
                            <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                            <div class="blog-read">
                                <a href="{{route('blog_read')}}" class="">Read More <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-auction-video h-100 blog-card">
                        <div class="video-thumbnail-wrapper">
                            <img class="blog-image" src="{{ asset('assets/images/blog/blog-image.png') }}">
                        </div>                                    
                        <div class="content-video-blog">
                            <div class="auction-date-video">
                                <i class="bi bi-calendar-fill"></i>
                                <p>06-04-2025</p>
                            </div>
                            <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                            <div class="blog-read">
                                <a href="{{route('blog_read')}}" class="">Read More <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card-auction-video h-100 blog-card">
                        <div class="video-thumbnail-wrapper">
                            <img class="blog-image" src="{{ asset('assets/images/blog/blog-image.png') }}">
                        </div>                                    
                        <div class="content-video-blog">
                            <div class="auction-date-video">
                                <i class="bi bi-calendar-fill"></i>
                                <p>06-04-2025</p>
                            </div>
                            <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                            <div class="blog-read">
                                <a href="{{route('blog_read')}}" class="">Read More <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
