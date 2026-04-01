<div>
  	<!-- Hero Area -->
		<section  class="hero-area">
			<div  class="hero-slider">
				<!-- Single Slider -->
                @if ($slides->isNotEmpty())
                @foreach ($slides as $slide )
                    <div  class="single-slider" style="background-image:url('{{asset('storage/'. $slide->image)}}')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="hero-content">
									<h1>{{ $slide->title }}</h1>
									<p>{{ $slide->description }}</p>
									<!-- Slider Button -->
									<div class="button">
                                        @if ($slide->url && $slide->text_button)
											<a href="{{ $slide->url }}" class="theme-btn">{{ $slide->text_button }}</a>
										@endif
                                        @if($slide->video_url)
										<div class="video-main">
											<!-- Promo-Video -->
											<div class="promo-video">
												<div class="waves-block">
													<div class="waves wave-1"></div>
													<div class="waves wave-2"></div>
													<div class="waves wave-3"></div>
												</div>
											</div>

											<a href="{{ $slide->video_url }}" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
										</div>
                                        @endif
									</div>
									<!-- End Slider Button -->
								</div>
							</div>
						</div>
					</div>
				</div>
                @endforeach
                    
                @endif
				
				<!-- End Single Slider -->
				
			</div>
		</section>
		<!-- End Hero Area -->
		<!-- Testimonial-Area -->
		<section class="testimonial-area">
			<div class="testimonial-bg" style='background-image: url("{{asset('assets/img/footer-bg.jpg')}}")'>
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-12">
							<div class="section-title">
								<h3 >Témoignages</h3>
								<div class="line-bot"></div>
								<p> Ce que nos clients disent de nous </p>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<!-- Testimonial main -->
			<div class="testimonial-main">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- Testimonial-Slider -->
							<div class="testimnial-slider">
								
								@foreach($temoignages as $temoignage)
									<div class="testimonial-item">
										<div class="row">
											<div class="col-lg-4 col-md-6 col-12">
												<div class="testimnial-left">
													<div class="testimonial-head">
														<img src="{{ asset('storage/' . $temoignage->image) }}" alt="{{ $temoignage->name }}">
													</div>
													<div class="testimonial-bottom">
														<h6>{{ $temoignage->name }}</h6>
														<p style="text-align: center">{{ $temoignage->job }}
															<br> <b>{{ $temoignage->company }}</b>
														</p>
														
													</div>
													<!-- Social Links -->
													<ul class="testimonial-social">
														@if($temoignage->facebook)
														<li><a href="{{ $temoignage->facebook}}"><i class="fa fa-facebook"></i></a></li>
														@endif
														@if($temoignage->twitter)
														<li><a href="{{ $temoignage->twitter }}"><i class="fa fa-twitter"></i></a></li>
														@endif
														@if($temoignage->linkedin)
														<li><a href="{{ $temoignage->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
														@endif
														@if($temoignage->instagram)
														<li><a href="{{ $temoignage->instagram }}"><i class="fa fa-instagram"></i></a></li>
														@endif
														@if($temoignage->youtube)
														<li><a href="{{ $temoignage->youtube }}"><i class="fa fa-youtube"></i></a></li>
														@endif
														@if($temoignage->tiktok)
														<li><a href="{{ $temoignage->tiktok }}"><i class="fa fa-tiktok"></i></a></li>
														@endif
														@if($temoignage->website)
														<li><a href="{{ $temoignage->website }}"><i class="fa fa-globe"></i></a></li>
														@endif

													 
													</ul>
												</div>
											</div>
											<div class="col-lg-8 col-md-6 col-12">
												<div class="testimonial-right">
													<p>{{ $temoignage->content }}</p>
													<div class="stars">
														<ul>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
						 </div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Testimonial Main -->
		</section>
		<!-- End Testimonial Area -->
</div>
