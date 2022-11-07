<h1 class="text-center">
    Events
</h1>
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
    ?>
    <div class="col-12 col-md-3">
        <div class="card">
            <img src="<?= $image ?>" alt="<?= $title ?>">
            <div class="card-body text-center">
                <p class="titulo">
                    <strong>
                        <?= $title ?>
                    </strong>
                </p>
                <p>
                    <a href="event/<?= $id ?>" class="btn btn-warning">See more</a>
                </p>
            </div>
        </div>
    </div>

    <?php
        }
    ?>

</div>
