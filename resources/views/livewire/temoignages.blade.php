<div>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="breadcrumbs-content">
                        <h2>Nos témoignages</h2>
                        <p>Les avis de nos clients</p>	
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
                            <li class="active"><a href="{{ route('testimolnials') }}">Témoignages</a></li>
                        </ul>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="testimonial-main">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                
                @foreach($temoignages as $temoignage)
                    <div class="col">
                        <div class="card h-100 testimonial-card shadow-sm border-0">
                            <div class="card-body d-flex flex-column">
                                
                                <div class="testimonial-head mb-3 d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $temoignage->image) }}" 
                                         alt="{{ $temoignage->name }}" 
                                         class="rounded-circle me-3" 
                                         style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #eee;">
                                    <div>
                                        <h6 class="mb-0">{{ $temoignage->name }}</h6>
                                        <small class="text-muted">{{ $temoignage->job }} @ <b>{{ $temoignage->company }}</b></small>
                                    </div>
                                </div>

                                <div class="testimonial-content mb-3 flex-grow-1">
                                    <p class="card-text text-muted" style="font-style: italic;">
                                        <i class="fa fa-quote-left me-2 opacity-50"></i>{{ $temoignage->content }}
                                    </p>
                                </div>

                                @php $videoId = trim($temoignage->youtube_url ?? ''); @endphp

                                @if(!empty($videoId))
                                    <div class="ratio ratio-16x9 mb-3 shadow-sm rounded overflow-hidden mx-n3">
                                        <iframe 
                                            src="https://www.youtube-nocookie.com/embed/{{ $videoId }}?rel=0" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen
                                            loading="lazy">
                                        </iframe>
                                    </div>
                                @endif

                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <div class="stars text-warning">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <div class="social-links">
                                        @if($temoignage->linkedin)
                                            <a href="{{ $temoignage->linkedin }}" target="_blank" class="text-primary ms-2"><i class="fa fa-linkedin"></i></a>
                                        @endif
                                        @if($temoignage->website)
                                            <a href="{{ $temoignage->website }}" target="_blank" class="text-secondary ms-2"><i class="fa fa-globe"></i></a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $temoignages->links() }}
            </div>
        </div>
    </div>
</div>