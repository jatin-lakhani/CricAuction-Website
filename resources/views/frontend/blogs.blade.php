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
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="card-auction-video h-100 blog-card">
                                <div class="video-thumbnail-wrapper">
                                    <img class="blog-image"
                                        src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/gallery/demo_video.jpg') }}"
                                        alt="">
                                </div>
                                <div class="content-video-blog">
                                    <div class="auction-date-video">
                                        <img src="{{ asset('assets/images/blog/calender.png') }}" class="calender"
                                            alt="icon">
                                        <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</p>
                                    </div>
                                    <h5 class="gallery-title">{{ $blog->title }}</h5>
                                    <div class="blog-read">
                                        <a href="{{ route('blog_read', $blog->id) }}">Read More <i
                                                class="bi bi-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
