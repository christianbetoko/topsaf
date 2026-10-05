<div>
    	<!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>A propos</h2>
							<p>En savoir plus sur notre entreprise</p>	
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('about') }}">A propos</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		@if($enterprise)
        <!-- About Area -->
        <section class="about-area py-5">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 col-md-6 col-12 wow fadeInLeft" data-wow-duration="1s">
                        <!-- Image / Logo -->
                        <div class="about-img text-center">
                            @if($enterprise->logo_sans_fond || $enterprise->logo || $enterprise->logo2)
                                <img src="{{ asset('storage/' . ($enterprise->logo_sans_fond ?? $enterprise->logo ?? $enterprise->logo2)) }}" alt="{{ $enterprise->name }}" class="img-fluid rounded">
                            @else
                                <img src="https://via.placeholder.com/470x575" alt="{{ $enterprise->name }}" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 wow fadeInRight" data-wow-duration="1.5s">
                        <!-- About content -->
                        <div class="about-content">
                            <span class="text-primary fw-bold">{{ $enterprise->slogan ?? 'À propos de nous' }}</span>
                            <h2><b>{{ $enterprise->name }}</b></h2>
                            
                            @if($enterprise->about)
                                <p class="mt-3">{!! nl2br(e($enterprise->about)) !!}</p>
                            @endif

                            @if($enterprise->description)
                                <p class="text-muted">{!! nl2br(e($enterprise->description)) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Mission, Vision & Historique -->
                <div class="row mt-4">
                    @if($enterprise->mission)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon me-3 text-primary fs-3">
                                        <i class="fa fa-bullseye"></i>
                                    </div>
                                    <h4 class="m-0">Notre Mission</h4>
                                </div>
                                <p class="text-muted mb-0">{!! nl2br(e($enterprise->mission)) !!}</p>
                            </div>
                        </div>
                    @endif

                    @if($enterprise->vision)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon me-3 text-primary fs-3">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <h4 class="m-0">Notre Vision</h4>
                                </div>
                                <p class="text-muted mb-0">{!! nl2br(e($enterprise->vision)) !!}</p>
                            </div>
                        </div>
                    @endif

                    @if($enterprise->historique)
                        <div class="col-lg-4 col-md-12 col-12 mb-4">
                            <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon me-3 text-primary fs-3">
                                        <i class="fa fa-history"></i>
                                    </div>
                                    <h4 class="m-0">Notre Histoire</h4>
                                </div>
                                <p class="text-muted mb-0">{!! nl2br(e($enterprise->historique)) !!}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>	
        <!-- End About Area -->
    @else
        <div class="container py-5 text-center">
            <p class="text-muted">Aucune information d'entreprise disponible pour le moment.</p>
        </div>
    @endif
</div>
