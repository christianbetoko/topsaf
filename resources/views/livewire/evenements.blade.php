<div>
    <!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>Revivez nos événements</h2>
							<p>Nos événements</p>	
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('evenements') }}">Revivez nos événements</a></li>
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

                    @if($events->isNotEmpty())
                    @foreach ($events as $event )
<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-blog">
							<div class="blog-img">
								<img src="{{ asset('storage/' . $event->images[0]) }}" alt="{{ $event->title }}">
								
							</div>
							<div class="blog-body">
								<h3><a href="{{ route('evenement', $event->slug) }}">{{ $event->title }}</a></h3>
								<div class="blog-meta">
									<div class="single-meta">
										
										<p></p>
									</div>
									<div class="single-meta">
    <p>
        <a style="color: white; text-decoration: none;" href="{{ route('evenement', $event->slug) }}">
            <i class="fa fa-eye"></i> <span>En savoir plus</span>
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
				<div class="row">
					<div class="col-12">
						<!-- Start Pagination -->
						<div class="bonik-pagination-main">
                              {{ $events->links() }}
							
						</div>
						<!--/ End Pagination -->
					</div>
				</div>	
			</div>
		</section>	
		<!-- End Blog Archive -->
</div>
