@extends('layouts.app')
@section('content')

<main id="content" class="site-main">

    <section class="inner-banner-wrap pb-0">
      <div class="inner-baner-container" 
      style="background-image: url(public/assets/images2/News-04.png);background-position: center !important;">
      <div class="container">
        <div class="inner-banner-content">
           <h1 class="inner-title" style="font-size:65px !important;">GURDWARAS</h1>
       </div>
   </div>
</div>
</section>
<section class="package-section" style="margin-top:100px !important;">
    <div class="container">
        <div class="package-inner">
            <div class="row">
                @if(count(@$gurdwaras) > 0)
                @foreach(@$gurdwaras as $key => $value)
                <div class=" col-lg-8 offset-lg-2 section-heading text-center">
                    <div class="">
                        <h2 style="margin-top:100px !important; font-size: 38px !important;">Gurdwaras of {{ $value['state'] }}</h2>
                    </div>
                </div>
                @foreach(@$value['gurdwaras'] as $k => $v)
                <div class="col-lg-4 col-md-6">
                    <div class="package-wrap">
                        <figure class="feature-image m-0">
                            <a href="">
                                <img src="{{asset('gurdwara_images/'.@$v['gurdwara_image'])}}" style="width: 100%; border-radius: 30px; height: 220px !important;" alt="">
                            </a>
                        </figure>
                        <div class="package-content-wrap">
                            <div class="package-content" style="padding: 0 11px 0;">
                                <h3 class="mt-4 text-left">
                                    <a href="#">{{ @$v['gurdwara_name'] }}</a>
                                </h3>
                                    {{-- <div class="review-area">
                                        <span class="review-text">(25 reviews)</span>
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 60%"></span>
                                        </div>
                                    </div> --}}
                                    <p>{{ @$v['address'].', '.@$v['city'].', '.@$v['state'] }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{route('register')}}" class="button-text width-6 btn-slider mt-0">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
