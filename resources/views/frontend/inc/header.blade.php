<!doctype html>
<html lang="en">

<head>
    <title>CricAuction</title>

    <!-- Required Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Your description here" />
    <meta name="keywords" content="Your keywords here" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{ asset('assets/images/logo.png') }}" rel="icon" />
    <link href="{{ asset('assets/images/logo.png') }}" rel="apple-touch-icon" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
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
</head>


<body class="index-page">

    <header id="header" class="header align-items-center fixed-top">
        <div class="position-relative  align-items-center heading-top" style="display: none;">
            <ul>
                <span>"Welcome to Cricauction—start bidding on exclusive cricket memorabilia now!"</span>
                <li><a href="tel:+917698767767"><i class="bi bi-telephone"></i>+91 76 98 767 767</a></li>
            </ul>
        </div>
        <div class="position-relative d-flex align-items-center heading-bottom justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                <h1><span>Cric</span>Auction<sup>TM</sup></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('welcome') }}" data-target="hero" class="active">Home</a></li>
                    <li><a data-target="auctions">Auctions</a></li>
                    <li><a data-target="features">Features</a></li>
                    <li><a data-target="help">Help</a></li>
                    <li><a data-target="pricing">Pricing</a></li>
                    <li><a data-target="contactus">Contact Us</a></li>
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