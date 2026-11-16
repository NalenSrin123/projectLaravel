@extends('frontend.layout')
@section('title')
NL SHOPPING
@endsection
@section('content')

<style>
    .shop.news-blog .review .container .image{
        /* background-color: red; */
        width: 100%;
        aspect-ratio: 5 / 4;
    }
    .shop.news-blog .review .container .image img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .shop.news-blog .review .container .detail{
        display: flex;
        flex-direction: column;
       align-items: center;
    }
</style>
<main class="shop news-blog">

    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="image">
                        @if (filled($news->image))
                            <img src="{{ asset('images/' . $news->image) }}" alt="{{ $news->title }}">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="detail">
                        <h3 class="title">{{$news->title}}</h3>
                        <div class="group-size">

                            <div class="description">
                                {{$news->description}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        RELATE NEWS
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($relateNews as $item)
                <div class="col-12 col-sm-6 col-lg-3">
                    <figure>
                        <div class="thumbnail">
                            <a href="{{route('news-detail',$item->id)}}">
                                @if (filled($item->image))
                                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}">
                                @endif
                            </a>
                        </div>
                        <div class="detail">
                            <h3 class="title">{{$item->title}}</h5>
                            <h5 class="description">{{$item->description}}</h5>
                        </div>
                    </figure>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>
@endsection
