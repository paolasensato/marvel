<div class="banner banner-comics">
    <div class="w-100">
        <p id="titulo-principal" class="head-font"><strong>COMICS</strong></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        $arquivo = "{$url}/comics?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $comics) {
            $path = $comics->thumbnail->path;
            $extension = $comics->thumbnail->extension;
            $image = $path .$imageSizeUrl. $extension;
            $title = $comics->title;
            $id = $comics->id;

        ?>
            <div class="col-12 col-md-2">
                <div class="card">
                    <img src="<?= $image ?>" alt="<?= $title ?>">
                    <div class="card-body text-center">
                        <p class="titulo">
                            <strong>
                                <?= $title ?>
                            </strong>
                        </p>
                        <p>
                            <a href="comic/<?= $id?>" class="btn btn-warning">See more</a>
                        </p>
                    </div>
                </div>

            </div>
        <?php
        }
        ?>
    </div>
</div>
