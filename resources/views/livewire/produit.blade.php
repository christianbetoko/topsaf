@section('title', $produit->name . ' | TOP SANTÉ FUKANG')

@section('meta_tags')
    <meta property="og:title" content="{{ $produit->name }}">
    <meta property="og:description" content="{{ Str::limit($produit->description, 160) }}">
    <meta property="og:image" content="{{ asset('storage/'.$produit->images[0]) }}">
    <meta property="og:type" content="article">

    <meta name="twitter:title" content="{{ $produit->name }}">
    <meta name="twitter:description" content="{{ Str::limit($produit->description, 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/'.$produit->images[0]) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

<div>
    <div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="breadcrumbs-content">
                        <h2>{{ $produit->name }}</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="{{ route('produits') }}">Produits</a><i class="fa fa-angle-double-right"></i></li>
                            <li class="active"><a href="{{ route('produit', $produit->slug) }}">{{ $produit->name }}</a></li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <section class="portfolio-single-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="p-single-main">
                        <div class="p-single-head">
                            <img src="{{ asset('storage/' . $produit->images[0]) }}" alt="{{ $produit->name }}">
                        </div> 
                        <div class="p-single-content">
                            <h3>{{ $produit->name }}</h3>
                            
                            <div class="product-description-text mb-4">
                                {!! $produit->description !!}
                            </div>
<div class="blog-share share-tag">
														
														
														<button class="btn btn-sm btn-outline-primary border-11" 
        id="shareBtn"
        data-title="{{ $produit->name }}" 
        data-url="{{ url()->current() }}">
    <i class="fa fa-share-alt"></i> Partager
</button>
													</div>
                                                    <br>
                            <div class="project-image">
                                <div class="row">
                                    @if($produit->images && is_array($produit->images))
                                        @foreach ($produit->images as $image)
                                            <div class="col-lg-6 col-md-6 col-12 mb-4">
                                                <div class="single-image" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                                    <img src="{{ asset('storage/' . $image) }}" 
                                                         alt="{{ $produit->name }}" 
                                                         style="width: 100%; height: 400px; object-fit: cover; display: block;">
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-12">
                                            <img src="https://via.placeholder.com/800x400?text=Aucune+image+disponible" alt="No image">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="portfolio-sidebar">
                        <div class="p-sidebar-widget">
                            <div class="project-info">
                                <h4 class="p-widget-title">Détails du Produit</h4>
                                <ul>
                                    <li><i class="fa fa-dot-circle-o"></i><span>Prix:</span> {{ number_format($produit->price, 2) }} {{ $produit->devise }}</li>
                                    <li><i class="fa fa-dot-circle-o"></i><span>Catégorie:</span> {{ $produit->category->name ?? 'N/A' }}</li>
                                    <li><i class="fa fa-dot-circle-o"></i><span>Stock:</span> {{ $produit->stock > 0 ? 'En stock' : 'Rupture' }}</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>  
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