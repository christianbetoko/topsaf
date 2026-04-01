<div>
    <div class="breadcrumbs" style="background-image:url('https://via.placeholder.com/1600x500')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="breadcrumbs-content">
                        <h2>Nos Produits</h2>
                        <p>Découvrez notre sélection exclusive</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
                            <li class="active">Nos produits premium</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="portfolio-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
                    <div class="section-title">
                        <h6>Nos Produits</h6>
                        <h2>Découvrez nos produits premium</h2>
                        <div class="line-bot"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul id="portfolio-nav" class="project-nav tr-list list-inline">
                        <li wire:click="setCategory('*')" 
                            class="cbp-filter-item {{ $activeCategory === '*' ? 'active' : '' }}" 
                            style="cursor:pointer">
                            Tous
                        </li>
                        @foreach($categories as $category)
                            <li wire:click="setCategory('{{ $category->slug }}')" 
                                class="cbp-filter-item {{ $activeCategory === $category->slug ? 'active' : '' }}" 
                                style="cursor:pointer">
                                {{ $category->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="portfolio-main">
                        <div id="portfolio-item" class="row">
                            @forelse($products as $product)
                                @php
                                    // On récupère la première image ou une image par défaut
                                    $imagePath = ($product->images && count($product->images) > 0) 
                                        ? asset('storage/' . $product->images[0]) 
                                        : 'https://via.placeholder.com/600x600';
                                @endphp
                                
                               <div class="col-lg-4 col-md-6 col-12 mb-4">
    <div class="portfolio-single" style="position: relative; overflow: hidden; background: #fff; border: 1px solid #eee; border-radius: 8px;">
        <div class="portfolio-img">
            <img src="{{ $imagePath }}" alt="{{ $product->name }}" style="width:100%; height:300px; object-fit:cover;">
        </div>
        
        <div class="portfolio-content" style="padding: 20px; text-align: center;">
            <h4><a href="{{route('produit', ['slug' => $product->slug])}}" style=" font-weight: 600;">{{ $product->name }}</a></h4>
            <p style="color: #1D21F7; font-weight: bold; margin: 5px 0;">{{ number_format($product->price, 2) }} {{ $product->devise }}</p>
            <span class="text-muted small" style="display: block; margin-bottom: 15px;">{{ $product->category->name ?? 'Sans catégorie' }}</span>
            
            <div class="button-group" style="display: flex; justify-content: center; gap: 10px;">
                <a class="p-button" href="{{ $imagePath }}" data-fancybox="photo" 
                   style="position: static; display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: #1D21F7; color: #fff; transform: none; opacity: 1; visibility: visible;">
                    <i class="fa fa-image"></i>
                </a>
                <a href="{{route('produit', ['slug' => $product->slug])}}" class="p-button" 
                   style="position: static; display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background: #333; color: #fff; transform: none; opacity: 1; visibility: visible;">
                    <i class="fa fa-link"></i>
                </a>
            </div>
        </div>
    </div>
</div>
                            @empty
                                <div class="col-12 text-center">
                                    <p>Aucun produit trouvé dans cette catégorie.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('livewire:navigated', () => { 
        // Force l'affichage si le JS du template fait défaut
        const items = document.querySelectorAll('.portfolio-single');
        items.forEach(item => {
            item.style.opacity = '1';
            item.style.visibility = 'visible';
        });
    });
</script>