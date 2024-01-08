@extends('landing-page.layouts')

@section('pageTitle', 'Pricing')

@section('pageContent')
    @include('landing-page.pricing.header')

    <section id="pricing" class="pricing-section pricing-style-3" style="background: #fff">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-90">
                        <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Pilih Paket yang
                            Tepat untuk Anda
                        </h3>
                        <p class="wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Kami menawarkan
                            berbagai paket dengan fitur dan harga yang berbeda, dirancang
                            untuk memenuhi kebutuhan unik Anda. Temukan paket yang paling sesuai dengan bisnis Anda hari
                            ini.</p>
                    </div>
                </div>
            </div>
            <div class="pricing-table-wrapper wow fadeInUp" data-wow-delay=".2s"
                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="pricing-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach ($pricings as $row)
                                    <th>
                                        <h6>{{ $row->title }}</h6>
                                        <h3>
                                            @if (empty($row->price))
                                                Custom
                                            @else
                                                {{ rupiah($row->price) }}
                                            @endif
                                        </h3>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $rows)
                                <tr>
                                    <td>
                                        <p>{{ $key }}</p>
                                    </td>
                                    @foreach ($rows as $item)
                                        <td>
                                            <p @class(['icon', 'active' => $item, 'text-danger' => !$item])>
                                                <i @class([
                                                    'lni',
                                                    'lni-checkmark-circle' => $item,
                                                    'lni-cross-circle text-danger' => !$item,
                                                ])></i>
                                            </p>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
