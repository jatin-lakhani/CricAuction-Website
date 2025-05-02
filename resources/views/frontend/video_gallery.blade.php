@extends('frontend.inc.master')

@section('main-container')
<main class="page-content">
    <!-- Page Heading -->
    <section class="section privacy-sec">
        <div class="container">
            <div class="privacy-heading" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                <h1><span>Video</span> Gallery</h1>
            </div>
        </div>
    </section>

    <!-- Video Tabs -->
    <section class="section privacy" id="privacy">
        <div class="container">

            <!-- Nav Tabs -->
            <div class="mb-4 video-tab-buttons" id="videoTab" role="tablist">
                <button class="video-tab active" id="auction-tab" data-bs-toggle="tab" data-bs-target="#auction" type="button" role="tab">Auction Video</button>
                <button class="video-tab" id="demo-tab" data-bs-toggle="tab" data-bs-target="#demo" type="button" role="tab">Demo Video</button>
            </div>

            <!-- Tab Contents -->
            <div class="tab-content" id="videoTabContent">

                <!-- Auction Videos Tab -->
                <div class="tab-pane fade show active" id="auction" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <a href="https://www.youtube.com/live/z1fm6YK_OuE?si=Px6HkaD0FEuE4Lk8" target="_blank" class="card-link">
                                <div class="card-auction-video h-100">
                                    <div class="video-thumbnail-wrapper">
                                        <img class="card-img-top" src="{{ asset('assets/images/help/help2.png') }}" alt="Auction Video 2">
                                        <img class="play-button" src="{{ asset('assets/images/gallery/play-button.png') }}" alt="Play Button">
                                    </div>                                    
                                    <div class="content-video">
                                        <div class="auction-date-video">
                                            <i class="bi bi-calendar-fill"></i>
                                            <p>06-04-2025</p>
                                        </div>
                                        <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <a href="https://www.youtube.com/live/z1fm6YK_OuE?si=Px6HkaD0FEuE4Lk8" target="_blank" class="card-link">
                                <div class="card-auction-video h-100">
                                    <div class="video-thumbnail-wrapper">
                                        <img class="card-img-top" src="{{ asset('assets/images/help/help2.png') }}" alt="Auction Video 2">
                                        <img class="play-button" src="{{ asset('assets/images/gallery/play-button.png') }}" alt="Play Button">
                                    </div>                                             
                                    <div class="content-video">
                                        <div class="auction-date-video">
                                            <i class="bi bi-calendar-fill"></i>
                                            <p>06-04-2025</p>
                                        </div>
                                        <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <a href="https://www.youtube.com/live/z1fm6YK_OuE?si=Px6HkaD0FEuE4Lk8" target="_blank" class="card-link">
                                <div class="card-auction-video h-100">
                                    <div class="video-thumbnail-wrapper">
                                        <img class="card-img-top" src="{{ asset('assets/images/help/help2.png') }}" alt="Auction Video 2">
                                        <img class="play-button" src="{{ asset('assets/images/gallery/play-button.png') }}" alt="Play Button">
                                    </div>  
                                    <div class="content-video">
                                        <div class="auction-date-video">
                                            <i class="bi bi-calendar-fill"></i>
                                            <p>06-04-2025</p>
                                        </div>
                                        <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Demo Videos Tab -->
                <div class="tab-pane fade" id="demo" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <a href="https://www.youtube.com/live/z1fm6YK_OuE?si=Px6HkaD0FEuE4Lk8" target="_blank" class="card-link">
                                <div class="card-auction-video h-100">
                                    <div class="video-thumbnail-wrapper">
                                        <img class="card-img-top" src="{{ asset('assets/images/gallery/demo_video.jpg') }}" alt="Auction Video 2">
                                        <img class="play-button" src="{{ asset('assets/images/gallery/play-button.png') }}" alt="Play Button">
                                    </div>                                      
                                    <div class="content-video">
                                        <div class="auction-date-video">
                                            <i class="bi bi-calendar-fill"></i>
                                            <p>06-04-2025</p>
                                        </div>
                                        <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <a href="https://www.youtube.com/live/z1fm6YK_OuE?si=Px6HkaD0FEuE4Lk8" target="_blank" class="card-link">
                                <div class="card-auction-video h-100">
                                    <div class="video-thumbnail-wrapper">
                                        <img class="card-img-top" src="{{ asset('assets/images/gallery/demo_video.jpg') }}" alt="Auction Video 2">
                                        <img class="play-button" src="{{ asset('assets/images/gallery/play-button.png') }}" alt="Play Button">
                                    </div>                                      
                                    <div class="content-video">
                                        <div class="auction-date-video">
                                            <i class="bi bi-calendar-fill"></i>
                                            <p>06-04-2025</p>
                                        </div>
                                        <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <a href="https://www.youtube.com/live/z1fm6YK_OuE?si=Px6HkaD0FEuE4Lk8" target="_blank" class="card-link">
                                <div class="card-auction-video h-100">
                                    <div class="video-thumbnail-wrapper">
                                        <img class="card-img-top" src="{{ asset('assets/images/gallery/demo_video.jpg') }}" alt="Auction Video 2">
                                        <img class="play-button" src="{{ asset('assets/images/gallery/play-button.png') }}" alt="Play Button">
                                    </div>                                      
                                    <div class="content-video">
                                        <div class="auction-date-video">
                                            <i class="bi bi-calendar-fill"></i>
                                            <p>06-04-2025</p>
                                        </div>
                                        <h5 class="gallery-title">Khopala Premier League Auction 2025 Auction Moments</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
