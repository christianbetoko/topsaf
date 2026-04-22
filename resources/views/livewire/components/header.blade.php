<div>
	
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-inner">
                    <div class="d-flex align-items-center justify-content-between">
                        
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img height="50" width="50" src="{{asset('storage/'. $enterprise->logo)}}" alt="{{ $enterprise->name }}">
                            </a>
                        </div>

                        <div class="main-menu-top flex-grow-1">
                            <div class="main-menu">
                                <div class="navbar">
                                    <div class="nav-item">
                                        <ul class="nav-menu mobile-menu navigation d-flex justify-content-center">
                                            <li class="{{request()->routeIs('home') ? 'active' : ''}}"><a href="{{ route('home')}}">Accueil</a></li>
                                            <li ><a href="#">A propos <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li class="{{request()->routeIs('history') ? 'active' : ''}}"><a href="{{ route('history') }}">Historique</a></li>
                                                    <li class="{{request()->routeIs('nos-adresses') ? 'active' : ''}}"><a href="{{ route('nos-adresses') }}">Nos adresses</a></li>
													<li class="{{request()->routeIs('testimolnials') ? 'active' : ''}}"><a href="{{ route('testimolnials') }}">Témoignages</a></li>
                                                </ul>
                                            </li> 
                                            <li ><a href="#">Activités <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li class="{{request()->routeIs('formations') ? 'active' : ''}}"><a href="{{route('formations')}}">Nos programmes</a></li>
                                                    <li class="{{request()->routeIs('conferences') ? 'active' : ''}}"><a href="{{ route('conferences') }}">Nos conférences</a></li>
                                                    <li class="{{request()->routeIs('evenements') ? 'active' : ''}}"><a href="{{ route('evenements') }}">Événements</a></li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="{{request()->routeIs('produits') ? 'active' : ''}}"><a href="{{ route('produits') }}">Nos produits</a></li>
											
                                            <li class="{{request()->routeIs('contact') ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Hamburger visible uniquement sur mobile, entre les deux logos --}}
                        <div class="mobile-nav-center">
                            <div class="mobile-nav"></div>
                        </div>

                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img height="50" width="50" src="{{asset('storage/'. $enterprise->logo2)}}" alt="{{ $enterprise->name }}">
                            </a>
                        </div>

                    </div>
                </div>	
            </div>	
        </div>	
    </div>
</header>

<style>
/* Desktop : on cache le wrapper hamburger mobile, le menu principal est visible */
.mobile-nav-center {
    display: none;
}

@media (max-width: 768px) {
    /* Cache le menu desktop */
    .main-menu-top {
        display: none;
    }

    /* Affiche le hamburger centré entre les deux logos */
    .mobile-nav-center {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1; /* prend l'espace entre les deux logos */
    }

    .mobile-nav-center .mobile-nav {
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>

</div>