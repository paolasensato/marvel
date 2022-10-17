<?php
    $id = $param[1] ?? null;

    if (empty($id)) {
        include 'erro.php';
    } else {
        $arquivo = "https://gateway.marvel.com:443/v1/public/events/{$id}?{$url}";

        $dados = file_get_contents($arquivo);

        $dados = json_decode($dados);

        $comic = $dados->data->results[0];


        $title = $comic->title;
        $description = $comic->description;
        $path = $comic->thumbnail->path;
        $extension = $comic->thumbnail->extension;
        $image = $path . "/portrait_uncanny." . $extension;
?>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="<?= $image ?>" alt="<?= $title ?>">
            </div>
            <div class="col-12 col-md-9">
                <h1 class="titulo text-center"><?= $title ?></h1>
                <p><?= $description ?></p>
            </div>

        </div>
    </div>

    <h2 class="text-center">Characters</h2>
    <div class="row">
        <?php
            $arquivo = "https://gateway.marvel.com:443/v1/public/events/{$id}/characters?{$url}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);

            foreach ($dados->data->results as $characters) {
                $path = $characters->thumbnail->path;
                $extension = $characters->thumbnail->extension;
                $image = $path . "." . $extension;
                $id = $characters->id;
                $name = $characters->name;
        ?>
        <div class="col-12 col-md-3">
            <div class="card text-center">
                <img src="<?= $image?>" alt="<?= $name?>">
                <p class="titulo">
                    <strong>
                        <?=$name?>
                    </strong>
                    <p>
                        <a href="character/<?=$id?>" class="btn btn-warning"> See More</a>
                    </p>
                </p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <h2 class="text-center">Creators</h2>
    <div class="row">
        <?php
        $arquivo = "https://gateway.marvel.com:443/v1/public/events/{$id}/creators?{$url}";
    
        $dados = file_get_contents($arquivo);

        $dados = json_decode($dados);

        foreach ($dados->data->results as $creators) {
            $path = $creators->thumbnail->path;
            $extension = $creators->thumbnail->extension;
            $image = $path . "." . $extension;
            $id = $creators->id;
            $fullName = $creators->fullName;

            ?>
                <div class="col-12 col-md-3">
                    <div class="card text-center">
                        <img src="<?= $image?>" alt="<?= $fullName?>">
                        <p class="titulo">
                            <strong><?=$fullName?></strong>
                            <p><a href="creator/<?=$id?>" class="btn btn-warning"> See More</a></p>
                        </p>
                    </div>
                </div>
            <?php
        }
        ?>
    </div>

    <h2 class="text-center">Comics</h2>
    <div class="row">
        <?php
            $arquivo = "https://gateway.marvel.com:443/v1/public/events/{$id}/comics?{$url}";
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
                        <a href="comic/<?= $id?>" class="btn btn-warning">See more</a>
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
            $arquivo = "https://gateway.marvel.com:443/v1/public/events/{$id}/series?{$url}";
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
            $arquivo = "https://gateway.marvel.com:443/v1/public/events/{$id}/stories?{$url}";
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

<?php
}
?>

