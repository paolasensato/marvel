<div class="container">
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
            $image = $path . $imageSizeUrl . $extension;
            ?>
        <h1 class="text-center my-5">Comic</h1>
        <div class="card">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img src="<?= $image ?>" alt="<?= $title ?>" class="w-100">
                </div>
                <div class="col-12 col-md-9">
                    <h3 class="titulo text-center"><?= $title ?></h3>
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
            $arquivo = "{$url}/comics/{$id}/characters?{$apiKey}";
            $dados =  file_get_contents($arquivo);
            $dados = json_decode($dados);
            
            if(!empty($dados->data->results)) {
                ?>
                    <h2 class="text-center">Characters</h2>
                    <div class="container text-center my-3">
                        <div id="carouselControls" class="carousel" data-bs-ride="carousel">
                            <div class="carousel-inner d-flex d-inline-block">
                                <?php
                                    foreach ($dados->data->results as $characters) {
                                        $path = $characters->thumbnail->path;
                                        $extension = $characters->thumbnail->extension;
                                        $image = $path .$imageSizeUrl. $extension;
                                        $name = $characters->name;
                                        $id = $characters->id;
                                        ?>
                                    <div class="col-12 col-md-3 px-1">
                                        <div class="card h-100">
                                            <img class="img-fluid" src="<?= $image ?>" alt="<?= $name ?>">
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
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev" onclick="sliderScrollLeft()">
                                <span class="carousel-control-prev-icon bg-dark border border-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next" onclick="sliderScrollRight()">
                                <span class="carousel-control-next-icon bg-dark border border-dark" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                <?php
            }
            
            $arquivo = "{$url}/comics/{$id}/creators?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);
            
            if(!empty($dados->data->results)){
                ?>
                <h2 class="text-center">Creators</h2>
                <div class="row">
                    <?php
                    foreach ($dados->data->results as $creators) {
                        $path = $creators->thumbnail->path;
                        $extension = $creators->thumbnail->extension;
                        $image = $path .$imageSizeUrl. $extension;
                        $id = $creators->id;
                        $fullName = $creators->fullName;
                        ?>
                        <div class="col-12 col-md-3">
                            <div class="card h-100">
                                <img src="<?= $image ?>" alt="<?=  $fullName ?>">
                                <div class="card-body text-center">
                                    <p class="titulo">
                                        <strong>
                                            <?= $fullName ?>
                                        </strong>
                                    </p>
                                    <p>
                                        <a href="creators/<?= $id ?>" class="btn btn-warning"> See more</a>
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
</div>
