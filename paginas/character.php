<?php
$id = $param[1] ?? null;

if (empty($id)) {
?>
    <p class="alert alert-danger text-center">
        Oops! Invalid character!
    </p>
<?php
} else {
    $arquivo = "{$url}/characters/{$id}?{$apiKey}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    $character = $dados->data->results[0];

    $path = $character->thumbnail->path;
    $extension = $character->thumbnail->extension;
    $image = $path . "/portrait_uncanny." . $extension;
    $name = $character->name;
    $description = $character->description;

?>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="<?= $image ?>" alt="<?= $name ?>">
            </div>
            <div class="col-12 col-md-9">
                <h1 class="text-center"><?= $name ?></h1>
                <p><?= $description ?></p>
            </div>
        </div>
    </div>

    <h2 class="text-center">Comics</h2>
    <div class="row">
        <?php
        $arquivo = "{$url}/characters/{$id}/comics?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $comics) {
            $id = $comics->id;
            $title = $comics->title;
            $path = $comics->thumbnail->path;
            $extension = $comics->thumbnail->extension;
            $image = $path . "." . $extension;
        ?>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img-top">
                        <p class="card-title"><?= $title ?></p>
                        <p>
                            <a href="comic/<?= $id ?>" class="btn btn-warning">See more</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <h2 class="text-center">Series</h2>
    <div class="row">
        <?php
        $arquivo = "{$url}/characters/{$id}/series?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $series) {
            $id = $series->id;
            $title = $series->title;
            $path = $series->thumbnail->path;
            $extension = $series->thumbnail->extension;
            $image = $path . "." . $extension;
        ?>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img-top">
                        <p class="card-title"><?= $title ?></p>
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

    <h2 class="text-center">Stories</h2>
    <div class="row">
        <?php
        $arquivo = "{$url}/characters/{$id}/stories?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $stories) {
            $id = $stories->id;
            $title = $stories->title;
            $path = $stories->thumbnail->path ?? null;
            $extension = $stories->thumbnail->extension ?? null;
            $image = $path . "." . $extension;
        ?>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img-top">
                        <p class="card-title"><?= $title ?></p>
                        <p>
                            <a href="storie/<?= $id ?>" class="btn btn-warning">See more</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <h2 class="text-center">Events</h2>
    <div class="row">
        <?php
        $arquivo = "{$url}/characters/{$id}/events?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $events) {
            $id = $events->id;
            $title = $events->title;
            $path = $events->thumbnail->path;
            $extension = $events->thumbnail->extension;
            $image = $path . "." . $extension;
        ?>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img-top">
                        <p class="card-title"><?= $title ?></p>
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

<?php

}
?>