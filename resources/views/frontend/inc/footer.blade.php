<footer id="footer" class="footer position-relative">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('welcome') }}" class="logo d-flex align-items-center text-decoration-none">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
                    <h1>Cric<span>Auction</span><sup>TM</sup></h1>
                </a>
                <div class="footer-contact">
                    <a href="https://play.google.com/store/apps/details?id=com.cricauction.cricket.playerauction&hl=en_IN"
                        target="_blank"><img src="{{ asset('assets/images/footer/google-play.png') }}" class="pb-3"
                            alt=""></a>
                    <a href="https://apps.apple.com/us/app/cricauction-cricket-auction/id6504701315"
                        target="_blank"><img src="{{ asset('assets/images/footer/app-store.png') }}" alt=""></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links" data-aos="fade-up" data-aos-delay="200">
                <h4>Quick Links</h4>
                <nav style="cursor: pointer;">
                    <ul>
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="{{ route('welcome') }}#auctions">Auctions</a></li>
                        <li><a href="{{ route('welcome') }}#features">Features</a></li>
                        <li><a href="{{ route('welcome') }}#help">Help</a></li>
                        <li><a href="{{ route('welcome') }}#pricing">Pricing</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3 col-md-3 footer-links" data-aos="fade-up" data-aos-delay="300">
                <h4>Quick Links</h4>
                <nav style="cursor: pointer;">
                    <ul>
                        <li><a href="{{ route('welcome') }}#contactus">Contact Us</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/terms">Terms & Conditions</a></li>
                        <li><a href="/cancel">Cancellation & Refund</a></li>
                        <li><a href="/shipping">Shipping & Delivery</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3 col-md-12 footer-links" data-aos="fade-up" data-aos-delay="400">
                <h4>Contact Us</h4>
                <ul class="con">
                    <li><a href="mailto:info@argonitservices.com"><i class="bi bi-envelope"
                                style="color: #ffffff;"></i>info@argonitservices.com</a></li>
                    <li><a href="tel:+917698767767"><i class="bi bi-telephone" style="color: #ffffff;"></i>+91 76 98 767
                            767 </a></li>

                    <li class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=61571234099766" target="_blank"><img
                                src="{{ asset('assets/images/footer/facebook.png') }}" alt="Facebook"></a>
                        <a href="https://www.instagram.com/cricauction.official" target="_blank"><img
                                src="{{ asset('assets/images/footer/instagram.png') }}" alt="Instagram"></a>
                        <a href="https://www.youtube.com/@CricAuction-o9q" target="_blank"><img
                                src="{{ asset('assets/images/footer/Youtube.png') }}" alt="YouTube"></a>
                        <a href="https://www.linkedin.com/company/cricauction" target="_blank"><img
                                src="{{ asset('assets/images/footer/linkedin.png') }}" alt="LinkedIn"></a>
                        <a href="https://x.com/Cricauctio52918" target="_blank"><img
                                src="{{ asset('assets/images/footer/twitter.png') }}" alt="Twitter"></a>
                    </li>
                </ul>

            </div>

        </div>
    </div>

    <div class="container-fluid copyright text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"><a href="{{ url('/') }}">CricAuction</a>.
            </strong><span>All Rights
                Reserved</span></p>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

<script>
    AOS.init();
</script>

<script>
    // Function to play the video and hide the thumbnail
    function playVideo() {
        const video = document.getElementById("myVideo");
        const thumbnail = document.getElementById("videoThumbnail");

        // Hide the thumbnail and show the video
        thumbnail.style.display = "none";
        video.style.display = "block";

        // Start playing the video
        video.play();

        // Add an event listener for when the video ends
        video.addEventListener("ended", showThumbnail);
    }

    // Function to show the thumbnail when the video finishes
    function showThumbnail() {
        const video = document.getElementById("myVideo");
        const thumbnail = document.getElementById("videoThumbnail");

        // Hide the video and show the thumbnail
        video.style.display = "none";
        thumbnail.style.display = "block";
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.features-left .card, .features-right .card');
        const carousel = document.querySelector('#carouselExample');

        cards.forEach((card) => {
            card.addEventListener('mouseenter', function() {
                // Remove the active class from all cards
                cards.forEach((c) => c.classList.remove('active'));

                // Add the active class to the hovered card
                this.classList.add('active');

                // Get the target index for the carousel
                const targetIndex = parseInt(this.getAttribute('data-target'), 10);
                const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
                carouselInstance.to(targetIndex);
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.mobile-features .card');
        const carousel = document.querySelector('#carouselExample');
        const carouselInner = document.querySelector('.carousel-inner');
        const activeCardContainer = document.querySelector('#active-card-container');

        // Function to activate the card and update the active card container
        function activateCard(index) {
            cards.forEach((card) => card.classList.remove('active'));
            const targetCard = Array.from(cards).find((card) => parseInt(card.getAttribute('data-target'),
                10) === index);

            if (targetCard) {
                targetCard.classList.add('active');
                updateActiveCardContent(targetCard);
            }
        }

        // Function to update the active card content in the container
        function updateActiveCardContent(card) {
            const title = card.querySelector('.card-title').innerHTML;
            const text = card.querySelector('.card-text').innerHTML;
            const image = card.querySelector('img').outerHTML;

            activeCardContainer.innerHTML = `
            <div class="card active">
                <div class="features-mobile">
                    <div class="fm-num">${card.querySelector('.fm-num').innerHTML}</div>
                    <div class="card-body fm-main">
                        <h5 class="card-title text-left">${title}</h5>
                        <p class="card-text">${text}</p>
                    </div>
                </div>
            </div>
        `;
        }

        // Handle card hover to change carousel slide and active card
        cards.forEach((card) => {
            card.addEventListener('mouseenter', function() {
                // Remove the active class from all cards
                cards.forEach((c) => c.classList.remove('active'));

                // Add the active class to the hovered card
                this.classList.add('active');

                // Get the target index for the carousel
                const targetIndex = parseInt(this.getAttribute('data-target'), 10);
                const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);
                carouselInstance.to(targetIndex);
            });
        });

        // Update active card when the carousel slide changes
        carousel.addEventListener('slide.bs.carousel', function(event) {
            activateCard(event.to);
        });

        // Handle "Previous" and "Next" buttons to sync active card with slide
        const prevBtn = document.querySelector('.carousel-control-prev');
        const nextBtn = document.querySelector('.carousel-control-next');

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', function() {
                const activeIndex = [...carouselInner.children].findIndex((item) =>
                    item.classList.contains('active')
                );
                const newIndex = (activeIndex - 1 + carouselInner.children.length) % carouselInner
                    .children.length;
                activateCard(newIndex);
            });

            nextBtn.addEventListener('click', function() {
                const activeIndex = [...carouselInner.children].findIndex((item) =>
                    item.classList.contains('active')
                );
                const newIndex = (activeIndex + 1) % carouselInner.children.length;
                activateCard(newIndex);
            });
        }

        // Initialize the active card content on load
        activateCard(0);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
</body>

</html>
