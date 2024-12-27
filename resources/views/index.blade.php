@extends('frontend.inc.master')

@section('main-container')
    <main class="main pt-5">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('assets/images/hero/hero-bg.png') }}" alt="Background">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex align-items-center">
                        <div class="hero-left">
                            <div class="hero-title" data-aos="fade-up" data-aos-delay="100">
                                <h1><span>Cric</span>Auction</h1>
                            </div>
                            <div class="hero-des" data-aos="fade-up" data-aos-delay="200">
                                <h2>Live Player Bidding & Cricket Tournaments!</h2>
                            </div>
                            <div class="hero-btns" data-aos="fade-up" data-aos-delay="300">
                                <a href=""><img src="{{ asset('assets/images/hero/hero-as.png') }}"
                                        alt="AppStore"></a>
                                <a href=""><img src="{{ asset('assets/images/hero/hero-gp.png') }}"
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
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Today's</span> Auction</h1>
                </div>
                <div class="auctions-details">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('assets/images/auction/auc-1.png') }}" class="card-img-top"
                                    alt="Auction 1">
                                <div class="card-body">
                                    <h5 class="card-title">Gladiator Premier League</h5>
                                    <div class="card-auc">
                                        <img src="{{ asset('assets/images/auction/a1.png') }}" alt="Auction user">
                                        <img src="{{ asset('assets/images/auction/a2.png') }}" style="margin-left: -12px;"
                                            alt="Auction user">
                                        <img src="{{ asset('assets/images/auction/a3.png') }}" style="margin-left: -10px;"
                                            alt="Auction user">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card">
                                <img src="{{ asset('assets/images/auction/auc-2.png') }}" class="card-img-top"
                                    alt="Auction 2">
                                <div class="card-body">
                                    <h5 class="card-title">Gladiator Premier League</h5>
                                    <div class="card-auc">
                                        <img src="{{ asset('assets/images/auction/a1.png') }}" alt="Auction user">
                                        <img src="{{ asset('assets/images/auction/a2.png') }}" style="margin-left: -12px;"
                                            alt="Auction user">
                                        <img src="{{ asset('assets/images/auction/a3.png') }}" style="margin-left: -10px;"
                                            alt="Auction user">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ asset('assets/images/auction/auc-3.png') }}" class="card-img-top"
                                    alt="Auction 2">
                                <div class="card-body">
                                    <h5 class="card-title">Gladiator Premier League</h5>
                                    <div class="card-auc">
                                        <img src="{{ asset('assets/images/auction/a1.png') }}" alt="Auction user">
                                        <img src="{{ asset('assets/images/auction/a2.png') }}" style="margin-left: -12px;"
                                            alt="Auction user">
                                        <img src="{{ asset('assets/images/auction/a3.png') }}" style="margin-left: -10px;"
                                            alt="Auction user">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Auctions Section -->

        <!-- Features Section -->
        <section id="features" class="section features">
            <div class="container">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Our</span> Features</h1>
                </div>
                <div class="features-details">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('assets/images/features/feature-1.png') }}" class="card-img-top"
                                    alt="feature 1">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Live Streaming</a>
                                    <p class="card-text">We provide live streaming overlay for youtube, facebook.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ asset('assets/images/features/feature-2.png') }}" class="card-img-top"
                                    alt="feature 2">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Team Owner View</a>
                                    <p class="card-text">All team owner can live view (points, player profile) on the
                                        mobiles.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ asset('assets/images/features/feature-3.png') }}" class="card-img-top"
                                    alt="feature 3">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Remotly Bid</a>
                                    <p class="card-text">Our Platform Offers Seamless Bidding Through Both Mobile Apps and
                                        Web Access.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="400">
                                <img src="{{ asset('assets/images/features/feature-4.png') }}" class="card-img-top"
                                    alt="feature 4">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary">Player Registration</a>
                                    <p class="card-text">Player Can Register own self from mobile app.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Features Section -->

        <!-- About Section -->
        <section id="about" class="section about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="about-details" data-aos="fade-in" data-aos-delay="300">
                            <div class="about-heading">
                                <h2>About <span><span>Cric</span>Auction</span></h2>
                            </div>
                            <div class="about-content">
                                <p>Each tournament coordinator knows that it is so difficult to figure
                                    out piles of entry forms, make the draws out of it and matches to have an incredible
                                    tournament. Super Player Auction is intended to deal with a competition and gives you
                                    useful, and proficient abilities. Super Player Auction offers loads of functionalities
                                    with unmatched exactness and proficiency. Super Player Auction is made for all type of
                                    sports.</p>
                            </div>
                            <div class="about-btn">
                                <a href="" class="btn btn-primary">Register Now <i
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
                <div class="row py-5">
                    <div class="col-lg-6">
                        <div class="mobile-app-img" data-aos="zoom-in" data-aos-delay="100">
                            <img src="{{ asset('assets/images/mobile-app/mobile-app.png') }}" alt="Mobile App Image">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="mobile-app-details" data-aos="fade-up" data-aos-delay="300">
                            <div class="mobile-app-heading d-flex align-items-center gap-3">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                                <h1><span><span>Cric</span>Auction</span> Mobile App</h1>
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
                            <div class="mobile-app-btn">
                                <a href="" class="btn btn-primary">Register Now <i
                                        class="bi bi-arrow-right-circle-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Mobile App Section -->

        <!-- Help Section -->
        <section id="help" class="section help">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="help-details">
                            <div class="help-heading" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
                                <h1>Help</h1>
                            </div>
                            <div class="help-content pb-5">
                                <div class="row d-flex align-items-center gap-3">
                                    <div class="col-lg-12"  data-aos="fade-up" data-aos-delay="200">
                                        <div class="card help-card-det">
                                            <img src="{{ asset('assets/images/help/h1.png') }}"
                                                class="card-img-left img-fluid" alt="Help 1">
                                            <div class="card-body">
                                                <h5 class="card-title">Create Auction</h5>
                                                <p class="card-text">Once you've filled in the necessary details, click the
                                                    <span>"Create Auction"</span> button to finalize the setup. Get ready to
                                                    embark on an
                                                    exhilarating journey of team building and strategic bidding!
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  data-aos="fade-up" data-aos-delay="300">
                                        <div class="card help-card-det">
                                            <img src="{{ asset('assets/images/help/h2.png') }}"
                                                class="card-img-left img-fluid" alt="Help 1">
                                            <div class="card-body">
                                                <h5 class="card-title">Add Auction Team</h5>
                                                <p class="card-text">Adding teams allows you to establish your pesence in
                                                    the auction and showcase your unique identity. Your team's logo, name,
                                                    and shortcut key. Get ready to build your dream team.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  data-aos="fade-up" data-aos-delay="400">
                                        <div class="card help-card-det">
                                            <img src="{{ asset('assets/images/help/h3.png') }}"
                                                class="card-img-left img-fluid" alt="Help 1">
                                            <div class="card-body">
                                                <h5 class="card-title">Add Auction Player</h5>
                                                <p class="card-text">Get to know the players before you bid. Check out
                                                    their strengths, stats, and playing style to make informed decisions
                                                    during the auction.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  data-aos="fade-up" data-aos-delay="500">
                                        <div class="card help-card-det">
                                            <img src="{{ asset('assets/images/help/h4.png') }}"
                                                class="card-img-left img-fluid" alt="Help 1">
                                            <div class="card-body">
                                                <h5 class="card-title">Start Auction Bid</h5>
                                                <p class="card-text">Enter your bid amount and click the bid button to
                                                    place your bid on the player currently up for auction.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Help Section -->

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

        <!-- Pricing Section -->
        <section id="pricing" class="section pricing">
            <div class="container">
                <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
                    <h2><span>Our</span> Pricing</h2>
                </div>
                <div class="pricing-details">
                    <div class="row">
                        <div class="col-lg-6 price-left order-2 order-lg-1">
                            <div class="row d-flex align-items-center price-images">
                                <div class="col-md-6 col-sm-3 mt-0" data-aos="fade-up" data-aos-delay="100">
                                    <img src="{{ asset('assets/images/pricing/price-1.png') }}" alt="Price 1">
                                </div>
                                <div class="col-md-6 col-sm-3 p-step" data-aos="fade-up" data-aos-delay="200">
                                    <img src="{{ asset('assets/images/pricing/price-2.png') }}" alt="Price 2">
                                </div>
                            </div>

                            <div class="row d-flex align-items-center price-images p-img">
                                <div class="col-md-6 col-sm-3" data-aos="fade-up" data-aos-delay="300">
                                    <img src="{{ asset('assets/images/pricing/price-3.png') }}" alt="Price 1">
                                </div>
                                <div class="col-md-6 col-sm-3 p-step" data-aos="fade-up" data-aos-delay="400">
                                    <img src="{{ asset('assets/images/pricing/price-4.png') }}" alt="Price 2">
                                </div>
                            </div>

                            <div class="row d-flex align-items-center price-images p-img">
                                <div class="col-md-6 col-sm-3" data-aos="fade-up" data-aos-delay="500">
                                    <img src="{{ asset('assets/images/pricing/price-5.png') }}" alt="Price 1">
                                </div>
                                <div class="col-md-6 col-sm-3 p-step" data-aos="fade-up" data-aos-delay="600">
                                    <img src="{{ asset('assets/images/pricing/price-6.png') }}" alt="Price 2">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center order-1 order-lg-2">
                            <div class="pricing-img" data-aos="zoom-in" data-aos-delay="100">
                                <img src="{{ asset('assets/images/pricing/pricing.png') }}" alt="Pricing Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Pricing Section -->

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
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="contact-img text-center" data-aos="zoom-in" data-aos-delay="100">
                                    <img src="{{ asset('assets/images/contact/contact.png') }}" alt="About Image"
                                        class="img-fluid">
                                </div>
                            </div>
                            <!-- Contact Form -->
                            <div class="col-lg-6 col-md-12">
                                <form action="" data-aos="fade-up" data-aos-delay="200">
                                    <!-- Name Fields -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fname"
                                                placeholder="Your Name">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lname"
                                                placeholder="Your Surname">
                                        </div>
                                    </div>
                                    <!-- Email and Mobile Fields -->
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="email" class="form-label">Email id*</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Your Email Id">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="mno" class="form-label">Mobile Number</label>
                                            <input type="tel" class="form-control" id="mno" name="mobile"
                                                placeholder="Your Mobile No" required pattern="[0-9]{10}">
                                        </div>
                                    </div>
                                    <!-- Message Field -->
                                    <div class="mb-4">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Your Message"></textarea>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="d-flex justify-content-center">
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
