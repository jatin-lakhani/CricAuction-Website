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
                <input type="text" id="faqSearchInput" placeholder="Serch Question Here"/>
                <i class="bi bi-search search-icon"></i>
                </div>
            </div>
          
            <div class="faq-section">
                <div class="faq-item">
                    <div class="faq-question" onclick="this.classList.toggle('active')">
                        How can I join a cricket tournament?
                        <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>We accept returns within 30 days of purchase. Items must be unused and in original packaging.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="this.classList.toggle('active')">
                        Is my tournament data secure?
                        <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Creating a new auction on the Cricket Auction App is simple and fast. First, log in to your
                        account on the app or website. Once logged in, go to the dashboard and tap on “Create Auction” or “New Tournament”. You’ll be asked to enter important details like the tournament name, location, date, and format.
                        Next, you can customize your auction settings—choose the base price for players, set bid increments, assign team budgets, and decide the maximum number of players per team. After saving the settings, you’ll get a unique tournament code which you can share with participants so they can join. Once the setup is complete, you’re ready to start adding teams and players, and begin the live auction when you're ready!</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="this.classList.toggle('active')">
                        How does live bidding work?
                        <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we ship to over 50 countries. Shipping fees and delivery time depend on your location.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="this.classList.toggle('active')">
                        Can I manage teams and players?                
                        <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we ship to over 50 countries. Shipping fees and delivery time depend on your location.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="this.classList.toggle('active')">
                        Is there a web version of the app?                
                        <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we ship to over 50 countries. Shipping fees and delivery time depend on your location.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="this.classList.toggle('active')">
                        Can I import player data in bulk?                
                        <span class="arrow-icon"> <i class="bi bi-chevron-down arrow-icon"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we ship to over 50 countries. Shipping fees and delivery time depend on your location.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('script')
<script>
  const faqQuestions = document.querySelectorAll('.faq-question');
  const faqAnswers = document.querySelectorAll('.faq-answer');

  faqQuestions.forEach(question => {
    question.addEventListener('click', function () {
      // Close all others
      faqQuestions.forEach(q => {
        if (q !== this) {
          q.classList.remove('active');
          q.nextElementSibling.style.display = 'none';
        }
      });

      // Toggle current
      const answer = this.nextElementSibling;
      const isActive = this.classList.contains('active');
      this.classList.toggle('active', !isActive);
      answer.style.display = !isActive ? 'block' : 'none';
    });
  });

  // Search Filter
  const searchInput = document.getElementById('faqSearchInput');
  searchInput.addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    faqQuestions.forEach(q => {
      const text = q.textContent.toLowerCase();
      const item = q.closest('.faq-item');
      item.style.display = text.includes(keyword) ? 'block' : 'none';
    });
  });
</script>


@endpush