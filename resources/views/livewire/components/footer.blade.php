<div>
  <!-- Subscribe Area -->
	<section class="subscribe-area" style="background-image: url(https://via.placeholder.com/1600x250);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 wow fadeInLeft" data-wow-duration="1s">
                <div class="subscribe-content">
                    <h2>Abonnez-vous et restez informé</h2>
                    <p>Recevez nos dernières actualités et mises à jour directement dans votre boîte mail.</p>
                </div>
                <form class="form-main">
                    <div class="form-group">
                        <input type="email" name="Email" placeholder="Votre adresse e-mail" required="required">
                        <button type="submit" class="theme-btn">S'abonner maintenant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
		<!-- End Subscribe Area -->
		
		<!-- Footer Area -->
		<footer class="footer-area" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-widget footer-about">
								<div class="footer-logo">
									<a class="logo" href="#">
										<img src="{{asset('storage/'. $enterprise->logo ?? 'default-logo.png')}}" alt="{{ $enterprise->name ?? 'Enterprise Name' }}">
									</a>
								</div>
								<div class="about-description">
									<p>{{ $enterprise->about }}</p>
								</div>
								<!-- Quick Link Box -->	
								<div class="f-contact-box">
									<div class="box-icon"><i class="fa fa-headphones"></i></div>
									<div class="contact-text">
										<p>Parlez à notre support</p>
										<h5>{{ $contactInfo->phone }}</h5>
									</div>
								</div>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-widget footer-about">
								<div class="footer-logo">
									<a class="logo" href="#">
										<img src="{{asset('storage/'. $enterprise->logo2 ?? 'default-logo.png')}}" alt="{{ $enterprise->name ?? 'Enterprise Name' }}">
									</a>
								</div>
								
								<!-- Quick Link Box -->	
								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Quick Links -->
							<div class="single-widget f-links">
								<h3 class="widget-title">Liens rapides</h3>
								<ul>
									<li><a href="{{ route('home') }}"><i class="fa fa-angle-double-right"></i>Accueil</a></li>
									<li><a href=""><i class="fa fa-angle-double-right"></i>À propos</a></li>
									<li><a href="{{ route('produits') }}"><i class="fa fa-angle-double-right"></i>Nos produits</a></li>
									<li><a href=""><i class="fa fa-angle-double-right"></i>Contact</a></li>
								</ul>
							</div>
						</div>
						<!-- Single-Widget -->
						
						<!-- Single-Widget -->
						<div class="col-lg-4 col-md-6 col-12">
							<div class="single-widget">
								<h3 class="widget-title">Contact</h3>
								<!-- Footer Contact -->
								<div class="footer-contact">
									<ul class="contact-bottom">
                                       @if($contactInfo)
										<li><a href="{{ $contactInfo->address_link ?? '#' }}"><i class="fa fa-map-marker"></i>{{ $contactInfo->address }}</a></li>
										<li><a href="tel:{{ $contactInfo->phone }}"><i class="fa fa-phone"></i>{{ $contactInfo->phone }}</a></li>
										<li><a href="mailto:{{ $contactInfo->email }}"><i class="fa fa-envelope"></i>{{ $contactInfo->email }}</a></li>
									@endif
                                    </ul>
								</div>
								<!-- Footer Social -->
								<div class="f-social">
									<ul>
                                        @if($socials->isNotEmpty())
                                            @foreach($socials as $social)
                                                <li><a href="{{ $social->url }}"><i class="{{ $social->icon }}"></i></a></li>
                                            @endforeach
                                        @endif
										
									</ul>
								</div>
							</div>
						</div>
						<!-- End-Single-Widget -->
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<div class="copyright-text">
								<p>Copyright © 2026 TOPSAF. Développé par <a href="https://christianbetoko.dev">CB</a></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
    <div class="footer-bottom-img d-flex justify-content-end">
        <ul style="display: flex; list-style: none; padding: 0; margin: 0; gap: 20px;">
            <li><a href="#">Politique de confidentialité</a></li>
            <li><a href="#">Conditions d'utilisation</a></li>
        </ul>
    </div>
</div>
					</div>
				</div>
			</div>
			<!-- End Footer Copyright -->
		</footer>
		<!-- End Footer Area -->	
</div>
