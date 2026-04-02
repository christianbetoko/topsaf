
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

@section('title', $event->title . ' | TOP SANTÉ FUKANG')

@section('meta_tags')
    <meta property="og:title" content="{{ $event->title }}">
    <meta property="og:description" content="{{ Str::limit($event->description, 160) }}">
    <meta property="og:image" content="{{ asset('storage/'.$event->images[0]) }}">
    <meta property="og:type" content="article">

    <meta name="twitter:title" content="{{ $event->title }}">
    <meta name="twitter:description" content="{{ Str::limit($event->description, 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/'.$event->images[0]) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

<div>
    <div class="breadcrumbs" style="background-image:url('{{asset('assets/img/footer-bg.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="breadcrumbs-content">
                        <h2>{{ $event->title }}</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Accueil</a><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="{{ route('evenements') }}">Événements</a><i class="fa fa-angle-double-right"></i></li>
                            <li class="active"><a href="{{ route('evenement', $event->slug) }}">{{ $event->title }}</a></li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @if ($event->video_url)
											<div id="player-container"></div>
										@endif
    <section class="portfolio-single-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="p-single-main">
                        <div class="p-single-head">
                            <img src="{{ asset('storage/' . $event->images[0]) }}" alt="{{ $event->title }}">
                        </div> 
                        <div class="p-single-content">
                            <h3>{{ $event->title }}</h3>
                            
                            <div class="product-description-text mb-4">
                                {!! $event->description !!}
                            </div>
<div class="blog-share share-tag">
														
														
														<button class="btn btn-sm btn-outline-primary border-11" 
        id="shareBtn"
        data-title="{{ $event->title }}" 
        data-url="{{ url()->current() }}">
    <i class="fa fa-share-alt"></i> Partager
</button>
													</div>
                                                    <br>
                            <div class="project-image">
                                <div class="row">
                                    @if($event->images && is_array($event->images))
                                        @foreach ($event->images as $image)
                                            <div class="col-lg-6 col-md-6 col-12 mb-4">
                                                <div class="single-image" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                                    <img src="{{ asset('storage/' . $image) }}" 
                                                         alt="{{ $event->title }}" 
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

<script>
    // Collez votre lien YouTube complet ici
    const lienComplet = "{{ $event->video_url }}";

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