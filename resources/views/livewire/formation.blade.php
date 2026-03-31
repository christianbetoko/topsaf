
<style>
	
	
	#player-container {
    width: 100vw;           /* 100% de la largeur de la fenêtre */
    position: relative;
    padding-bottom: 56.25%; /* Ratio 16:9 (9 / 16 * 100) */
    height: 0;
    overflow: hidden;
    background-color: #000; /* Fond noir pendant le chargement */
}

#player-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
</style>
@section('title', $formation->title . ' | TOP SANTÉ FUKANG')

@section('meta_tags')
    <meta property="og:title" content="{{ $formation->title }}">
    <meta property="og:description" content="{{ Str::limit($formation->description, 160) }}">
    {{-- On utilise directement l'attribut calculé --}}
    <meta property="og:image" content="{{   asset('storage/'.$formation->image) }}">
   <meta property="og:type" content="article">

    <meta name="twitter:title" content="{{ $formation->title }}">
    <meta name="twitter:description" content="{{ Str::limit($formation->description, 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/'.$formation->image) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

<div>
      <!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('https://via.placeholder.com/1600x500')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>{{ $formation->title }}</h2>
							
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li><a href="{{ route('formations') }}">Formations</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('formation', $formation->slug) }}">{{ $formation->title }}</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		<!-- Blogs-Single-Area -->
		@if ($formation->video_url)
											<div id="player-container"></div>
										@endif
		<section class="blog-single-post section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="row">
							<div class="col-12">
								<div class="single-area">
									<!-- Blog Head -->
									<div class="single-head">
										<img src="{{asset('storage/' . $formation->image)}}" alt="{{ $formation->title }}">
										
										
										<div class="blog-title-meta">
											<!-- Blog Meta -->
											<div class="blog-meta">
												<span><i class="fa fa-user"></i><a href="#">{{ $formation->instructor }}</a></span>
												<span><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($formation->start_date)->format('d/m/Y') }}</span>
												<span><i class="fa fa-money"></i>{{ $formation->price}} </span>
											</div>
											<h1>{{ $formation->title }}</h1>
										</div>
									</div>
									<!-- Blog Content -->
									<div class="single-content">
										{!! nl2br(e($formation->description)) !!}
										<div class="blog-post-tag">
											<div class="row">
												<div class="col-lg-8 col-md-8 col-12">
													{{-- <div class="post-tag share-tag">
														<h5>Releted Tags</h5>
														<ul>
															<li><a href="#">popular</a></li>
															<li><a href="#">design</a></li>
															<li><a href="#">ux</a></li>
														</ul>
													</div> --}}
												</div>
												<div class="col-lg-4 col-md-4 col-12">
													<div class="blog-share share-tag">
														{{-- <h5>Share No</h5>
															<ul>
															<li><a href="#"><i class="fa fa-facebook"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter"></i></a></li>
															<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
															<li><a href="#"><i class="fa fa-instagram"></i></a></li>
														</ul> --}}
														<a href="{{ route('inscription-formation', $formation->slug) }}"> <button class="btn btn-sm btn-outline-primary border-11" ><i class="fa fa-file"></i> S'inscrire</button></a>
														<button class="btn btn-sm btn-outline-primary border-11" 
        id="shareBtn"
        data-title="{{ $formation->title }}" 
        data-url="{{ url()->current() }}">
    <i class="fa fa-share-alt"></i> Partager
