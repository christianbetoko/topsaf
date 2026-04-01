<div>
   

		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<div class="topbar-address">
							<ul>
                                @if($contactInfo)
									<li><a href="tel:{{ $contactInfo->phone }}"><i class="fa fa-phone"></i><span>Téléphone:</span> {{ $contactInfo->phone }}</a></li>
									<li><a href="mailto:{{ $contactInfo->email }}"><i class="fa fa-envelope"></i><span>Email:</span> {{ $contactInfo->email }}</a></li>
									<li><a href="#"><i class="fa fa-map-marker"></i><span>Adresse:</span> {{ $contactInfo->address }}</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
	
		<!-- Header Start -->
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="header-inner-top">
							<div class="header-inner">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-12 d-flex align-items-center">
    <div class="logo-container d-flex align-items-center">
        <div class="logo mr-2"> {{-- mr-2 pour un petit espace entre les deux --}}
            <a class="logo-1" href="{{ route('home') }}">
                <img height="50" width="50" src="{{asset('storage/'. $enterprise->logo)}}" alt="{{ $enterprise->name }}">
            </a>
        </div>
        <div class="logo">
            <a class="logo-1" href="{{ route('home') }}">
                <img height="50" width="50" src="{{asset('storage/'. $enterprise->logo2)}}" alt="{{ $enterprise->name }}">
            </a>
        </div>
    </div>
    <div class="mobile-nav"></div>
</div>
									<div class="col-lg-10 col-md-9 col-12">
										<div class="main-menu-top">
											<div class="main-menu">
												<div class="navbar">
													<div class="nav-item">
														<!-- Main-Menu -->

														<ul class="nav-menu mobile-menu navigation">

															<li class="{{request()->routeIs('home') ? 'active' : ''}}"><a href="{{ route('home')}}">Accueil</a></li>
                                                             <li class="{{request()->routeIs('history') ? 'active' : ''}}"><a href="#">A propos<i class="fa fa-angle-down"></i></a>
																<ul class="sub-menu">
																	
																	<li class="{{request()->routeIs('history') ? 'active' : ''}}"><a href="{{ route('history') }}">Historique</a></li>
                                                                           <li><a href="services.html">Nos adresses</a></li>
																	
																</ul>
															</li> 
															
														 <li><a href="#">Activités<i class="fa fa-angle-down"></i></a>
																<ul class="sub-menu">
																	<li class="{{request()->routeIs('formations') ? 'active' : ''}}"><a href="{{route('formations')}}">Nos programmes de formation régulière</a></li>
																	<li class="{{request()->routeIs('conferences') ? 'active' : ''}}"><a href="{{ route('conferences') }}">Nos conférences & BBS</a></li>
																	 <li><a href="services.html">Revivez nos événements</a></li>
                                                                           
																</ul>
															
                                                            <li class="{{request()->routeIs('produits') ? 'active' : ''}}"><a href="{{ route('produits') }}">Nos produits premium</a></li>
                                                          
                                                            
                                                          
                                                      

															
															
															<li><a href="contact.html">Contact</a></li>
														</ul>
													</div>
												</div>
											</div>

											<!-- Menu-Right -->
										
												
											<div class="menu-right">
												<a href="contact.html" class="theme-btn">Inscrivez-vous</a>
											</div>
											
											<!-- End-Menu-Right -->
										</div>
									</div>
									
								</div>	
							</div>	
						</div>	
					</div>	
				</div>	
			</div>
		</header>
</div>
