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
        $image = $path ."/portrait_incredible.". $extension;

?>
    <h1 class="text-center my-5">Serie</h1>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="<?= $image ?>" alt="<?= $name ?>" class="w-100">
            </div>
            <div class="col-12 col-md-9">
                <h3 class="card-title text-center"><?= $title ?></h3>
                <p>
                    <?php 
                        if(empty($description)) {
                            ?>
                                <p>
                                    Description not available. For more information 
                                    <a href="https://www.marvel.com/" target="blank">click here</a>
                                </p>
                            <?php
                        } else {
                            ?>
                                <p><?= $description ?></p>
                            <?php
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <?php
        $arquivo = "{$url}/series/{$id}/characters?{$apiKey}";
        $dados =  file_get_contents($arquivo);
        $dados = json_decode($dados);

        if (!empty($dados->data->results)) {
    ?>        
            <h2 class="text-center">Characters</h2>
            <div class="row">
            <?php
                foreach ($dados->data->results as $characters) {
                    $path = $characters->thumbnail->path;
                    $extension = $characters->thumbnail->extension;
                    $image = $path ."/portrait_incredible.". $extension;
                    $name = $characters->name;
                    $id = $characters->id;
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
                                    <a href="character/<?= $id ?>" class="btn btn-warning"> See more</a>
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

        $arquivo = "{$url}/series/{$id}/creators?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        if (!empty($dados->data->results)) {
        ?>
            <h2 class="text-center">Creators</h2>
            <div class="row">
            <?php

            foreach ($dados->data->results as $creators) {
                $path = $creators->thumbnail->path;
                $extension = $creators->thumbnail->extension;
                $image = $path ."/portrait_incredible.". $extension;
                $id = $creators->id;
                $fullName = $creators->fullName;
            ?>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="<?= $image ?>" alt="<?= $fullName ?>">
                        <div class="card-body text-center">
                            <p class="titulo">
                                <strong>
                                    <?= $fullName ?>
                                </strong>
                            </p>
                            <p>
                                <a href="creators/<?= $id ?>" class="btn btn-warning">See more</a>
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
}
?>
