@extends('frontend.inc.master')

@section('main-container')
    <main class="page-content">
        <!-- Page Heading -->
        <section class="section player-today">
            <div class="container">
                <div class="privacy-heading mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h1><span class="frequently">Frequentaly Asked</span> Questions</h1>
                </div>
                <div class="faq-search-wrapper" data-aos="fade-up" data-aos-delay="150">
                    <div class="faq-search-box">
                        <input type="text" id="faqSearchInput" placeholder="Serch Question Here" />
                        <i class="bi bi-search search-icon"></i>
                    </div>
                </div>

                <div class="faq-section" data-aos="fade-up" data-aos-delay="200">
                    @forelse($faqs as $faq)
                        <div class="faq-item">
                            <div class="faq-question" onclick="this.classList.toggle('active')">
                                {{ $faq->question }}
                                <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                            </div>
                            <div class="faq-answer">
                                <p>{!! $faq->answer !!}</p>
                            </div>
                        </div>
                    @empty
                        <p>No FAQs available at this time.</p>
                    @endforelse
                </div>

            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('faqSearchInput');
            const faqItems = document.querySelectorAll('.faq-item');

            // Initially hide all answers
            faqItems.forEach(item => {
                item.querySelector('.faq-answer').style.display = 'none';
            });

            // Click toggle
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');

                question.addEventListener('click', function () {
                    // Hide all other answers
                    faqItems.forEach(other => {
                        if (other !== item) {
                            other.querySelector('.faq-answer').style.display = 'none';
                            other.querySelector('.faq-question').classList.remove('active');
                        }
                    });

                    // Toggle current
                    const isVisible = answer.style.display === 'block';
                    answer.style.display = isVisible ? 'none' : 'block';
                    question.classList.toggle('active', !isVisible);
                });
            });

            // Create and insert 'No results' message
            const noResult = document.createElement('p');
            noResult.id = 'noResult';
            noResult.textContent = 'No FAQs  found.';
            noResult.style.display = 'none';
            noResult.style.marginTop = '20px';
            document.querySelector('.faq-section').appendChild(noResult);

            // Search filter
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let found = false;

                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question').textContent.toLowerCase();
                    if (question.includes(keyword)) {
                        item.style.display = 'block';
                        found = true;
                    } else {
                        item.style.display = 'none';
                    }
                    item.querySelector('.faq-answer').style.display = 'none'; // hide answer on search
                    item.querySelector('.faq-question').classList.remove('active');
                });

                noResult.style.display = found ? 'none' : 'block';
            });
        });
    </script>
@endpush