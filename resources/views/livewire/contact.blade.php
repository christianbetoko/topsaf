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
    
   <section class="contact-area py-5">
        <div class="container">
            
            <!-- Section Cartes d'Informations de Contact -->
            <div class="row mb-5">
                @forelse($contactInfos as $contactInfo)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card h-100 border-0 shadow-sm rounded-3">
                            <div class="card-body p-4">
                                
                                @if($contactInfo->address)
                                    <div class="d-flex align-items-start mb-3">
                                        
                                        <div>
                                            <h6 class="fw-bold mb-1">Adresse</h6>
                                            <p class="text-muted mb-0">{{ $contactInfo->address }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if($contactInfo->phone)
                                    <div class="d-flex align-items-start mb-3">
                                        
                                        <div>
                                            <h6 class="fw-bold mb-1">Téléphone</h6>
                                            <p class="mb-0">
                                                <a href="tel:{{ $contactInfo->phone }}" class="text-decoration-none text-muted">
                                                    {{ $contactInfo->phone }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                @if($contactInfo->email)
                                    <div class="d-flex align-items-start">
                                        
                                        <div>
                                            <h6 class="fw-bold mb-1">Email</h6>
                                            <p class="mb-0">
                                                <a href="mailto:{{ $contactInfo->email }}" class="text-decoration-none text-muted">
                                                    {{ $contactInfo->email }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>Aucune information de contact disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

            <!-- Formulaire de Contact -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12 wow fadeInRight" data-wow-duration="1s">
                    <div class="top-content text-center mb-4">
                        <h3>Entrez en contact avec nous</h3>
                        <p>Envoyez-nous un message et nous vous répondrons dans les plus brefs délais.</p>
                    </div>
                    <form wire:submit.prevent="submitForm">
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
                                        <button type="submit" class="theme-btn">
                                            <span wire:loading.remove>Envoyer</span>
                                            <span wire:loading>Envoi en cours...</span>
                                        </button>
                                    </div>    
                                </div>
                            </div>
                        </div>    
                    </form>    
                </div>
            </div>

        </div>
    </section>
</div>
