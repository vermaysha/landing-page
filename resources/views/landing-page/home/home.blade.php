@extends('landing-page.layouts')

@section('pageTitle', 'Beranda')

@section('pageContent')
    @include('landing-page.home.header')

    @include('landing-page.home.about')

    @include('landing-page.home.service')

    @include('landing-page.home.pricing')

    @include('landing-page.home.how-to-order')

    @include('landing-page.home.testimonial')
@endsection

