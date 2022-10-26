<h1 class="text-center">
    Characters
</h1>
<div class="row">
    <?php
    $arquivo = "{$url}/characters?{$apiKey}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    foreach ($dados->data->results as $comics) {
        $path = $comics->thumbnail->path;
        $extension = $comics->thumbnail->extension;
        $image = $path .$imageSizeUrl. $extension;
        $name = $comics->name;
        $id = $comics->id;

    ?>
        <div class="col-12 col-md-3">
            <div class="card">
                <img src="<?= $image ?>" alt="<?= $name ?>">
                <div class="card-body text-center">
                    <p class="titulo">
                        <strong>
                            <?= $name ?>
                        </strong>
                    </p>
                    <p>
                        <a href="character/<?= $id ?>" class="btn btn-warning">See more</a>
                    </p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>