<h1 class="text-center">Series</h1>
<div class="row">
    <?php
        $arquivo = "{$url}/series?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $series) {
            $id = $series->id;
            $title = $series->title;
            $path = $series->thumbnail->path;
            $extension = $series->thumbnail->extension;
            $image = $path ."/portrait_incredible.". $extension;
            ?>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="<?= $image?>" alt="<?= $title ?>">
                        <div class="card-body text-center">
                            <p class="titulo">
                                <strong>
                                    <?= $title ?>
                                </strong>
                            </p>
                            <p>
                                <a href="serie/<?= $id ?>" class="btn btn-warning">See more</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
</div>