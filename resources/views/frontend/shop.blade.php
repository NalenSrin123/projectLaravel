@extends('frontend.layout')
@section('title')
    Shop
@endsection
@section('content')
<main class="shop">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        @foreach ($product as $value)
                    <div class="col-3">
                        <figure>
                            <div class="thumbnail">
                                @if ($value->regular_price!=0)
                                <div class="status">
                                    Promotion
                                </div>
                                @endif
                                <a href="{{route('product',$value->id)}}">
                                    <img src="{{url('images/',$value->thumbnail)}}" alt="">
                                </a>
                            </div>
                            <div class="detail">
                                <div class="price-list">
                                    <div class="price d-none">US 10</div>
                                    @if ($value->regular_price!=0)
                                        <div class="regular-price "><strike>US {{$value->regular_price}}</strike></div>
                                    @endif
                                    <div class="sale-price ">US {{$value->sale_price}}</div>
                                </div>
                                <h5 class="title">{{$value->proName}}</h5>
                            </div>
                        </figure>
                    </div>
                    @endforeach

                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="{{route('shop')}}">ALL</a>
                        </li>
                        <li>
                            <a href="{{route('get-by-man')}}">Men</a>
                        </li>
                        <li>
                            <a href="{{route('get-by-woman')}}">Women</a>
                        </li>
                        <li>
                            <a href="{{route('get-by-girl')}}">Girl</a>
                        </li>
                        <li>
                            <a href="{{route('get-by-boy')}}">Boy</a>
                        </li>
                    </ul>

                    <h4 class="title mt-4">Price</h4>
                    <div class="block-price mt-4">
                        <a href="{{route('get-by-high-price')}}">High</a>
                        <a href="{{route('get-by-low-price')}}">Low</a>
                    </div>

                    <h4 class="title mt-4">Promotion</h4>
                    <div class="block-price mt-4">
                        <a href="{{route('promotion-product')}}">Promotion Product</a>
                    </div>

                </div>
            </div>
        </div>

    </section>

</main>
@endsection
