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
                            <h1>The Ultimate Cricket Auction Software</h1>
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
                        <img src="{{ asset('assets/images/hero/hero.png') }}" alt="Cricket Auction Software">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- Auctions Section -->
    <section id="auctions" class="section auctions">
        <div class="container">
            <div class="section-title pt-4" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Today's Cricket Auction">
                <h1><span>{{ $title }}</span> Cricket Auction</h1>
            </div>
            <div class="auctions-details">
                <div class="row">
                    @forelse ($auctions as $auction)
                                    <div class="col-lg-4 col-md-4 auc">
                                        <div class="card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                            <img src="{{ asset('assets/images/auction/Auc-' . $loop->iteration . '.png') }}"
                                                class="auc-img" alt="Auction {{ $loop->iteration }}">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="auction-img">
                                                        <img src="{{ $auction->auction_image
                        ? (str_contains($auction->auction_image, 'drive.google.com')
                            ? str_replace('/uc?', '/thumbnail?', $auction->auction_image)
                            : $auction->auction_image)
                        : asset('assets/images/auction/Auction.png') }}" class="card-img-top auction_image"
                                                            id="auction_image" alt="{{ $auction->auction_name }}">
                                                    </div>
                                                    <div class="text-left">
                                                        <strong class="card-title auction_name" id="auction_name">
                                                            {{ $auction->auction_name }}
                                                        </strong>
                                                        <div class="card-auc player_id">
                                                            @foreach ($auction->players->take(3) as $player)
                                                                <img src="{{ $player->player_image ? (str_contains($player->player_image, 'drive.google.com') ? str_replace('/uc?', '/thumbnail?', $player->player_image) : $player->player_image) : asset('assets/images/default-user.jpg') }}"
                                                                    alt="AP">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    @empty
                        <p>No auctions available at the moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section><!-- /Auctions Section -->

    <!-- Features Section -->
    <section id="features" class="section features">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Our Features">
                <h3><span>Our</span> Features</h3>
            </div>
        </div>
        <div class="container-fluid">
            <div class="features-details">
                <div class="row">
                    <div class="col col-md-6 features-left order-lg-1 order-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="card active" data-target="0">
                            <div class="features-left-content">
                                <div class="card-body fc-main">
                                    <strong class="card-title">Live Player Auction <img
                                            src="{{ asset('assets/images/features/f1.png') }}" alt="F1"></strong>
                                    <p class="card-text">Experience real-time player bidding with</br> dynamic updates
                                        and
                                        seamless functionality.</p>
                                </div>
                                <div class="f-num">
                                    <strong style="padding-right: 10px;">01</strong>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="1">
                            <div class="features-left-content">
                                <div class="card-body fc-main">
                                    <strong class="card-title">Tournament management <img
                                            src="{{ asset('assets/images/features/f2.png') }}" alt="F2"></strong>
                                    <p class="card-text">Create and manage tournaments effortlessly with</br>
                                        customizable
                                        settings for teams, players, and schedules.</p>
                                </div>
                                <div class="f-num">
                                    <strong style="padding-right: 10px;">02</strong>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="2">
                            <div class="features-left-content">
                                <div class="card-body fc-main">
                                    <strong class="card-title">Team Management <img
                                            src="{{ asset('assets/images/features/f3.png') }}" alt="F3"></strong>
                                    <p class="card-text">Add, edit, and organize teams to ensure a</br> streamlined
                                        tournament process.</p>
                                </div>
                                <div class="f-num">
                                    <strong style="padding-right: 10px;">03</strong>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="3">
                            <div class="features-left-content">
                                <div class="card-body fc-main">
                                    <strong class="card-title">Player Management <img
                                            src="{{ asset('assets/images/features/f4.png') }}" alt="F4"></strong>
                                    <p class="card-text">Manage player profiles, stats, and</br> availability for
                                        efficient
                                        team-building.</p>
                                </div>
                                <div class="f-num">
                                    <strong style="padding-right: 10px;">04</strong>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="4">
                            <div class="features-left-content">
                                <div class="card-body fc-main">
                                    <strong class="card-title">Real-Time Updates <img
                                            src="{{ asset('assets/images/features/f5.png') }}" alt="F5"></strong>
                                    <p class="card-text">Get live updates on bids, players,</br> and match progress.
                                    </p>
                                </div>
                                <div class="f-num">
                                    <strong style="padding-right: 10px;">05</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 features-slider order-lg-2 order-1" style="text-align: center;"
                        data-aos="fade-up" data-aos-delay="200">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/images/features/slider/feature-1.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-2.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-3.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-4.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-5.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 5">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-6.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 6">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-7.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 7">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-8.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 8">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-9.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 9">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/images/features/slider/feature-10.png') }}"
                                        class="lazyload" loading="lazy" alt="Feature 10">
                                </div>

                            </div>

                            <button class="carousel-control-prev feature-btn" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next feature-btn" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col col-md-6 features-right order-lg-3 order-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="card" data-target="5">
                            <div class="features-right-content">
                                <div class="f-num">
                                    <strong style="padding-left: 5px;">06</strong>
                                </div>
                                <div class="card-body fc-main">
                                    <strong class="card-title"><img src="{{ asset('assets/images/features/f6.png') }}"
                                            alt="F6"> Web Integration</strong>
                                    <p class="card-text">Share your tournament link for live</br> auction viewing on
                                        the
                                        web.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="6">
                            <div class="features-right-content">
                                <div class="f-num">
                                    <strong style="padding-left: 5px;">07</strong>
                                </div>
                                <div class="card-body fc-main">
                                    <strong class="card-title"><img src="{{ asset('assets/images/features/f7.png') }}"
                                            alt="F7"> Join Tournaments by Code</strong>
                                    <p class="card-text">Simple and secure method to join tournaments</br> using a
                                        unique
                                        tournament code.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="7">
                            <div class="features-right-content">
                                <div class="f-num">
                                    <strong style="padding-left: 5px;">08</strong>
                                </div>
                                <div class="card-body fc-main">
                                    <strong class="card-title"><img src="{{ asset('assets/images/features/f8.png') }}"
                                            alt="F8"> YouTube Live Overlay</strong>
                                    <p class="card-text">Watch live player bids and auction updates with YouTube
                                        streaming in real time!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="8">
                            <div class="features-right-content">
                                <div class="f-num">
                                    <strong style="padding-left: 5px;">09</strong>
                                </div>
                                <div class="card-body fc-main">
                                    <strong class="card-title"><img src="{{ asset('assets/images/features/f9.png') }}"
                                            alt="F9"> Multi-Platform Accessibility</strong>
                                    <p class="card-text">Access CricAuction on both mobile and web</br> platforms for
                                        convenience.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card" data-target="9">
                            <div class="features-right-content">
                                <div class="f-num">
                                    <strong style="padding-left: 5px;">10</strong>
                                </div>
                                <div class="card-body fc-main">
                                    <strong class="card-title"><img src="{{ asset('assets/images/features/f10.png') }}"
                                            alt="F10"> Customizable Bidding Rules</strong>
                                    <p class="card-text">Tailor auction settings like base price, bid increments,</br>
                                        and
                                        player limits to match your preferences.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col order-lg-1 order-2 mobile-features" data-aos="fade-up" data-aos-delay="100">
                        <div id="active-card-container">
                            <div class="card active" data-target="0">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>01</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f1.png') }}" alt="F1">
                                            Live Player Auction</strong>
                                        <p class="card-text">Experience real-time player bidding with dynamic updates
                                            and seamless functionality.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="1">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>02</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f2.png') }}" alt="F2">
                                            Tournament management </strong>
                                        <p class="card-text">Create and manage tournaments effortlessly with
                                            customizable
                                            settings for teams, players, and schedules.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="2">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>03</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f3.png') }}" alt="F3">
                                            Team
                                            Management</strong>
                                        <p class="card-text">Add, edit, and organize teams to ensure a streamlined
                                            tournament process.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="3">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>04</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f1.png') }}" alt="F1">
                                            Player
                                            Management</strong>
                                        <p class="card-text"> Manage player profiles, stats, and availability for
                                            efficient
                                            team-building.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="4">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>05</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f5.png') }}" alt="F5">
                                            Real-Time Updates</strong>
                                        <p class="card-text">Get live updates on bids, players, and match progress.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="5">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>06</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f6.png') }}" alt="F6"
                                                loading="lazy">
                                            Web
                                            Integration</strong>
                                        <p class="card-text">Share your tournament link for live auction viewing on the
                                            web.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="6">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>07</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f7.png') }}" alt="F7"
                                                loading="lazy">
                                            Join Tournaments by Code</strong>
                                        <p class="card-text">Simple and secure method to join tournaments using a
                                            unique tournament code.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="7">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>08</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f8.png') }}" alt="F8">
                                            YouTube Live Overlay</strong>
                                        <p class="card-text">Watch live player bids and auction updates with YouTube
                                            streaming in real time!
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="8">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>09</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f9.png') }}" alt="F9">
                                            Multi-Platform Accessibility</strong>
                                        <p class="card-text">Access CricAuction on both mobile and web platforms for
                                            convenience.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card" data-target="9">
                                <div class="features-mobile">
                                    <div class="fm-num">
                                        <strong>10</strong>
                                    </div>
                                    <div class="card-body fm-main">
                                        <strong class="card-title text-left"><img
                                                src="{{ asset('assets/images/features/f10.png') }}" alt="F10">
                                            Customizable Bidding Rules</strong>
                                        <p class="card-text">Tailor auction settings like base price, bid increments,
                                            and player limits to match your preferences.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Features Section -->

    <!-- About Section -->
    <section id="about" class="section about pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-details" data-aos="fade-in" data-aos-delay="300">
                        <div class="about-heading">
                            <h2>About <span><span>Cric</span>Auction</span><sup></sup></h2>
                        </div>
                        <div class="about-content">
                            <p>
                                CricAuction is a powerful and easy-to-use player auction app designed to simplify
                                tournament management for sports like cricket, football, volleyball, kabaddi, and more.
                                From collecting player entries to running a live cricket auction, everything happens in
                                one streamlined platform.
                            </p>
                            <p>
                                Trusted by thousands of organizers, CricAuction brings professional-level tools to your
                                fingertips—whether you're using a web browser or mobile device. Host fair, fast, and fun
                                auctions with real-time bidding and instant team formation.
                            </p>
                            <p>
                                If you're planning a cricket tournament or looking for a reliable cricket auction
                                platform, CricAuction<sup>TM</sup> is your all-in-one solution for managing player bidding and
                                building balanced teams with ease.
                            </p>
                        </div>
                        <div class="register-btn">
                            <a href="" class="btn btn-primary" target="_blank">Register Now <i
                                    class="bi bi-arrow-right-circle-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ asset('assets/images/about/about.png') }}" alt="About CricAuction">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Mobile App Section -->
    <section id="mobile-app" class="section mobile-app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="mobile-app-img" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ asset('assets/images/mobile-app/mobile-app.png') }}" alt="CricAution Mobile App">
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center order-lg-2 order-1">
                    <div class="mobile-app-details" data-aos="fade-up" data-aos-delay="300">
                        <div class="mobile-app-heading d-flex align-items-center gap-3">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                            <h1><span><span>Cric</span>Auction<sup>TM</sup></span> Mobile App</h1>
                        </div>
                        <div class="mobile-app-content">
                            <p>CricAuction is the easiest and most versatile player auction software, designed for any
                                sport including Cricket, Kabaddi, Hockey, Volleyball, Badminton, and more. Whether you
                                need a cricket auction app or a custom player auction system, our cricket auction
                                software makes live player bidding simple.</p>
                        </div>
                        <div class="mobile-app-list">
                            <div class="list-container">
                                <div class="list-item">
                                    <i class="bi bi-caret-right-fill"></i>
                                    <p>Live Player Data Is Visible With Attractive Designs.</p>
                                </div>
                                <div class="list-item">
                                    <i class="bi bi-caret-right-fill"></i>
                                    <p>Live Update On Team Points Participating In Sports League.</p>
                                </div>
                                <div class="list-item">
                                    <i class="bi bi-caret-right-fill"></i>
                                    <p>Help Is Available Throughout The Program.</p>
                                </div>
                                <div class="list-item">
                                    <i class="bi bi-caret-right-fill"></i>
                                    <p>Live Streaming Of Your Tournament Auction Can Be Broadcast On The Internet.</p>
                                </div>
                            </div>
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
                <img src="{{ asset('assets/images/logo.png') }}" alt="Our Client">
                <h3><span>Our</span> Client</h3>
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
                <img src="{{ asset('assets/images/logo.png') }}" alt="Help">
                <h4>Help</h4>
            </div>
            <div class="help-details">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="{{ asset('assets/images/help/help1.png') }}" class="card-img-top" alt="Help 1">
                            <div class="card-body text-center">
                                <strong class="card-title">Create Auction</strong>
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
                            <img src="{{ asset('assets/images/help/help2.png') }}" class="card-img-top" alt="Help 2">
                            <div class="card-body text-center">
                                <strong class="card-title">Add Auction Team</strong>
                                <p class="card-text"><span>Adding teams</span> allows you to establish your presence in
                                    the auction
                                    and showcase your unique identity. Your team's logo, name, and shortcut key. Get
                                    ready to build your dream team.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="{{ asset('assets/images/help/help3.png') }}" class="card-img-top" alt="Help 3">
                            <div class="card-body text-center">
                                <strong class="card-title">Add Auction Player</strong>
                                <p class="card-text">Get to know the <span>Players</span> before you bid. Check out
                                    their strengths, stats, and playing style to make informed decisions during the
                                    auction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="card">
                            <img src="{{ asset('assets/images/help/help4.png') }}" class="card-img-top" alt="Help 4">
                            <div class="card-body text-center">
                                <strong class="card-title">Start Auction Bid</strong>
                                <p class="card-text">To participate in the ongoing auction, enter your desired bid
                                    amount in the provided field and then click the <span>Bid Button</span> to submit
                                    your bid for the player currently up for bidding.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Help Section -->

    <!-- Video Section -->
    <section id="video" class="section video">
        <div class="container" data-aos="zoom-out" data-aos-delay="300">
            <!-- Video Container -->
            <div id="youtubeVideoContainer" style="position: relative; width: 100%; padding-bottom: 46%; height: 0;">
                <div id="youtubePlayer" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </div>
            </div>
        </div>
    </section>

    <script>
        let player; // Variable to hold the YouTube player instance

        // Load the IFrame Player API asynchronously
        (function loadYouTubeAPI() {
            const tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            const firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        })();

        // This function is called by the YouTube API when it's ready
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtubePlayer', {
                videoId: 'Y2hbvdTRRI4', // Replace with your video ID
                playerVars: {
                    'autoplay': 0, // Video won't autoplay until triggered
                    'controls': 1, // Show player controls
                    'rel': 0, // Don't show related videos at the end
                },
            });
        }

        function playYouTubeVideo() {
            const videoThumbnail = document.getElementById("videoThumbnail");
            const youtubeVideoContainer = document.getElementById("youtubeVideoContainer");

            // Hide the thumbnail and show the YouTube video container
            videoThumbnail.style.display = "none";
            youtubeVideoContainer.style.display = "block";

            // Play the video
            if (player) {
                player.playVideo();
            }
        }

        function pauseYouTubeVideo() {
            if (player) {
                player.pauseVideo();
            }
        }

        function setVideoVolume(volume) {
            if (player) {
                player.setVolume(volume); // Set volume (0 to 100)
            }
        }

        function getVideoDuration() {
            if (player) {
                return player.getDuration(); // Returns the duration in seconds
            }
            return 0;
        }

        function getCurrentTime() {
            if (player) {
                return player.getCurrentTime(); // Returns the current playback time in seconds
            }
            return 0;
        }
    </script><!-- /Video Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="section pricing">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Our Pricing">
                <h5><span>Our</span> Pricing</h5>
            </div>
            <div class="pricing-details">
                <div class="row">
                    <div class="col-lg-4 col-md-4 price" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="{{ asset('assets/images/pricing/pricing-1.png') }}"
                                class="card-img-top pricing-img" alt="Pricing 1">
                            <div class="circle">
                                <img src="{{ asset('assets/images/pricing/p.png') }}" alt="price 1">
                                <h2 style="color: #CD394D;">Free <i class="bi bi-stars"></i></h2>
                            </div>
                            <a href="" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 price" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <img src="{{ asset('assets/images/pricing/pricing-2.png') }}"
                                class="card-img-top pricing-img" alt="Pricing 2">
                            <div class="circle">
                                <img src="{{ asset('assets/images/pricing/p.png') }}" alt="price 2">
                                <h2><span>Rs</span></br>1999/-</h2>
                            </div>
                            <a href="" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 price" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="{{ asset('assets/images/pricing/pricing-3.png') }}"
                                class="card-img-top pricing-img" alt="Pricing 3">
                            <div class="circle">
                                <img src="{{ asset('assets/images/pricing/p.png') }}" alt="price 3">
                                <h2><span>Rs</span></br>2999/-</h2>
                            </div>
                            <a href="" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 price" data-aos="fade-up" data-aos-delay="400">
                        <div class="card">
                            <img src="{{ asset('assets/images/pricing/pricing-4.png') }}"
                                class="card-img-top pricing-img" alt="Pricing 4">
                            <div class="circle">
                                <img src="{{ asset('assets/images/pricing/p.png') }}" alt="price 4">
                                <h2><span>Rs</span></br>3999/-</h2>
                            </div>
                            <a href="" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 price" data-aos="fade-up" data-aos-delay="500">
                        <div class="card">
                            <img src="{{ asset('assets/images/pricing/pricing-5.png') }}"
                                class="card-img-top pricing-img" alt="Pricing 5">
                            <div class="circle">
                                <img src="{{ asset('assets/images/pricing/p.png') }}" alt="price 5">
                                <h2><span>Rs</span></br>4999/-</h2>
                            </div>
                            <a href="" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 price" data-aos="fade-up" data-aos-delay="600">
                        <div class="card">
                            <img src="{{ asset('assets/images/pricing/pricing-6.png') }}"
                                class="card-img-top pricing-img" alt="Pricing 6">
                            <div class="circle">
                                <img src="{{ asset('assets/images/pricing/p.png') }}" alt="price 6">
                                <h2><span>Rs</span></br>5999/-</h2>
                            </div>
                            <a href="" class="btn btn-secondary">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Pricing Section -->

    <!-- Contact Us Section -->
    <section id="contactus" class="section contactus">
        <div class="container py-4">
            <div class="section-title" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Contact Us">
                <h6><span>Contact</span> Us</h6>
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
                        <div class="col-lg-7 col-md-12 contact-form">

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
                                    <div class="col-md-6 con-mar">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                            placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6 con-mar">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname"
                                            placeholder="Your Surname">
                                    </div>
                                </div>
                                <!-- Email and Mobile Fields -->
                                <div class="row">
                                    <div class="col-md-6 con-mar">
                                        <label for="email" class="form-label">Email id*</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Your Email Id" required>
                                    </div>
                                    <div class="col-md-6 con-mar">
                                        <label for="mno" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" id="mno" name="mno"
                                            placeholder="Your Mobile No">
                                    </div>
                                </div>
                                <!-- Message Field -->
                                <div class="con-mar">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea name="message" id="message" class="form-control"
                                        placeholder="Your Message"></textarea>
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
