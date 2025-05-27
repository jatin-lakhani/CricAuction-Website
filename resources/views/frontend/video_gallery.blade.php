@extends('frontend.inc.master')

@section('main-container')
    <main class="page-content">

        <!-- Video Tabs -->
        <section class="section privacy privacy-sec" id="privacy">
            <div class="container">
                <div class="privacy-heading pt-2 pb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Video</span> Gallery</h1>
                </div>

                <!-- Nav Tabs -->
                <div class="mb-4 video-tab-buttons" id="videoTab" role="tablist" data-aos="fade-up" data-aos-delay="100">
                    <button class="video-tab active" id="auction-tab" data-bs-toggle="tab" data-bs-target="#auction"
                        type="button" role="tab">Auction Video</button>
                    <button class="video-tab" id="demo-tab" data-bs-toggle="tab" data-bs-target="#demo" type="button"
                        role="tab">Demo Video</button>
                </div>

                <!-- Tab Contents -->
                <div class="tab-content" id="videoTabContent" data-aos="fade-up" data-aos-delay="150">

                    <!-- Auction Videos Tab -->
                    <div class="tab-pane fade show active" id="auction" role="tabpanel">
                        <div class="row g-4">
                            @forelse($auctionVideos as $video)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ $video->url }}" target="_blank" class="card-link">
                                        <div class="card-auction-video h-100">
                                            <div class="video-thumbnail-wrapper">
                                                <img class="card-img-top1"
                                                    src="{{ $video->thumb_image ?? asset('assets/images/gallery/demo_video.jpg') }}" id="profile-img" 
                                                    alt="">
                                                <img class="play-button"
                                                    src="{{ asset('assets/images/gallery/play-button.png') }}"
                                                    alt="Play Button">
                                            </div>
                                            <div class="content-video">
                                                <div class="auction-date-video">
                                                    <i class="bi bi-calendar-fill"></i>
                                                    <p>{{ $video->created_at->format('d-m-Y') }}</p>
                                                </div>
                                                <h5 class="gallery-title">{{ $video->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>No auction videos available.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Demo Videos Tab -->
                    <div class="tab-pane fade" id="demo" role="tabpanel">
                        <div class="row g-4">
                            @forelse($demoVideos as $video)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ $video->url }}" target="_blank" class="card-link">
                                        <div class="card-auction-video h-100">
                                            <div class="video-thumbnail-wrapper">
                                                <img class="card-img-top1"
                                                    src="{{ $video->thumb_image ?? asset('assets/images/gallery/demo_video.jpg') }}" id="profile-img" 
                                                    alt="">
                                                <img class="play-button"
                                                    src="{{ asset('assets/images/gallery/play-button.png') }}"
                                                    alt="Play Button">
                                            </div>
                                            <div class="content-video">
                                                <div class="auction-date-video">
                                                    <i class="bi bi-calendar-fill"></i>
                                                    <p>{{ $video->created_at->format('d-m-Y') }}</p>
                                                </div>
                                                <h5 class="gallery-title">{{ $video->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>No demo videos available.</p>
                            @endforelse
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection
