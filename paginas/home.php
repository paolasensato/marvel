<div class="banner-home">
    <p id="titulo-principal"><strong>MARVEL</strong></p>
</div>

<div class="container">
    <h2 class="text-center">Comics</h2>
    <div class="container text-center my-3">
        <div id="carouselControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner d-flex d-inline-block">
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
                    <div class="col-12 col-md-3 px-1">
                        <div class="card h-100">
                            <img src="<?= $image ?>" alt="<?= $title ?>">
                            <div class="card-body text-center">
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev" onclick="sliderScrollLeft()">
                <span class="carousel-control-prev-icon bg-dark border border-dark"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next" onclick="sliderScrollRight()">
                <span class="carousel-control-next-icon bg-dark border border-dark"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
