@extends('layouts.app')

@section('title', 'Our Premium Remedies - Ayurveda Health Research Center')

@section('content')
    <section class="py-5 bg-primary-light">
        <div class="container py-5 text-center" data-aos="fade-up">
            <h1 class="display-4 mb-3">Our Premium Remedies</h1>
            <p class="lead text-muted">Affordable treatment support and high-quality Ayurvedic medicines for long-term wellness.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Products -->
                @php
                    $products = [
                        [
                            'name' => 'Royal Wellness Saffron Tea', 
                            'cat' => 'Herbal Tea', 
                            'price' => '1,249', 
                            'img' => 'images/herbal-tea.png', 
                            'rating' => 4.8,
                            'desc' => 'A luxurious blend of premium hand-picked saffron and therapeutic Himalayan herbs. Rejuvenates senses and promotes digestive health.'
                        ],
                        [
                            'name' => 'Keshvardhani Hair Vitalizer', 
                            'cat' => 'Herbal Oils', 
                            'price' => '899', 
                            'img' => 'images/herbal-oil.png', 
                            'rating' => 5.0,
                            'desc' => 'Potent blend of Bringraj and Brahmi. Strengthens hair roots and reduces hair fall within 4 weeks.'
                        ],
                        [
                            'name' => 'Ashwagandha Power Plus', 
                            'cat' => 'Herbal Tablets', 
                            'price' => '549', 
                            'img' => 'https://images.unsplash.com/photo-1611073100803-097561f36402?auto=format&fit=crop&w=400&q=80', 
                            'rating' => 4.2,
                            'desc' => 'Maximum strength Ashwagandha for stress management and physical vitality. Improves sleep and immune response.'
                        ],
                        [
                            'name' => 'Kumkumadi Radiance Face Oil', 
                            'cat' => 'Skin Care', 
                            'price' => '1,799', 
                            'img' => 'https://images.unsplash.com/photo-1626784215021-2e39ccf971cd?auto=format&fit=crop&w=400&q=80', 
                            'rating' => 4.9,
                            'desc' => '24K gold dust and pure saffron serum for glowing skin. Treats pigmentation and fine lines.'
                        ],
                        [
                            'name' => 'Neem & Tulsi Purifying Soap', 
                            'cat' => 'Herbal Soaps', 
                            'price' => '249', 
                            'img' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=400&q=80', 
                            'rating' => 5.0,
                            'desc' => 'Natural antibacterial protection with Neem and Tulsi. Keeps skin healthy and infection-free.'
                        ],
                        [
                            'name' => 'Immunity Booster Kit', 
                            'cat' => 'Wellness Kits', 
                            'price' => '2,499', 
                            'img' => 'https://images.unsplash.com/photo-1594463750939-ebb6bd2d4e3e?auto=format&fit=crop&w=400&q=80', 
                            'rating' => 4.7,
                            'desc' => 'A complete kit of essential Ayurvedic supplements to build long-term resistance against illnesses.'
                        ],
                    ];
                @endphp

                @foreach($products as $p)
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="product-card h-100">
                        <div class="product-img-wrapper">
                            <img src="{{ Str::startsWith($p['img'], 'http') ? $p['img'] : asset($p['img']) }}" alt="{{ $p['name'] }}" class="product-img">
                        </div>
                        <div class="product-info">
                            <span class="product-cat">{{ $p['cat'] }}</span>
                            <h5 class="product-title">{{ $p['name'] }}</h5>
                            <div class="rating mb-3">
                                @for($i=0; $i<5; $i++)
                                    <i class="bi bi-star{{ $i < floor($p['rating']) ? '-fill' : ($i < $p['rating'] ? '-half' : '') }}"></i>
                                @endfor
                                ({{ $p['rating'] }})
                            </div>
                            <button class="btn btn-primary w-100 rounded-pill view-product-btn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#productModal"
                                data-title="{{ $p['name'] }}"
                                data-cat="{{ $p['cat'] }}"
                                data-price="₹{{ $p['price'] }}"
                                data-desc="{{ $p['desc'] }}"
                                data-img="{{ Str::startsWith($p['img'], 'http') ? $p['img'] : asset($p['img']) }}">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Product Modal (Same as Index) -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-5 overflow-hidden">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <img src="" id="modalProductImg" class="img-fluid h-100 w-100 object-fit-cover" alt="product">
                        </div>
                        <div class="col-lg-7 p-5">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 mb-2" id="modalProductCat">Category</span>
                                    <h3 class="modal-title h2" id="modalProductTitle" style="color: var(--primary-color);">Product Name</h3>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="text-secondary mb-4" id="modalProductPrice">Price</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold mb-2">Description</h6>
                                <p class="text-muted" id="modalProductDesc" style="line-height: 1.8;">Product description goes here...</p>
                            </div>
                            <div class="d-flex gap-3 mt-5">
                                <a href="{{ url('/booking') }}" class="btn btn-primary rounded-pill px-4">Order Support</a>
                                <button class="btn btn-outline-primary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productButtons = document.querySelectorAll('.view-product-btn');
            const modalTitle = document.getElementById('modalProductTitle');
            const modalCat = document.getElementById('modalProductCat');
            const modalPrice = document.getElementById('modalProductPrice');
            const modalDesc = document.getElementById('modalProductDesc');
            const modalImg = document.getElementById('modalProductImg');

            productButtons.forEach(button => {
                button.addEventListener('click', function() {
                    modalTitle.innerText = this.getAttribute('data-title');
                    modalCat.innerText = this.getAttribute('data-cat');
                    modalPrice.innerText = this.getAttribute('data-price');
                    modalDesc.innerText = this.getAttribute('data-desc');
                    modalImg.src = this.getAttribute('data-img');
                });
            });
        });
    </script>
@endsection

