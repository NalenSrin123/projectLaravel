@extends('frontend.layout')
@section('title')
   NL SHOPPING
@endsection
@section('content')
    <main class="home">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            NEW PRODUCTS
                        </h3>
                    </div>
                </div>
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
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            PROMOTION PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($promotion as $value)

                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">

                                    <div class="status">
                                        Promotion
                                    </div>

                                    <a href="{{route('product',$value->id)}}">
                                        <img src="{{url('images/',$value->thumbnail)}}" alt="">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        <div class="price d-none">US 10</div>
                                            <div class="regular-price "><strike>US {{$value->regular_price}}</strike></div>

                                        <div class="sale-price ">US {{$value->sale_price}}</div>
                                    </div>
                                    <h5 class="title">{{$value->proName}}</h5>
                                </div>
                            </figure>
                        </div>
                       
                    @endforeach
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            POPULAR PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($popular as $value)
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
            <div class="mx-5 mt-5">
                {{$product->links()}}
            </div>
        </section>

    </main>
@endsection
