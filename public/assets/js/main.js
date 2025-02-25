! function () {
    "use strict";

    function e() {
        let e = document.querySelector("body"),
            t = document.querySelector("#header");
        (t.classList.contains("scroll-up-sticky") || t.classList.contains("sticky-top") || t.classList.contains("fixed-top")) && (window.scrollY > 100 ? e.classList.add("scrolled") : e.classList.remove("scrolled"))
    }
    document.addEventListener("scroll", e), window.addEventListener("load", e);
    let t = document.querySelector(".mobile-nav-toggle");

    function o() {
        document.querySelector("body").classList.toggle("mobile-nav-active"), t.classList.toggle("bi-list"), t.classList.toggle("bi-x")
    }
    t.addEventListener("click", o), document.querySelectorAll("#navmenu a").forEach(e => {
        e.addEventListener("click", () => {
            document.querySelector(".mobile-nav-active") && o()
        })
    }), document.querySelectorAll(".navmenu .toggle-dropdown").forEach(e => {
        e.addEventListener("click", function (e) {
            e.preventDefault(), this.parentNode.classList.toggle("active"), this.parentNode.nextElementSibling.classList.toggle("dropdown-active"), e.stopImmediatePropagation()
        })
    });
    let l = document.querySelector("#preloader");
    l && window.addEventListener("load", () => {
        l.remove()
    });
    let a = document.querySelector(".scroll-top");

    function r() {
        a && (window.scrollY > 100 ? a.classList.add("active") : a.classList.remove("active"))
    }
    a.addEventListener("click", e => {
        e.preventDefault(), window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }), window.addEventListener("load", r), document.addEventListener("scroll", r), window.addEventListener("load", function e() {
        AOS.init({
            duration: 600,
            easing: "ease-in-out",
            once: !0,
            mirror: !1
        })
    }), window.addEventListener("load", function (e) {
        window.location.hash && document.querySelector(window.location.hash) && setTimeout(() => {
            let e = document.querySelector(window.location.hash),
                t = getComputedStyle(e).scrollMarginTop;
            window.scrollTo({
                top: e.offsetTop - parseInt(t),
                behavior: "smooth"
            })
        }, 100)
    }), document.addEventListener("DOMContentLoaded", () => {
        let e = document.querySelectorAll(".navmenu a");
        if (!e.length) {
            console.error("No navigation menu links found.");
            return
        }

        function t() {
            e.forEach(e => {
                if (!e.hash) return;
                let t = document.querySelector(e.hash);
                if (!t) return;
                let o = window.scrollY + 200;
                o >= t.offsetTop && o <= t.offsetTop + t.offsetHeight ? (document.querySelectorAll(".navmenu a.active").forEach(e => e.classList.remove("active")), e.classList.add("active")) : e.classList.remove("active")
            })
        }
        window.addEventListener("load", t), document.addEventListener("scroll", t), e.forEach(e => {
            e.addEventListener("click", e => {
                var t;
                t = e, document.querySelectorAll(".navmenu a.active").forEach(e => e.classList.remove("active")), t.target.classList.add("active")
            })
        })
    })
}(), document.querySelectorAll(".read-more").forEach(function (e) {
    e.addEventListener("click", function () {
        this.closest(".flip-container").classList.toggle("flip")
    })
}), window.addEventListener("load", function (e) {
    window.location.hash && document.querySelector(window.location.hash) && setTimeout(() => {
        let e = document.querySelector(window.location.hash),
            t = getComputedStyle(e).scrollMarginTop;
        window.scrollTo({
            top: e.offsetTop - parseInt(t),
            behavior: "smooth"
        })
    }, 100)
}), document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll("#navmenu a[data-target]");
    const sections = document.querySelectorAll("section");

    // Scroll and activate link
    const scrollToSection = (targetId) => {
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            window.scrollTo({
                top: targetSection.offsetTop - 50,
                behavior: "smooth"
            });

            activateNavLink(targetId);
        }
    };

    // Activate nav link based on target ID
    const activateNavLink = (targetId) => {
        navLinks.forEach(link => {
            link.classList.toggle("active", link.getAttribute("data-target") === targetId);
        });
    };

    // Handle click on nav links
    navLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            const targetId = link.getAttribute("data-target");
            if (targetId) {
                event.preventDefault();
                scrollToSection(targetId);
            }
        });
    });

    // Update active link on scroll
    const highlightActiveSection = () => {
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
                activateNavLink(section.id);
            }
        });
    };

    window.addEventListener("scroll", highlightActiveSection);

    // On page load: handle query param ?section=...
    const urlParams = new URLSearchParams(window.location.search);
    const sectionParam = urlParams.get("section");

    if (sectionParam) {
        setTimeout(() => {
            scrollToSection(sectionParam);

            // Clean URL (removes ?section=...)
            const cleanURL = `${window.location.origin}${window.location.pathname}`;
            history.replaceState(null, "", cleanURL);
        }, 200); // Delay ensures elements are loaded
    }
});