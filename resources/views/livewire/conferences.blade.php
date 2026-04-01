<div>
   <!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>Nos conférences & BBS</h2>
							<p>Nos conférences</p>	
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('conferences') }}">Conférences et BBS</a></li>
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

                    @if($conferences->isNotEmpty())
                    @foreach ($conferences as $conference )
<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-blog">
							<div class="blog-img">
								<img src="{{ asset('storage/' . $conference->image) }}" alt="{{ $conference->title }}">
								<span class="date">Se tiendra le  {{ \Carbon\Carbon::parse($conference->_date)->format('d/m/Y') }}</span>
							</div>
							<div class="blog-body">
								<h3><a href="{{ route('conference', $conference->slug) }}">{{ $conference->title }}</a></h3>
								<div class="blog-meta">
									<div class="single-meta">
										
										
									</div>
									<div class="single-meta">
    <p>
        <a style="color: white; text-decoration: none;" href="{{ route('conference', $conference->slug) }}">
            <i class="fa fa-eye"></i> <span>Voir le détail</span>
        </a>
    </p>
</div>
<div class="single-meta">
    <p>
        <a style="color: white; text-decoration: none;" href="{{route('inscription-conference', $conference->slug)}}">
            <i class="fa fa-edit"></i> <span>S'inscrire</span>
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
                              {{ $conferences->links() }}
							
						</div>
						<!--/ End Pagination -->
					</div>
				</div>	
			</div>
		</section>	
		<!-- End Blog Archive -->

</div>
