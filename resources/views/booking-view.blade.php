@extends('layouts.common')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <h2 class="text-center">Book this product</h2>
        </div>
        <div class="row mt-5">
            <div class="col-sm-6">
                <h3 class="text-center">Please fill information for booking</h3>
                <form action="{{ route('getOrder') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback login-error" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- Contact number -->
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact<span class="text-danger">*</span></label>
                        <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror"
                            name="contact" value="{{ old('contact') }}">
                        @error('contact')
                            <span class="invalid-feedback login-error" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback login-error" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- start Date select -->
                    <div class="mb-3">
                        <label for="strat_date" class="form-label">Start Date<span class="text-danger">*</span></label>
                        <input id="strat_date" type="date" class="form-control @error('strat_date') is-invalid @enderror"
                            name="strat_date" value="{{ old('strat_date') }}">
                        @error('strat_date')
                            <span class="invalid-feedback login-error" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- end Date select -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date<span class="text-danger">*</span></label>
                        <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror"
                            name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <span class="invalid-feedback login-error" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Booking Confirm">
                        <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <h3 class="text-center mb-5">Product Details</h3>
                <div class="text-center mb-2">
                    @if ($product->image)
                        <img src="{{ asset(str_replace('public', 'storage', $product->image)) }}"
                            alt="{{ $product->name }}" width="200px">
                    @else
                        <img src="{{ asset('/images/place_holder.png') }}" alt="{{ $product->name }}" width="200px">
                    @endif
                </div>
                <div class="text-center">
                    <p>{{ $product->name }}</p>
                    <p>Price: {{ number_format($product->price, 2, '.', '') }}</p>
                    <p>Condition of item: {{ $product->condition_of_item }}</p>
                    <p>Address: {!! $product->address . '<br />' . $product->contact_number !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
