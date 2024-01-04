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
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Kami menawarkan berbagai paket dengan fitur dan harga yang berbeda, dirancang
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
                                <th>
                                    <h6>Basic</h6>
                                    <h3> <span>$</span> 19.00</h3>
                                    <p>Monthly</p>
                                </th>
                                <th>
                                    <h6>Standard</h6>
                                    <h3> <span>$</span> 39.00</h3>
                                    <p>Yearly</p>
                                </th>
                                <th>
                                    <h6>Premium</h6>
                                    <h3> <span>$</span> 59.00</h3>
                                    <p>Yearly</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Carefully crafted components</p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Amazing page examples</p>
                                </td>
                                <td>
                                    <p class="icon"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Super friendly support team</p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Awesome Support</p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                                <td>
                                    <p class="icon active"><i class="lni lni-checkmark-circle"></i></p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="pricing-button">
                                    <a href="#0" class="button border-button radius-10">Buy Basic</a>
                                </td>
                                <td class="pricing-button">
                                    <a href="#0" class="button border-button radius-10">Buy Standard</a>
                                </td>
                                <td class="pricing-button">
                                    <a href="#0" class="button radius-10">Buy Premium</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
