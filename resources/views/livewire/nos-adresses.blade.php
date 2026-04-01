<div>
    	<!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>Nos Adresses</h2>
							<p>Découvrez nos différents points de vente et nos bureaux</p>	
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('nos-adresses') }}">Nos adresses</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

               <!-- Blog Archive -->
		<section id="blogs" class="blog-area archive">
			<div class="container">
				<div class="row">

                    @if($addresses->isNotEmpty())
                    @foreach ($addresses as $address )
<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-blog">
							<div class="blog-img">
								<img src="{{ asset('storage/' . $address->image) }}" alt="{{ $address->name }}">
															</div>
							<div class="blog-body">
								<h3><a href="https://www.google.com/maps/search/?api=1&query={{ $address->latitude }},{{ $address->longitude }}" target="_blank">{{ $address->name }}</a></h3>
								<div class="blog-meta">
									<div class="single-meta">
										
										
									</div>
									<div class="single-meta">
    <p>
        <a style="color: white; text-decoration: none;" href="https://www.google.com/maps/search/?api=1&query={{ $address->latitude }},{{ $address->longitude }}" target="_blank">
            <i class="fa fa-map"></i> <span>Voir sur la carte</span>
        </a>
    </p>
</div>

								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
                    @endforeach
                    @endif
					
					
				</div>
					
			</div>
		</section>	
		<!-- End Blog Archive -->
</div>
