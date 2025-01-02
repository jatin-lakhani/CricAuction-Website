@extends('frontend.inc.master')

@section('main-container')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('assets/images/hero/hero-bg.png') }}" alt="Background">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex align-items-center">
                        <div class="hero-left">
                            <div class="hero-title" data-aos="fade-up" data-aos-delay="100">
                                <h1><span>Cric</span>Auction<sup>TM</sup></h1>
                            </div>
                            <div class="hero-des" data-aos="fade-up" data-aos-delay="200">
                                <h2>Live Player Bidding & Cricket Tournaments!</h2>
                            </div>
                            <div class="hero-btns" data-aos="fade-up" data-aos-delay="300">
                                <a href="https://apps.apple.com/us/app/cricauction-cricket-auction/id6504701315"
                                    target="_blank"><img src="{{ asset('assets/images/hero/hero-as.png') }}"
                                        alt="AppStore"></a>
                                <a href="https://play.google.com/store/apps/details?id=com.cricauction.cricket.playerauction&hl=en_IN"
                                    target="_blank"><img src="{{ asset('assets/images/hero/hero-gp.png') }}"
                                        alt="GooglePlay"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
                            <img src="{{ asset('assets/images/hero.png') }}" alt="Hero Image">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Auctions Section -->
        <section id="auctions" class="section auctions">
            <div class="container">
                <div class="section-title pt-4" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Today's</span> Auction</h1>
                </div>
                <div class="auctions-details">
                    <div class="row">
                        @foreach ($auctions as $auction)
                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                                    <img src="{{ $auction->auction_image
                                        ? (str_contains($auction->auction_image, 'drive.google.com')
                                            ? str_replace('/uc?', '/thumbnail?', $auction->auction_image)
                                            : $auction->auction_image)
                                        : asset('assets/images/Auction.png') }}"
                                        class="card-img-top auction_image" id="auction_image"
                                        alt="{{ $auction->auction_name }}">

                                    <div class="card-body">
                                        <h5 class="card-title auction_name" id="auction_name">{{ $auction->auction_name }}
                                        </h5>
                                        <div class="card-auc player_id">
                                            @foreach ($auction->players->take(3) as $player)
                                                <img src="{{ $player->player_image ? (str_contains($player->player_image, 'drive.google.com') ? str_replace('/uc?', '/thumbnail?', $player->player_image) : $player->player_image) : asset('assets/images/default-user.jpg') }}"
                                                    alt="AP">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- /Auctions Section -->

        <!-- Features Section -->
        {{-- <section id="features" class="section features">
            <div class="container">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Our</span> Features</h1>
                </div>
                <div class="features-details">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- /Features Section -->

        <!-- About Section -->
        <section id="about" class="section about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-details" data-aos="fade-in" data-aos-delay="300">
                            <div class="about-heading">
                                <h2>About <span><span>Cric</span>Auction</span><sup>TM</sup></h2>
                            </div>
                            <div class="about-content">
                                <p>Each tournament coordinator knows that it is so difficult to figure
                                    out piles of entry forms, make the draws out of it and matches to have an incredible
                                    tournament. Super Player Auction is intended to deal with a competition and gives you
                                    useful, and proficient abilities. Super Player Auction offers loads of functionalities
                                    with unmatched exactness and proficiency. Super Player Auction is made for all type of
                                    sports.</p>
                            </div>
                            <div class="register-btn">
                                <a href="" class="btn btn-primary" target="_blank">Register Now <i
                                        class="bi bi-arrow-right-circle-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img" data-aos="zoom-in" data-aos-delay="100">
                            <img src="{{ asset('assets/images/about/about.png') }}" alt="About Image">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Mobile App Section -->
        <section id="mobile-app" class="section mobile-app">
            <div class="container">
                <div class="row py-4">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <div class="mobile-app-img" data-aos="zoom-in" data-aos-delay="100">
                            <img src="{{ asset('assets/images/mobile-app/mobile-app.png') }}" alt="Mobile App Image">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center order-lg-2 order-1">
                        <div class="mobile-app-details" data-aos="fade-up" data-aos-delay="300">
                            <div class="mobile-app-heading d-flex align-items-center gap-3">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                                <h1><span><span>Cric</span>Auction<sup>TM</sup></span> Mobile App</h1>
                            </div>
                            <div class="mobile-app-content">
                                <p>CricAuction Mobile Application is the easiest of Player Auction
                                    Software in any sport. Whether it would be Kabaddi, Hockey,
                                    Cricket, Volleyball, Badminton or any other game.</p>
                            </div>
                            <div class="mobile-app-list">
                                <p><i class="bi bi-caret-right-fill"></i>Live Player Data is visible with attractive
                                    designs.</p>
                                <p><i class="bi bi-caret-right-fill"></i>Live update on team points participating in sports
                                    league.</p>
                                <p><i class="bi bi-caret-right-fill"></i>Help is available throughout the program...</p>
                                <p><i class="bi bi-caret-right-fill"></i>Live Streaming of your tournament auction can be
                                    broadcast on the internet...</p>
                            </div>
                            <div class="register-btn">
                                <a href="" class="btn btn-primary" target="_blank">Register Now <i
                                        class="bi bi-arrow-right-circle-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Mobile App Section -->

        <!-- Client Section -->
        <section id="clients" class="section clients">
            <div class="container">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Our</span> Client</h1>
                </div>
                <div class="clients-details">
                    <div class="row text-center align-items-center justify-content-center gap-4" data-aos="zoom-in"
                        data-aos-delay="100">
                        <!-- Column 1 -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 client-img">
                            <img src="{{ asset('assets/images/client/client-1.png') }}" data-aos="fade-up"
                                data-aos-delay="100" alt="Client 1" class="img-fluid">
                        </div>
                        <!-- Column 2 -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 client-img">
                            <img src="{{ asset('assets/images/client/client-2.png') }}" data-aos="fade-up"
                                data-aos-delay="200" alt="Client 2" class="img-fluid">
                        </div>
                        <!-- Column 3 -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 client-img">
                            <img src="{{ asset('assets/images/client/client-3.png') }}" data-aos="fade-up"
                                data-aos-delay="300" alt="Client 3" class="img-fluid">
                        </div>
                        <!-- Column 4 -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 client-img">
                            <img src="{{ asset('assets/images/client/client-4.png') }}" data-aos="fade-up"
                                data-aos-delay="400" alt="Client 4" class="img-fluid">
                        </div>
                        <!-- Column 5 -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 client-img">
                            <img src="{{ asset('assets/images/client/client-5.png') }}" data-aos="fade-up"
                                data-aos-delay="500" alt="Client 5" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Client Section -->

        <!-- Help Section -->
        <section id="help" class="section help">
            <div class="container">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1>Help</h1>
                </div>
                <div class="help-details py-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <img src="{{ asset('assets/images/help/help1.png') }}" class="card-img-top"
                                    alt="Help 1">
                                <div class="card-body">
                                    <h5 class="card-title">Create Auction</h5>
                                    <p class="card-text">Once you've filled in the necessary details, click the
                                        <span>"Create
                                            Auction"</span> button to finalize the setup. Get ready to embark on an
                                        exhilarating
                                        journey of team building and strategic bidding!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="card">
                                <img src="{{ asset('assets/images/help/help2.png') }}" class="card-img-top"
                                    alt="Help 2">
                                <div class="card-body">
                                    <h5 class="card-title">Add Auction Team</h5>
                                    <p class="card-text"><span>Adding teams</span> allows you to establish your presence in the auction
                                        and showcase your unique identity. Your team's logo, name, and shortcut key. Get
                                        ready to build your dream team.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="card">
                                <img src="{{ asset('assets/images/help/help3.png') }}" class="card-img-top"
                                    alt="Help 3">
                                <div class="card-body">
                                    <h5 class="card-title">Add Auction Player</h5>
                                    <p class="card-text">Get to know the <span>Players</span> before you bid.  Check out their strengths, stats, and playing  style to make informed decisions during the auction.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="card">
                                <img src="{{ asset('assets/images/help/help4.png') }}" class="card-img-top"
                                    alt="Help 4">
                                <div class="card-body">
                                    <h5 class="card-title">Start Auction Bid</h5>
                                    <p class="card-text">To participate in the ongoing auction, enter your desired bid amount in the provided field and then click the <span>Bid Button</span> to submit your bid for the player currently up for bidding.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Help Section -->

        <!-- Video Section -->
        {{-- <section id="video" class="section video">
            <div class="container">
                
            </div>
        </section> --}}
        <!-- /Video Section -->

        <!-- Pricing Section -->
        {{-- <section id="pricing" class="section pricing">
            <div class="container">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Our</span> Pricing</h1>
                </div>

            </div>
        </section> --}}
        <!-- /Pricing Section -->

        <!-- Contact Us Section -->
        <section id="contactus" class="section contactus">
            <div class="container py-5">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Contact</span> Us</h1>
                </div>
                <div class="contactus-details pt-4">
                    <div class="container">
                        <div class="row">
                            <!-- Contact Image -->
                            <div class="col-lg-5 col-md-12 mb-4">
                                <div class="contact-img text-center" data-aos="zoom-in" data-aos-delay="100">
                                    <img src="{{ asset('assets/images/contact/contact.png') }}" alt="About Image"
                                        class="img-fluid">
                                </div>
                            </div>
                            <!-- Contact Form -->
                            <div class="col-lg-7 col-md-12">

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('contact.submit') }}" method="POST" data-aos="fade-up"
                                    data-aos-delay="200">
                                    @csrf
                                    <!-- Name Fields -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="fname" class="form-label">First Name*</label>
                                            <input type="text" class="form-control" id="fname" name="fname"
                                                placeholder="Your Name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lname" class="form-label">Last Name*</label>
                                            <input type="text" class="form-control" id="lname" name="lname"
                                                placeholder="Your Surname" required>
                                        </div>
                                    </div>
                                    <!-- Email and Mobile Fields -->
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email id*</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Your Email Id" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="mno" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="mno" name="mno"
                                                placeholder="Your Mobile No">
                                        </div>
                                    </div>
                                    <!-- Message Field -->
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Your Message"></textarea>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="d-flex justify-content-center pt-3">
                                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- /Contact Us Section -->
    </main>
@endsection
