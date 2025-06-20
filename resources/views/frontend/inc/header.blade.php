<!doctype html>
<html lang="en">

<head>
    <title>CricAuction</title>

    <!-- Required Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="CricAuction | Online Cricket Auction Platform for Teams & Tournaments" />
    <meta name="description"
        content="Create and manage your own cricket auctions online with CricAuction. Real-time bidding, team creation, and live score updates make it perfect for local tournaments and leagues." />

    <meta property="og:title" content="CricAuction | Online Cricket Auction Platform for Teams & Tournaments" />
    <meta property="og:description"
        content="Create and manage your own cricket auctions online with CricAuction. Real-time bidding, team creation, and live score updates make it perfect for local tournaments and leagues." />
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}" />

    <meta name="keywords"
        content="player auction app, cricket auction software, cricket auction app, auction games cricket, cricket auction games, Online Cricket Auction, cricket auction software, online auction website" />

    <!-- Google Search Console -->
    <meta name="google-site-verification" content="Pq2WJ-ByyE3hahiI_3CVgi7m-K4DZbKypi7CYfOyBc0" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{ asset('assets/images/logo.png') }}" rel="icon" />
    <link href="{{ asset('assets/images/logo.png') }}" rel="apple-touch-icon" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet" />

    <!-- slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HN6VXBN3BD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-HN6VXBN3BD');
    </script>
</head>


<body class="index-page">

    <header id="header" class="header align-items-center fixed-top">
        <div class="position-relative align-items-center heading-top">
            <ul>
                <span>Welcome to CricAuction - Cricket Player Auction App for Tournaments where Teams Born!</span>
                <div class="head-top">
                    <a href="https://www.instagram.com/cricauction.official" target="_blank"><img
                            src="{{ asset('assets/images/footer/instagram.png') }}" alt="Instagram"></a>
                    <a href="https://www.youtube.com/@CricAuction1" target="_blank"><img
                            src="{{ asset('assets/images/footer/Youtube.png') }}" alt="Youtube"></a>
                    <li>
                        <a href="tel:+917698767767"><i class="bi bi-telephone"></i>+91 76 98 767 767 /</a><a
                            href="tel:+919978779471"> +91 99 78 779 471</a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="position-relative d-flex align-items-center heading-bottom justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                <h1><span>Cric</span>Auction<sup>TM</sup></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('welcome') }}"
                            class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('auctionlist.today') }}"
                            class="{{ request()->routeIs('auctionlist.today') ? 'active' : '' }}">Today's Auctions</a>
                    </li>
                    <li><a href="{{ route('auctionlist.upcoming') }}"
                            class="{{ request()->routeIs('auctionlist.upcoming') ? 'active' : '' }}">Upcoming
                            Auctions</a></li>
                    <li><a href="{{ route('video_gallery') }}"
                            class="{{ request()->routeIs('video_gallery') ? 'active' : '' }}">Video Gallery</a></li>
                    <li><a href="{{ route('blogs') }}"
                            class="{{ request()->routeIs('blogs') ? 'active' : '' }}">Blogs</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="dropdown open" style="display: none;">
                <button class="btn btn-primary dropdown-toggle drp-btn" type="button" id="triggerId"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/images/user.png') }}" alt="User">
                    Pitaman
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#" tabindex="-1" aria-disabled="true">
                        Action
                    </a>
                </div>
            </div>

        </div>
    </header>
