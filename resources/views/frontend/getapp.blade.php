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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

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
    <div id="getapp" class="getapp">
        <div class="container">
            <div class="row">
                <div class="col left-side">
                    <img class="getlogo" src="{{ asset('assets/images/getapp/getapp-logo.png') }}" alt="Logo">
                    <div class="section-details">
                        Manage every player, every bid where teams are born!
                    </div>
                    <div class="section-para">
                        Download our free and easy-to-use cricket auction app.
                    </div>
                    <div class="getlinks">
                        <img src="{{ asset('assets/images/getapp/gplay.png') }}" alt="gplay">
                        <img src="{{ asset('assets/images/getapp/appstore.png') }}" alt="appstore">
                    </div>
                    <div class="getrating">
                        <img src="{{ asset('assets/images/getapp/rate.png') }}" alt="gplay">
                        <img src="{{ asset('assets/images/getapp/rate1.png') }}" alt="appstore">
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-5 right-side text-center">
            <div class="auction-title">Live Player Auction</div>
            <div class="auction-subtitle">Real-Time Player Bidding With Live Updates.</div>
            <div class="app-mockup">
                <img src="{{ asset('assets/images/getapp/get1.png') }}" alt="App Mockup">
            </div>
        </div>
        </section>
</body>

<footer>
</footer>
