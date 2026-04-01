<div>
    	  <!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>Nous contacter</h2>
							<p>Contactez-nous pour plus d'informations</p>	
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('contact') }}">Contact</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
    
    
    <!-- Contact Area -->
		<section class="contact-area">
			<div class="content-area">
				
				<!-- Contact Right -->
				<div class="">
					<div class="row">
						<div class="col-lg-12  wow fadeInRight" data-wow-duration="1s">
							<div class="container">
								<div class="top-content">
									<h3>Entrez en contact avec nous</h3>
									<p> </p>
								</div>
								<form  wire:submit.prevent="submitForm" >
									<div class="contact-form">
										<div class="row">
											<div class="col-lg-6 col-md-12 col-12">
												<div class="form-group">
													<input wire:model='name' class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nom complet *" required="required">
												@error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                                                </div>
											</div>
											<div class="col-lg-6 col-md-12 col-12">
												<div class="form-group">
													<input class="form-control @error('email') is-invalid @enderror" wire:model="email" type="email" name="email" placeholder="Email *" required="required">
													@error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                                                </div>
											</div>
											<div class="col-lg-12 col-md-12 col-12">
												<div class="form-group">
													<input class="form-control @error('subject') is-invalid @enderror" wire:model="subject" type="text" name="subject" placeholder="Objet *" required="required">
													@error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
												</div>
											</div>	
											<div class="col-lg-12 col-md-12 col-12">
												<div class="form-group">
													<textarea class="form-control @error('message') is-invalid @enderror" wire:model="message" name="message" placeholder="Votre message *" required="required"></textarea>
													@error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
												</div>
											</div>	
											<div class="col-lg-6 col-12">
												<div class="form-group contact-button">
													<button type="submit" class="theme-btn"><span wire:loading.remove>Envoyer</span>
                <span wire:loading>Envoi en cours...</span></button>
												</div>	
											</div>
										</div>
									</div>	
								</form>	
							</div>
						</div>
					</div>
				</div>
				<!-- End Contact Right -->
			</div>
		</section>	
		<!-- End Contact Area -->
	
	
</div>
