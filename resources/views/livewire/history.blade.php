<div>
  	<!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>Historique</h2>
							<p>L'historique de notre entreprise</p>	
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('history') }}">Historique</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
        <!-- Service-Area -->
		<section class="service-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
						<div class="section-title">
							
							<h3>NOTRE HISTOIRE</h3>
							<div class="line-bot"></div>
							{!! nl2br($enterprise->historique) !!}
						</div>
					</div>
				</div>
				<div class="row">
                    @if($historyPhotos->isNotEmpty())
                    @php $counter = 1; @endphp
@foreach ($historyPhotos as $photo )
    	<div class="col-lg-4 col-md-4 col-12 wow fadeInUp" data-wow-duration="1s">
						<!-- Single Service -->
						<div class="single-service">
							<!-- Number -->
							<div class="number"><h6>{{ $counter++ }}</h6></div>
							<div class="service-head">
								<div class="">
									<img src="{{ asset('storage/'.$photo->image) }}" alt="{{ $photo->title }}"> 
									
								</div>
							</div>
							<div class="service-content">
								<h4>{{ $photo->title }}</h4>
								<p>{{ $photo->description }}</p>
							</div>
								
						</div>
						<!-- End Single Service -->
					</div>
@endforeach



                    @endif
				
					
				</div>
			</div>
		</section>	
		<!-- End Service Area -->
</div>
