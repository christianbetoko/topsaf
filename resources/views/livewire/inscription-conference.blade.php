<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
       <!-- Breadcrumbs -->
		<div class="breadcrumbs" style="background-image:url('https://via.placeholder.com/1600x500')">
			<div class="container">
				<div class="row">
					<!-- Breadcrumbs-Content -->
					<div class="col-lg-12 col-md-12 col-12">
						<div class="breadcrumbs-content">
							<h2>INSCRIPTION : {{ $conference->title }}</h2>
							
						</div>
					</div>
					<!-- Breadcrumbs-Menu -->
					{{-- <div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
								<li><a href="{{ route('formations') }}">Formations</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="{{ route('formation', $formation->slug) }}">{{ $formation->title }}</a></li>
							</ul>
						</div>	
					</div> --}}
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
        <!-- Contact Area -->
		<section class="contact-area">
			<div >
				
				<!-- Contact Right -->
				<div class="">
					<div class="row">
						<div class="col-lg-12 offset-lg-12 col-md-12 offset-md-12 col-12 wow fadeInRight" data-wow-duration="1s">
							<div class="container">
								
								<form  wire:submit.prevent="submitForm"  method="post">
    <div class="contact-form">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <input class="form-control @error('prenom') is-invalid @enderror" wire:model="prenom" type="text" name="prenom" placeholder="Prénom *" required="required">
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <input class="form-control @error('nom') is-invalid @enderror" wire:model="nom" type="text" name="nom" placeholder="Nom *" required="required">
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <input class="form-control @error('postnom') is-invalid @enderror" wire:model="postnom" type="text" name="postnom" placeholder="Postnom">
                    @error('postnom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <select class="form-control @error('sexe') is-invalid @enderror" wire:model="sexe" name="sexe" required="required" style="width: 100%; height: 50px; border: 1px solid #eee; padding: 0 20px; color: #666;">
                        <option value="" disabled selected>Sexe *</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                    </select>
                    @error('sexe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <input class="form-control @error('code_parrain') is-invalid @enderror" wire:model="code_parrain" type="text" name="code_parrain" placeholder="Code du parrain (optionnel)">
                    @error('code_parrain')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="form-group">
                    <input class="form-control @error('telephone') is-invalid @enderror" wire:model="telephone" type="tel" name="telephone" placeholder="Téléphone *" required="required">
                    @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" wire:model="email" type="email" name="email" placeholder="Email *" required="required">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group">
                    <textarea class="form-control @error('adresse') is-invalid @enderror" wire:model="adresse" name="adresse" placeholder="Adresse complète *" required="required"></textarea>
                    @error('adresse')
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
				</div>
				<!-- End Contact Right -->
			</div>
		</section>	
		<!-- End Contact Area -->
</div>