</button>
													</div>
												</div>
											</div>
										</div>
										<!-- Prev Next Button-->
										{{-- <div class="prev-next-btn">
											<ul>
												<li class="prev"><i class="fa fa-angle-double-left"></i><a href="#">prev</a></li>
												<li><a href="#">next</a><i class="fa fa-angle-double-right"></i></li>
											</ul>
										</div> --}}
									</div>	
									<!-- Author -->
									{{-- <div class="post-author-box">
										<div class="author-img">
											<img src="https://via.placeholder.com/100x100" alt="#">
										</div>
										<div class="author-content">
											<h3>Meheraj Hossain</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . </p>
										</div>
										<div class="author-social">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</div>
									</div> --}}
									<!-- End-Author -->
									<!-- Blog Comments -->
									{{-- <div class="blog-comments">
										<div class="bottom-title">
											<h2>Total <span>(03)</span> comments</h2>
										</div>
										<div class="comments-body">
											<!-- Single Comments -->
											<div class="single-comments">
												<div class="main">
													<div class="head">
														<img src="https://via.placeholder.com/80x80" alt="#">
													</div>
													<div class="body">
														<h4>Hero alam <span class="meta">18 days ago</span></h4>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.<span class="reply"><i class="fa fa-reply"></i><a href="#">Replay</a></span></p>
													</div>
												</div>
												<!-- Comment Reply -->
												<div class="comment-list">
													<div class="head">
														<img src="https://via.placeholder.com/80x80" alt="#">
													</div>
													<div class="body">
														<h4>Shakil hossain <span class="meta">1 month ago</span></h4>
														<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia.<span class="reply"><i class="fa fa-reply"></i><a href="#">Replay</a></span></p>
													</div>
												</div>
												<!--/ End Comment Reply -->
											</div>
											<!--/ End Single Comments -->
											<!-- Single Comments -->
											<div class="single-comments">
												<div class="main">
													<div class="head">
														<img src="https://via.placeholder.com/80x80" alt="#">
													</div>
													<div class="body">
														<h4>Ali akbar <span class="meta">2 month ago</span></h4>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.<span class="reply"><i class="fa fa-reply"></i><a href="#">Replay</a></span></p>
													</div>
												</div>
											</div>		
											<!--/ End Single Comments -->											
										</div>
									</div> --}}
									<!--/ End Blog Comments -->
								</div>
							</div>
							{{-- <div class="col-12">
								<!-- Comments Form -->
								<div class="blog-c-form">
									<div class="bottom-title">
										<h2>Post Comments</h2>
									</div>
									<!-- Comment Form -->
									<form class="form" method="post" action="mail/mail.php">
										<div class="row">
											<div class="col-md-4 col-md-4 col-xs-12">
												<div class="form-group">
													<label><span><i class="fa fa-user"></i></span> Your Name</label>
													<input type="text" name="name" required="required">
												</div>
											</div>
											<div class="col-md-4 col-md-4 col-xs-12">
												<div class="form-group">
													<label><span><i class="fa fa-envelope"></i></span>Your Email</label>
													<input type="email" name="email" required="required">
												</div>
											</div>
											<div class="col-md-4 col-md-4 col-xs-12">
												<div class="form-group">
													<label><span><i class="fa fa-globe"></i></span>Your Website</label>
													<input type="url" name="website" required="required">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label><span><i class="fa fa-pencil"></i></span>Your Comment</label>
													<textarea name="message" rows="6"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group button">	
													<button type="submit" class="theme-btn">Post Comment</button>
												</div>
											</div>
										</div>
									</form>
									<!--/ End Comment Form -->
								</div>
								<!--/ End Comments Form -->
							</div> --}}
						</div>
					</div>
					{{-- <div class="col-lg-4 col-12">
						<!-- Blog Sidebar -->
						<div class="blog-sidebar">
							<!-- Search Widget -->
							<div class="widget widget-search">
								<h4 class="widget-title">Search Objects</h4>
								<form action="#">
									<input type="text" placeholder="Search your keyword...">
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
							<!-- Popular Post Widget -->
							<div class="widget popular-feeds">
								<h4 class="widget-title">Popular Articles</h4>
								<div class="popular-feed-loop">
									<!-- Single Popular -->
									<div class="single-popular-feed">
										<div class="feed-img">
											<img src="https://via.placeholder.com/80x80" alt="#">
										</div>
										<div class="feed-desc">
											<h6><a href="#">The Best Dolor Sitamet Content Adipiscing</a></h6>
											<span class="time"><i class="fa fa-calendar"></i> 28 January 2020</span>
										</div>
									</div>
									<!-- End Single Popular -->
									<!-- Single Popular -->
									<div class="single-popular-feed">
										<div class="feed-img">
											<img src="https://via.placeholder.com/80x80" alt="#">
										</div>
										<div class="feed-desc">
											<h6><a href="#">Business is Pulvinar Metuseu Venenatis pellen Praesent .</a></h6>
											<span class="time"><i class="fa fa-calendar"></i> 25 April 2020</span>
										</div>
									</div>
									<!-- End Single Popular -->
									<!-- Single Popular -->
									<div class="single-popular-feed">
										<div class="feed-img">
											<img src="https://via.placeholder.com/80x80" alt="#">
										</div>
										<div class="feed-desc">
											<h6><a href="#">Consulting Needs the Big Oxmox advised Bestania.</a></h6>
											<span class="time"><i class="fa fa-calendar"></i> 24 March 2020</span>
										</div>
									</div>
									<!-- End Single Popular -->
								</div>
							</div>
							<!-- Categories Widget -->
							<div class="widget categories-widget">
								<h4 class="widget-title">Categories</h5>
								<ul>
									<li><a href="#">Business<span>26</span></a></li>
									<li><a href="#">Consultant<span>26</span></a></li>
									<li><a href="#">Creative<span>26</span></a></li>
									<li><a href="#">UI/UX<span>26</span></a></li>
									<li><a href="#">Technology<span>26</span></a></li>
								</ul>
							</div>
							<!-- Social Icon Widget -->
							<div class="widget socail-widget">
								<h4 class="widget-title">Never Miss News</h4>
								<ul>
									<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<!-- Popular Tags Widget -->
							<div class="widget popular-tag-widget">
								<h4 class="widget-title">Popular Tags</h4>
								<ul>
									<li><a href="#">Popular</a></li>
									<li><a href="#">design</a></li>
									<li><a href="#">ux</a></li>
									<li><a href="#">usability</a></li>
									<li><a href="#">develop</a></li>
									<li><a href="#">icon</a></li>
									<li><a href="#">business</a></li>
									<li><a href="#">consult</a></li>
									<li><a href="#">kit</a></li>
									<li><a href="#">keyboard</a></li>
									<li><a href="#">mouse</a></li>
									<li><a href="#">tech</a></li>
								</ul>
							</div>
							<!-- Banner Ad Widget -->
							<div class="widget banner-ad-widget">
								<img src="https://via.placeholder.com/350x480" alt="#">
							</div>
						</div>
						<!-- End Blog Sidebar -->
					</div> --}}
				</div>
			</div>
		</section>
		<!--/ End Blogs Area -->
