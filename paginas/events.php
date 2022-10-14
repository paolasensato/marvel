<h1 class="text-center">
    Comics
</h1>
<div class="row">
        <?php
        $arquivo = "http://gateway.marvel.com/v1/public/events?{$url}";
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
                    <a href="event/<?= $id?>" class="btn btn-warning">See more</a>
                </p>
            </div>
        </div>
    </div>

    <?php
        }
    ?>

</div>
