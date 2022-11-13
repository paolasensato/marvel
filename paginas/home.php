<div class="banner banner-home">
    <div class="w-100">
        <p id="titulo-principal" class="head-font"><strong>MARVEL</strong></p>
    </div>
</div>

<div class="container px-0">
    <h2 class="text-center head-font mt-5">Comics</h2>
    <div class="container text-center my-3">
        <div id="carouselControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner d-flex d-inline-block" id="carousel-comics">
                <?php
                    $arquivo = "{$url}comics?{$apiKey}";
                    $dados = file_get_contents($arquivo);
                    $dados = json_decode($dados);
            
                    foreach ($dados->data->results as $comics) {
                        $path = $comics->thumbnail->path;
                        $extension = $comics->thumbnail->extension;
                        $image = $path . $imageSizeUrl . $extension;
                        $title = $comics->title;
                        $id = $comics->id;
                ?>
                    <div class="col-12 col-md-2 px-1">
                        <div class="card h-100 border-0">
                            <img src="<?= $image ?>" alt="<?= $title ?>" class="img-carousel" id="img-comics">
                            <div class="card-body">
                                <p class="titulo">
                                    <a href="comic/<?= $id ?>">
                                        <strong><?= $title ?></strong>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev" onclick="scrollLeftComics()">
                <span class="carousel-control-prev-icon bg-dark border border-dark"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next" onclick="scrollRightComics()">
                <span class="carousel-control-next-icon bg-dark border border-dark"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <h2 class="text-center head-font mt-5">Events</h2>
    <div class="container text-center my-3">
        <div id="carouselControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner d-flex d-inline-block" id="carousel-events">
                <?php
                    $arquivo = "{$url}events?{$apiKey}";
                    $dados = file_get_contents($arquivo);
                    $dados = json_decode($dados);
            
                    foreach ($dados->data->results as $events) {
                        $path = $events->thumbnail->path;
                        $extension = $events->thumbnail->extension;
                        $image = $path . $imageSizeUrl . $extension;
                        $title = $events->title;
                        $id = $events->id;
                        if ($id == 329) {
                            $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
                        }
                ?>
                    <div class="col-12 col-md-2 px-1">
                        <div class="card h-100 border-0">
                            <img src="<?= $image ?>" alt="<?= $title ?>" id="img-events" class="img-carousel">
                            <div class="card-body">
                                <p class="titulo">
                                    <a href="event/<?= $id ?>">
                                        <strong><?= $title ?></strong>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev" onclick="scrollLeftEvents()">
                <span class="carousel-control-prev-icon bg-dark border border-dark"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next" onclick="scrollRightEvents()">
                <span class="carousel-control-next-icon bg-dark border border-dark"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
