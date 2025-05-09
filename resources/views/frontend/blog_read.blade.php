@extends('frontend.inc.master')

@section('main-container')
<main class="page-content">
    <!-- Page blog -->
    <section class="section blog-sec">
        <div class="container">
            <div class="blog-heading" data-aos="fade-up" data-aos-delay="100">
                {!! nl2br(e($blog->title)) !!}
            </div>
            <div class="image-read">
                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/gallery/demo_video.jpg') }}" alt="">
            </div>
            <div class="read-date">
                <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }} By Admin</p>
            </div>
            <div class="read-head">
                <p>{{ $blog->short_description }}</p>
            </div>
            <div class="read-content">
                {!! nl2br(e($blog->long_description)) !!}
            </div>
        </div>
    </section>
</main>
@endsection
