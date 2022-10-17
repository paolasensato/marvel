<?php
$id = $param[1] ?? null;

if (empty($id)) {
?>
    <p class="alert alert-danger text-center">
        Ops! Filme inválido!
    </p>
<?php
} else {
    $arquivo = "{$url}/comics/{$id}?{$apiKey}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    $comic = $dados->data->results[0];

    $title = $comic->title;
    $description = $comic->description;
    $path = $comic->thumbnail->path;
    $extension = $comic->thumbnail->extension;
    $image = $path . "." . $extension;
?>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="<?= $image ?>" alt="<?= $title ?>" class="w-100">
            </div>
            <div class="col-12 col-md-9">
                <h1 class="titulo text-center"><?= $title ?></h1>
                <p>
                    <?php 
                        if(empty($description)) {
                            ?>
                                <p>Description not available.</p>
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

    <div class="container text-center my-3">
        <h2 class="text-center">Characters</h2>
            <?php
                $arquivo = "{$url}/comics/{$id}/characters?{$apiKey}";
                $dados =  file_get_contents($arquivo);
                $dados = json_decode($dados);

                if(empty($dados->data->results)) {
                    ?>
                        <p>Characters not available.</p>
                    <?php
                } else {
                    ?>
                        <div id="carouselControls" class="carousel" data-bs-ride="carousel">
                            <div class="carousel-inner d-flex d-inline-block">
                                <?php
                                    foreach ($dados->data->results as $characters) {
                                        $path = $characters->thumbnail->path;
                                        $extension = $characters->thumbnail->extension;
                                        $image = $path . "." . $extension;
                                        $name = $characters->name;
                                        $id = $characters->id;
                                ?>
                                    <div class="col-12 col-md-3 px-1">
                                        <div class="card card-body h-100 text-center">
                                            <img class="img-fluid h-75" src="<?= $image ?>" alt="<?= $name ?>">
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
                                <?php
                                    }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev" onclick="sliderScrollLeft()">
                                <span class="carousel-control-prev-icon bg-dark border border-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next" onclick="sliderScrollRight()">
                                <span class="carousel-control-next-icon bg-dark border border-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php
                }
            ?>
    </div>

    <h2 class="text-center">Creators</h2>
    <div class="row">
        <?php
            $arquivo = "{$url}/comics/{$id}/creators?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);

            if(empty($dados->data->results)){
                ?>
                    <p class="text-center">Creators not available.</p>
                <?php
            } else {
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
                                    <strong>
                                        <?=$fullName?>
                                    </strong>
                                    <p>
                                        <a href="creators/<?=$id?>" class="btn btn-warning"> See More</a>
                                    </p>
                                </p>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
<?php
}
?>
