<footer id="footer" class="footer position-relative">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('welcome') }}" class="logo d-flex align-items-center text-decoration-none">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="Cric Aution TM">
                    <span>Cric<span>Auction</span><sup>TM</sup></span>
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
                <strong class="h4">Quick Links</strong>
                <nav id="navmenu" style="cursor: pointer;">
                    <ul>
                        <li><a href="{{ route('welcome') }}" class="active">Home</a></li>
                        <li><a href="{{ route('auctionlist.today') }}"
                                class="{{ request()->routeIs('auctionlist.today') ? 'active' : '' }}">Today's
                                Auctions</a></li>
                        <li><a href="{{ route('auctionlist.upcoming') }}"
                                class="{{ request()->routeIs('auctionlist.upcoming') ? 'active' : '' }}">Upcoming
                                Auctions</a></li>
                        <li><a href="{{ route('video_gallery') }}"
                                class="{{ request()->routeIs('video_gallery') ? 'active' : '' }}">Video Gallery</a>
                        </li>
                        <li><a href="{{ route('blogs') }}"
                                class="{{ request()->routeIs('blogs') ? 'active' : '' }}">Blogs</a></li>
                        <li><a href="{{ route('faq') }}"
                                class="{{ request()->routeIs('faq') ? 'active' : '' }}">Faqs</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3 col-md-3 footer-links" data-aos="fade-up" data-aos-delay="300">
                <strong class="h4">Quick Links</strong>
                <nav id="navmenu" style="cursor: pointer;">
                    <ul>
                        <li><a href="{{ route('welcome', ['section' => 'contactus']) }}">Contact Us</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('cancel') }}">Cancellation & Refund</a></li>
                        <li><a href="{{ route('shipping') }}">Shipping & Delivery</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3 col-md-12 footer-links" data-aos="fade-up" data-aos-delay="400">
                <strong class="h4">Contact Us</strong>
                <ul class="con">
                    <li><a href="mailto:info@argonitservices.com"><i class="bi bi-envelope"
                                style="color: #ffffff;"></i>info@argonitservices.com</a></li>
                    <li class="d-block"><i class="bi bi-telephone" style="color: #ffffff;"></i><a
                            href="tel:+917698767767">+91 76 98 767
                            767 /</a> <a href="tel:+919978779471">+91 99 78 779 471</a></li>

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
        <p>© <span>Copyright</span><strong class="px-1 sitename"><a
                    href="{{ url('/') }}">CricAuction</a>.</strong><span>All Rights
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

{{-- Testimonials section script --}}
<script>
    const testimonials = @json($testimonials);
    let currentIndex = 0;

    function updateTestimonial(index) {
        const quoteHeading = document.getElementById('quote-heading');
        const quoteText = document.getElementById('quote-text');
        const profileImg = document.getElementById('profile-img');
        const profileName = document.getElementById('profile-name');
        const profileRating = document.getElementById('profile-rating');

        if (testimonials.length === 0) return;

        const testimonial = testimonials[index];

        quoteHeading.textContent = testimonial.title;
        quoteText.innerHTML = `"${testimonial.review.replace(/\n/g, '<br>')}"`;
        profileImg.src = `{{ asset('') }}` + testimonial.image;
        profileName.textContent = testimonial.name;

        const filledStars = '<i class="bi bi-star-fill"></i>'.repeat(testimonial.rating);
        const emptyStars = '<i class="bi bi-star"></i>'.repeat(5 - testimonial.rating);
        profileRating.innerHTML = filledStars + emptyStars;
    }

    function nextTestimonial() {
        currentIndex = (currentIndex + 1) % testimonials.length;
        updateTestimonial(currentIndex);
    }

    function prevTestimonial() {
        currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
        updateTestimonial(currentIndex);
    }

    // Optional: Auto-play carousel
    setInterval(nextTestimonial, 5000);
</script>


{{-- carousel home today section js --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const prevBtn = document.querySelector('.auction-nav.prev');
        const nextBtn = document.querySelector('.auction-nav.next');
        const carousel = document.querySelector('.auction-carousel');

        if (prevBtn && carousel) {
            prevBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: -320,
                    behavior: 'smooth'
                });
            });
        }

        if (nextBtn && carousel) {
            nextBtn.addEventListener('click', () => {
                carousel.scrollBy({
                    left: 320,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>

{{-- count up number section js --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.count-up');

        const animateCount = (counter) => {
            const target = +counter.getAttribute('data-count');
            let count = 0;
            const increment = Math.ceil(target / 100); // Smooth increment

            const updateCount = () => {
                count += increment;

                if (count < target) {
                    counter.innerText = count;
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target + '+'; // Add + when done
                }
            };

            updateCount();
        };

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.6
        });

        counters.forEach(counter => observer.observe(counter));
    });
</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        grabCursor: true, // for nice hand cursor effect
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

</body>

</html>
