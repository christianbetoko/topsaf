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
</div>
