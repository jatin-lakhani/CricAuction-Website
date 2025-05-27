@extends('frontend.inc.master')

@section('main-container')
    <main class="page-content">
        <section class="section player-today">
            <div class="container">
                <div class="previous-next-head" data-aos="fade-up" data-aos-delay="100">
                    <h1><span>Upcoming</span> Auctions</h1>
                    <div class="auction-btns">
                        <button id="prevBtn" class="player-button">
                            <img src="{{ asset('assets/images/previous.png') }}" alt="">
                        </button>
                        <button id="nextBtn" class="player-button">
                            <img src="{{ asset('assets/images/next.png') }}" alt="">
                        </button>
                    </div>
                </div>
                <div id="team-rows" data-aos="fade-up" data-aos-delay="150">
                    @foreach ($upcoming_auctions->chunk(6) as $chunk)
                        <div class="team-row">
                            <div class="row custom-changes">
                                @foreach ($chunk as $auction)
                                    <div class="col-lg-6 col-md-12">
                                        <a href="https://cricauction.live/auctions/#/find-auction/?auctionCode={{ $auction->auction_code }}"
                                            class="text-decoration-none" target="_blank">
                                            <div class="card card-list-player">
                                                <div class="team-content">
                                                    <div class="team-image">
                                                        <img src="{{ $auction->auction_image
                                                            ? (str_contains($auction->auction_image, 'drive.google.com')
                                                                ? str_replace('/uc?', '/thumbnail?', $auction->auction_image)
                                                                : $auction->auction_image)
                                                            : asset('assets/images/auction/Auc-2.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="team-detail">
                                                        <h2>{{ $auction->auction_name }}</h2>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="team-subcontent">
                                                                    <i class="bi bi-people"></i>
                                                                    <p>{{ $auction->player_per_team ?? 'N/A' }} Players/Team
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="team-subcontent">
                                                                    <i class="bi bi-award"></i>
                                                                    <p>{{ $auction->points_par_team ?? '100' }} points</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="team-subcontent">
                                                                    <i class="bi bi-clock"></i>
                                                                    <p>{{ \Carbon\Carbon::parse($auction->auction_time)->format('g:i A') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="team-subcontent">
                                                                    <i class="bi bi-calendar"></i>
                                                                    {{ \Carbon\Carbon::parse($auction->auction_date)->format('d-m-Y') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="team-location">
                                                            <i class="bi bi-geo-alt"></i>
                                                            <p>{{ $auction->venue ?? 'Unknown Location' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        let currentIndex = 0;

        function showTeamRow(index) {
            const rows = document.querySelectorAll('#team-rows .team-row');

            rows.forEach((row, i) => {
                row.classList.remove('show');
                row.style.display = 'none';
            });

            const activeRow = rows[index];
            activeRow.style.display = 'flex';

            // Trigger animation
            setTimeout(() => {
                activeRow.classList.add('show');
            }, 10);

            // Update button states
            document.getElementById('prevBtn').disabled = index === 0;
            document.getElementById('nextBtn').disabled = index === rows.length - 1;
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
            const rows = document.querySelectorAll('#team-rows .team-row');
            if (currentIndex < rows.length - 1) {
                currentIndex++;
                showTeamRow(currentIndex);
            }
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showTeamRow(currentIndex);
            }
        });

        // Initial load
        showTeamRow(currentIndex);
    </script>
@endpush
