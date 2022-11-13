<div class="banner banner-events">
    <div class="w-100">
        <p id="titulo-principal" class="head-font"><strong>EVENTS</strong></p>
    </div>
</div>

<div class="container">
    <div class="row">
            <?php
            $arquivo = "{$url}/events?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);

            foreach ($dados->data->results as $events) {
                $path = $events->thumbnail->path;
                $extension = $events->thumbnail->extension;
                $image = $path .$imageSizeUrl. $extension;
                $title = $events->title;
                $id = $events->id;
                if ($id == 329) {
                    $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
                }
        ?>
        <div class="col-12 col-md-2">
            <a href="event/<?= $id ?>">
                <div class="card">
                    <img src="<?= $image ?>" alt="<?= $title ?>">
                    <div class="card-body text-center">
                        <p class="titulo">
                            <strong>
                                <?= $title ?>
                            </strong>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <?php
            }
        ?>
    </div>
</div>
