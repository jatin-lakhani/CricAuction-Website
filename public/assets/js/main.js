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
});

/**
   * Navmenu Scrollspy
   */
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const sectionName = urlParams.get('section');

    const scrollToSection = (section) => {
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
            history.replaceState(null, '', window.location.pathname);
        }
    };

    if (sectionName) {
        const targetSection = document.getElementById(sectionName);
        scrollToSection(targetSection);
    }

    document.querySelectorAll('#navmenu a').forEach(link => {
        link.addEventListener('click', function (e) {
            const url = new URL(this.href);
            const sectionParam = url.searchParams.get('section');

            if (window.location.pathname === url.pathname && sectionParam) {
                e.preventDefault();
                const targetSection = document.getElementById(sectionParam);
                scrollToSection(targetSection);
            }
        });
    });
});