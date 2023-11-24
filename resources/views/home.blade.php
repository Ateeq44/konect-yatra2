@extends('layouts.app')
@section('content')

<!-- Content -->

<main id="content" class="site-main">
	<!-- Home slider html start -->
	<section class="home-slider-section">
		<div class="home-slider">
			<div class="home-banner-items">
				<div class="banner-inner-wrap" style="background-image: url({{asset('assets/images2/96.jpg')}});"></div>
				<div class="banner-content-wrap">
					<div class="container">
						<div class="banner-content text-center">
							<p class="" style="font-size:30px;">A Holy Journey To</p>
							<h2 class="banner-title">NANKANA SAHIB</h2>
							<p>Konnect Yatra is proud to be part of seva for Sikh pilgrims to Nankana Sahib yatra and other sacred Gurdwaras in Pakistan.</p>
							<a href="{{url('contactus')}}" class="button-primary">CONTACT US</a>
							<a href="{{ url('our-info') }}" class="button-primary">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
			<div class="home-banner-items">
				<div class="banner-inner-wrap" style="background-image: url({{asset('assets/images2/44.jpg')}});"></div>
				<div class="banner-content-wrap">
					<div class="container">
						<div class="banner-content text-center">
							<p class="" style="font-size:30px;">A Holy Journey To</p>
							<h2 class="banner-title">KARTARPUR SAHIB</h2>
							<p>Konnect Yatra is proud to be part of seva for Sikh pilgrims to Nankana Sahib yatra and other sacred Gurdwaras in Pakistan.</p>
							<a href="{{url('contactus')}}" class="button-primary">CONTACT US</a>
							<a href="{{ url('our-info') }}" class="button-primary">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
			<div class="home-banner-items">
				<div class="banner-inner-wrap" style="background-image: url({{asset('assets/images2/88.jpg')}});"></div>
				<div class="banner-content-wrap">
					<div class="container">
						<div class="banner-content text-center">
							<p class="" style="font-size:30px;">A Holy Journey To</p>
							<h2 class="banner-title">PANJA SAHIB</h2>
							<p>Konnect Yatra is proud to be part of seva for Sikh pilgrims to Nankana Sahib yatra and other sacred Gurdwaras in Pakistan.</p>
							<a href="{{url('contactus')}}" class="button-primary">CONTACT US</a>
							<a href="{{ url('our-info') }}" class="button-primary">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
		</div>
	</section>
	<!-- slider html start -->

	<!-- Home packages section html start -->
	<section class="package-section" style="margin-top:100px !important;">
		<div class="container">
			<div class="section-heading">
				<div class="row align-items-end">
					<div class="col-lg-5">
						<h5 class="dash-style">EXPLORE GREAT GURDWARAS</h5>
						<h2>TOP GURDWARAS</h2>
					</div>
					<div class="col-lg-7">
						<div class="section-disc">
							This statement underscores the enduring truth that readers are inevitably drawn away from a page's content by its readable nature. This age-old phenomenon highlights the inherent challenge of maintaining focus when confronted with easily digestible information. 
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="row">
				@if(!empty(@$gurdwaras) > 0)
				@foreach(@$gurdwaras as $key => $value)
				<div class="col-lg-3 col-md-6">
					<div class="guide-content-wrap text-center">
						<figure class="guide-image m-0">
							<img style="height: 200px;" src="{{asset('gurdwara_images/'.@$value->gurdwara_image)}}" alt="">
						</figure>
						<div class="guide-content mt-0 mx-0" style="">
							<h5 class="text-dark text-uppercase">{{ @$value->gurdwara_name }}</h5>
							<p>
								{{ @$value->address.', '.@$value->city.', '.@$value->state }}
							</p>

						</div>
					</div>
				</div>
				@endforeach
				@endif 	
				<div class="d-flex justify-content-center w-100 btn-wrap">
					<a href="{{ url('gurdwaras') }}" class="button-text width-6 btn-slider mt-0">View All Gurdwaras <i class="fas fa-arrow-right ml-2"></i></a>
				</div>
			</div>

		</div>
	</section>
	<!-- packages html end -->

	<!-- Home activity section html start -->
	<section class="activity-section" style="margin-top:100px !important;">
		<div class="container">
			<div class="section-heading text-center">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h5 class="dash-style">EXPLORE OUR Gallery</h5>
						<h2>Our Tour Gallery</h2>
						<p>Our Gallery features a collection of captivating photographs capturing the essence of our previous tours. Explore these memorable images that encapsulate the unique moments and experiences from our past journeys.</p>
					</div>
				</div>
			</div>
			<div class="activity-inner row">
				<div class="col-md-12">
					{{-- <div class="row slick">
						@if(count(@$gallery) > 0)
						@foreach(@$gallery as $key => $value)
						<div class="col-lg-6 col-md-6 heading-bx p-lr mb-5">
							<div class="action-box">
								<img src="{{asset('gallery/'.$value->image)}}" style="height: 400px; border-radius: 10px;" alt="">
							</div>
						</div>
						@endforeach
						@endif
					</div> --}}

					<div class="slick-slider">
						@if(count($gallery) > 0)
						@foreach($gallery as $key => $value)
						<div class="element element-1 ml-3"><img src="{{ asset('gallery/'.$value->image) }}"></div>
						@endforeach
						@endif
					</div>

					{{-- small screen carousal --}}


					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="display:none">
						<div class="carousel-inner">
							@if(count($gallery) > 0)
							@foreach($gallery as $key => $value)
							<div class="carousel-item @if($key == 0) active @endif">
								<img class="d-block w-100" src="{{ asset('gallery/'.$value->image) }}" alt="Slide {{ $key }}">
							</div>
							@endforeach
							@endif
						</div>
						<!-- Controls -->
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>


					{{-- small screen carousal --}}

				</div>
			</div>
		</div>
	</section>
	<!-- activity html end -->
	<!-- Home special section html start -->

	<section class="package-section" style="margin-top:100px !important;">
		<div class="container">
			<div class="section-heading text-center">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h5 class="dash-style">EXPLORE GREAT HOTELS</h5>
						<h2>POPULAR <span>HOTELS</span></h2>
						<p>We are connected with five stars hotels in pakistan for your better experience.</p>
					</div>
				</div>
			</div>
			<div class="package-inner">
				<div class="row">
					@if(!empty(@$hotels) > 0)
					@foreach(@$hotels as $key => $value)
					<div class="col-lg-4 col-md-6">
						<div class="package-wrap">
							<figure class="feature-image">
								<a href="">
									<img src="{{asset('hotels/'.@$value->image)}}" style="width: 100%; border-radius: 30px; height: 220px !important;" alt="">
								</a>
							</figure>
							<div class="package-content-wrap">
								<div class="package-content" style="padding: 0 11px 0;">
									<h3 class="mt-4 text-left">
										<a href="#">{{ @$value->name }}</a>
									</h3>
									{{-- <div class="review-area">
										<span class="review-text">(25 reviews)</span>
										<div class="rating-start" title="Rated 5 out of 5">
											<span style="width: 60%"></span>
										</div>
									</div> --}}
									<p>{{ @$value->address.', '.@$value->city.', '.@$value->state }}</p>
									<div class="btn-wrap">
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>

	<section class="package-section" style="margin-top:100px !important;">
		<div class="container">
			<div class="section-heading text-center">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h5 class="dash-style">EXPLORE GREAT LOCATIONS</h5>
						<h2>POPULAR <span>LOCATIONS</span></h2>
						<p>We are connected with five stars hotels in pakistan for your better experience.</p>
					</div>
				</div>
			</div>
			<div class="package-inner">
				<div class="row">
					@if(!empty(@$locations) > 0)
					@foreach(@$locations as $key => $value)
					<div class="col-lg-4 col-md-6">
						<div class="package-wrap">
							<figure class="feature-image">
								<a href="">
									<img src="{{asset('locations/'.@$value->image)}}" style="width: 100%; border-radius: 30px; height: 220px !important;" alt="">
								</a>
							</figure>
							<div class="package-content-wrap">
								<div class="package-content" style="padding: 0 11px 0;">
									<h3 class="mt-4 text-left">
										<a href="#">{{ @$value->name }}</a>
									</h3>
									{{-- <div class="review-area">
										<span class="review-text">(25 reviews)</span>
										<div class="rating-start" title="Rated 5 out of 5">
											<span style="width: 60%"></span>
										</div>
									</div> --}}
									<p>{{ @$value->city.', '.@$value->state }}</p>
									<div class="btn-wrap">
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	<section class="activity-section" style="margin-top:100px !important;">
		<div class="container">
			<div class="section-heading text-center">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h5 class="dash-style">EXPLORE UPCOMING EVENTS</h5>
						<h2>Our UPCOMING EVENTS</h2>
						<p>Upcoming Gurdwara Events To Feed Brain.</p>
					</div>
				</div>
			</div>
			<div class="activity-inner row ">
				<div class="col-md-12">
					<div class="row slick">
						@foreach(@$events as $key => $value)

						<div class="col-lg-6 col-md-6 heading-bx p-lr mb-5" style="box-shadow: 1x 2px 3px black !important;">
							<div class="action-box">
								<img src="{{asset('news_and_events/'.@$value->image)}}" style="height: 400px; border-radius: 10px;" alt="">
							</div>

							<div class="info-bx d-flex py-3">
								<div>
									<div class="event-time mt-4">
										<div class="event-date">{{ date('d', strtotime(@$value->event_date)) }}</div>
										<div class="event-month">{{ date('F', strtotime(@$value->event_date)) }}</div>
									</div>
								</div>
								<div class="event-info">
									<h4 class="event-title"><a href="#">{{ @$value->title }}</a></h4>
									<ul class="media-post">
										<li><a href="#"><i class="fa fa-clock-o"></i> {{ @$value->event_time }}</a></li>
										<li><a href="#"><i class="fa fa-map-marker"></i> {{ @$value->location }}</a></li>
									</ul>
									<p>{{ @$value->description }}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					{{-- small screen slider --}}
					<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" style="display:none">
						<div class="carousel-inner">
							
							@foreach(@$events as $key => $value)
							<div class="carousel-item @if($key == 0) active @endif">
								<img class="d-block w-100" src="{{asset('news_and_events/'.@$value->image)}}" alt="Slide {{ $key }}">
								<div class="info-bx d-flex py-3">
									<div>
										<div class="event-time mt-4">
											<div class="event-date">{{ date('d', strtotime(@$value->event_date)) }}</div>
											<div class="event-month">{{ date('F', strtotime(@$value->event_date)) }}</div>
										</div>
									</div>
									<div class="event-info mt-4">
										<h4 class="event-title"><a href="#">{{ @$value->title }}</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> {{ @$value->event_time }}</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> {{ @$value->location }}</a></li>
										</ul>
										<p>{{ @$value->description }}</p>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
						{{-- small screen slider End --}}
						<!-- Controls -->
						<a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="package-section">
		<div class="container">
			<div class="section-heading text-center">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<h5 class="dash-style">EXPLORE NEWS</h5>
						<h2>POPULAR NEWS</h2>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
					</div>
				</div>
			</div>
			<div class="package-inner">
				<div class="row">
					
					@foreach(@$news as $key => $value)
					<div class="col-lg-4 col-md-6">
						<div class="package-wrap">
							<figure class="feature-image">
								<a href="{{ url('gurdwaras') }}">
									<img src="{{asset('news_and_events/'.@$value->image)}}" style="width: 100%; border-radius: 30px; height: 220px !important;" alt="">
								</a>
							</figure>
							<div class="package-content-wrap">
								<div class="package-meta text-center">
									<ul>
										<li>
											<i class="far fa-calendar"></i>
											{{ date('M d Y', strtotime(@$value->created_at)) }}
										</li>
										<li>
											<i class="fas fa-user"></i>
											By {{ @$value->reported_by }}
										</li>

									</ul>
								</div>
								<div class="package-content" style="padding: 0 11px 0;">
									<h3 class="mt-4 text-left">
										<a href="#">{{ @$value->title }}</a>
									</h3>
									<p class="pb-4">{{ @$value->description }}</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</section>
	<!-- Home contact details section html start -->
	<section class="contact-section" style="margin-top: 130px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="contact-img" style="background-image: url(public/assets/images2/30.jpeg);">
					</div>
				</div>
				<div class="col-lg-8">
					<div class="contact-details-wrap">
						<div class="row">
							<div class="col-sm-4">
								<div class="contact-details">
									<div class="contact-icon">
										<img src="assets/images/icon12.png" alt="">
									</div>
									<ul>
										<li>
											<a href="#"><span class="">rm@konnectyatra.org</span></a>
										</li>
										
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="contact-details">
									<div class="contact-icon">
										<img src="assets/images/icon13.png" alt="">
									</div>
									<ul>
										<li>
											<a href="#">+1 (929) 250-9144</a>
										</li>
										
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="contact-details">
									<div class="contact-icon">
										<img src="assets/images/icon14.png" alt="">
									</div>
									<ul>
										<li>
											18502 Hillside Avenue, Jamaica, NY 11432
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="contact-btn-wrap">
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--  contact details html end -->
</main>

<!-- Content END-->
@endsection
