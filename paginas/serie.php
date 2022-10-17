<?php
    $id = $param[1] ?? null;

    if (empty($id)) {
        include "erro.php";
    } else {
        $arquivo = "{$url}/series/{$id}?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        $serie = $dados->data->results[0];

        $path = $serie->thumbnail->path;
        $title = $serie->title;
        $description = $serie->description;
        $extension = $serie->thumbnail->extension;
        $image = $path . "/portrait_uncanny." . $extension;

?>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="<?= $image ?>" alt="<?= $name ?>">
            </div>
            <div class="col-12 col-md-9">
                <h1 class="card-title text-center"><?= $title ?></h1>
                <p><?= $description ?></p>
            </div>
        </div>
    </div>

    <h2 class="text-center">Characters</h2>
    <div class="row">
        <?php
            $arquivo = "{$url}/series/{$id}/characters?{$apiKey}";
            $dados =  file_get_contents($arquivo);
            $dados = json_decode($dados);


            foreach ($dados->data->results as $characters) {
                $path = $characters->thumbnail->path;
                $extension = $characters->thumbnail->extension;
                $image = $path . "." . $extension;
                $name = $characters->name;
                $id = $characters->id;
        ?>
            <div class="col-12 col-md-3">
                <div class="card text-center">
                    <img src="<?= $image ?>" alt="<?= $name ?>">
                    <p class="titulo">
                        <strong><?= $name ?></strong>
                    </p>
                    <p>
                        <a href="character/<?= $id ?>" class="btn btn-warning"> See more</a>
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
        $arquivo = "{$url}/series/{$id}/creators?{$apiKey}";
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
                    <img src="<?= $image ?>" alt="<?= $fullName ?>">
                    <p class="titulo">
                        <strong>
                            <?= $fullName ?>
                        </strong>
                    </p>
                    <p>
                        <a href="creators/<?= $id ?>" class="btn btn-warning">See More</a>
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
