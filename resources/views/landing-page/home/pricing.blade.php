<section id="pricing') }}" class="pricing-section pricing-style-1 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
                <div class="section-title text-center mb-60">
                    <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Pilih Paket yang
                        Tepat untuk Anda</h3>
                    <p class="wow fadeInUp" data-wow-delay=".4s"
                        style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Kami menawarkan berbagai paket dengan fitur dan harga yang berbeda, dirancang
                        untuk memenuhi kebutuhan unik Anda. Temukan paket yang paling sesuai dengan bisnis Anda hari
                        ini.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($pricings as $row)
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="single-pricing wow fadeInUp" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    @if ($row->is_popular)
                    <span class="button button-sm radius-30 popular-badge">Popular</span>
                    @endif
                    <div class="image">
                        <img src="{{ asset('storage/' . $row->icon_file) }}" alt="{{ $row->title }}">
                    </div>
                    <h6>{{ $row->title }}</h6>
                    <h4>{{ $row->subtitle }}</h4>
                    <h3>{{ rupiah($row->price) }}</h3>
                    <ul>
                        @foreach ($row->items as $item)
                            <li @class(['text-danger' => !$item->is_checked])>
                                <i @class(['lni', 'lni-checkmark-circle' => $item->is_checked, 'lni-cross-circle text-danger' => !$item->is_checked])></i>
                                {{ $item->content }}
                            </li>
                        @endforeach
                    </ul>
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=6287765299386&text=Halo+Perfect+Coding%2C+Saya+(Nama)+dari+(Kota)+mau+bikin..." class="button radius-30">Get Started</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
