@extends('layouts.app')

@section('content')
    <!-- Banner start -->
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner banner-slider-inner text-left">
                <div class="carousel-item banner-max-height active">
                    <img class="d-block w-100 h-100" src="{{ asset('img/banner/banner-3.jpg') }}" alt="banner">
                    <div class="banner-overfollow"></div>
                </div>
                <div class="carousel-item banner-max-height">
                    <img class="d-block w-100 h-100" src="{{ asset('img/banner/banner-2.jpg') }}" alt="banner">
                    <div class="banner-overfollow"></div>
                </div>
                <div class="carousel-item banner-max-height">
                    <img class="d-block w-100 h-100" src="{{ asset('img/banner/banner-1.jpg') }}" alt="banner">
                    <div class="banner-overfollow"></div>
                </div>
                <div class="carousel-content container banner-info-2 bi-3 text-center">
                    <h3>Cari Kosan</h3>
                    <a href="{{ route('kosan.index') }}" class="btn btn-white btn-read-more">Read More</a>
                </div>
            </div>
            <!-- Search area 3 start -->
            <div class="search-area-5 none-992">
                <div class="container">
                    <div class="inline-search-area">
                        <div class="row">
                            <!-- Search fields can be added here if needed -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search area 3 end -->
        </div>
    </div>
    <!-- Banner end -->

    <!-- Featured Properties start -->
    <div class="featured-properties content-area-14">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Recommended Properties</h1>
            </div>
            <div class="row">
                @foreach ($recommendedKosan as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="{{ route('kosan.show', $item->id) }}" class="property-img">
                                    <div class="tag">Recommended</div>
                                    <div class="price-box"><span>{{ $item->price ?? '$850.00' }}</span> month</div>
                                    <img class="d-block w-100" src="{{ $item->image ? asset('storage/' . $item->image) : 'https://dummyimage.com/hd1080' }}" alt="properties">
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{ route('kosan.show', $item->id) }}">{{ $item->nama }}</a>
                                </h1>
                                <div class="location">
                                    <a href="{{ route('kosan.show', $item->id) }}">
                                        <i class="flaticon-pin"></i>{{ $item->alamat }}
                                    </a>
                                </div>
                                <div class="score">
                                    <strong>Score: {{ number_format($results[$item->nama], 2) }}</strong>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured Properties end -->
@endsection