</div>
<script>
    document.getElementById('shareBtn').addEventListener('click', function() {
        // On récupère les valeurs stockées dans les attributs data
        const title = this.getAttribute('data-title');
        const url = this.getAttribute('data-url');

        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            }).then(() => {
                console.log('Merci pour le partage !');
            })
            .catch(console.error);
        } else {
            // Utilisation d'un template literal (backticks) pour éviter les soucis de guillemets dans l'alerte
            alert(`Le partage n'est pas pris en charge par votre navigateur. Voici l'URL : ${url}`);
        }
    });
</script>
<script>
    // Collez votre lien YouTube complet ici
    const lienComplet = "{{ $formation->video_url }}";

    function extraireEtAfficher(url) {
        let videoId = "";
        
        // Logique pour extraire l'ID peu importe le format du lien
        if (url.includes("v=")) {
            videoId = url.split("v=")[1].split("&")[0];
        } else if (url.includes("be/")) {
            videoId = url.split("be/")[1].split("?")[0];
        }

        if (videoId) {
            const iframe = `
                <iframe 
                   
                    src="https://www.youtube.com/embed/${videoId}" 
                    frameborder="0" 
                    allowfullscreen>
                </iframe>`;
            document.getElementById("player-container").innerHTML = iframe;
        } else {
            document.getElementById("player-container").innerHTML = "Lien non valide.";
        }
    }

    extraireEtAfficher(lienComplet);
</script>