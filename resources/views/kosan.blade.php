@extends('layouts.app')

@section('content')
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>Properties List</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Properties List</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="properties-section content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <form method="GET" action="{{ route('kosan') }}">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search..."
                                value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    @foreach ($kosan as $property)
                        <div class="property-box-2">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-pad">
                                    <div class="property-thumbnail">
                                        <a href="#" class="property-img">
                                            <img src="{{ $property->image ? asset('storage/' . $property->image) : 'https://dummyimage.com/hd1080' }}"
                                                alt="properties" class="img-fluid">
                                            <!-- You can add a price or other relevant information here if needed -->
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-pad align-self-center">
                                    <div class="detail">
                                        <h3 class="title">
                                            <a href="#">{{ $property->nama }}</a>
                                        </h3>
                                        <h5 class="location">
                                            <a href="#">
                                                <i class="flaticon-pin"></i>{{ $property->alamat }}
                                            </a>
                                        </h5>
                                        <ul class="facilities-list clearfix">
                                            <!-- If you have more detailed information, list them here -->
                                            <li><i class="flaticon-bed"></i> Kontak: {{ $property->kontak }}</li>
                                            <li><i class="flaticon-bathroom"></i> Lokasi: {{ $property->lokasi }}</li>
                                            <!-- Add more fields if needed -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="pagination-box p-box-2 text-center">
                        {{ $kosan->links() }}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <div class="widget advanced-search widget-2">
                            <h3 class="sidebar-title">Search Properties</h3>
                            <form method="GET" action="{{ route('kosan') }}">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search by name, address, or location" value="{{ request('search') }}">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="search-button">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
