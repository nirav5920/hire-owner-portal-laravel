@extends('layouts.common')
@section('content')
    <div class="center">
        <div class="menu">
            <div class="container">
                @if (!auth()->user())
                <div class="row mt-5">
                    <div class="text-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Become a owner</a>
                    </div>
                </div>
                @endif
                @if (auth()->user())
                <div class="row mt-5">
                    <div class="text-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Switch to owner</a>
                    </div>
                </div>
                @endif
                <div class="row align-items-center">
                    <h2 class="text-center mt-5">Products</h2>
                    @include('alert')
                    <div class="menu-center mt-5">
                        <div class="row justify-content-center pb-4">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div class="col-xxl-auto col-xl-3">
                                        <div class="menu-center-cnt">
                                            <a href="{{ route('bookingView', $product->id) }}">
                                                <div class="menu-image">
                                                    @if ($product->image)
                                                        <img src="{{ asset(str_replace('public', 'storage', $product->image)) }}"
                                                            alt="{{ $product->name }}" width="200px">
                                                    @else
                                                        <img src="{{ asset('/images/place_holder.png') }}"
                                                            alt="{{ $product->name }}" width="200px">
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="menu-inner-cnt">
                                                <div>
                                                    <a href="{{ route('bookingView', $product->id) }}">
                                                        <p class="mb-0">
                                                            {{ \Illuminate\Support\Str::limit($product->name, 20) }}</p>
                                                    </a>
                                                    <span>{{ $product->address }}</span>
                                                    <p class="mb-0">{{ number_format($product->price, 2, '.', '') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2>Products is not found</h2>
                            @endif
                        </div>
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
