<h1 class="text-center">
    Comics
</h1>
<div class="row">
    <?php
    $arquivo = $url;

    $dados = file_get_contents($arquivo);

    $dados = json_decode($dados);

    foreach ($dados->data->results as $comics) {
        $path = $comics->thumbnail->path;
        $extension = $comics->thumbnail->extension;
        $image = $path .".". $extension;
        $title = $comics->title;
        $id = $comics->id;

    ?>
        <div class="col-12 col-md-3">
            <div class="card">
                <img src="<?= $image ?>" alt="<?= $title ?>">
                <div class="card-body text-center">
                    <p class="titulo"><strong><?= $title?></strong></p>
                    <p>
                        <a href="comic/<?= $id?>" class="btn btn-warning">Ver detalhes</a>
                    </p>
                </div>
            </div>

        </div>
    <?php
    }
    ?>

</div>