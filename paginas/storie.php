<?php 
    $id = $param[1] ?? null;

    if(empty($id)) {
        include "erro.php";
    } else {
        $arquivo = "{$url}stories/{$id}?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        $storie = $dados->data->results[0];

        if ($storie->thumbnail == null){
            $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
        } else {
            $path = $storie->thumbnail->path;
            $extension = $storie->thumbnail->extension;
            $image = $path ."/portrait_uncanny.". $extension;  
        }
        $title = $storie->title;
        $description = $storie->description;
               
        ?>
        <div class="card">
            <div class="row">
                <div class="col-12 col-md-3">
                    <img src="<?=$image?>" alt="<?=$title?>">
                </div>
                <div class="col-12 col-md-9">
                    <h3 class="titulo text-center"><?=$title?></h3>
                    <p>
                        <?php
                            if(empty($description)) {
                                ?>
                                    <p>Description not available. For more information 
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
            if(!empty($storie->creators->items)){
                ?>
                <h2 class="text-center">Creators</h2>
                <div class="row">
                    <?php
                        foreach ($storie->creators->items as $creator) {
                            $role = $creator->role;
                            $name = $creator->name;
                            $resourceURI = $creator->resourceURI;

                            $arquivo = "{$resourceURI}?{$apiKey}";
                            $dados = file_get_contents($arquivo);
                            $dados = json_decode($dados);

                            foreach ($dados->data->results as $imageCreator) {
                                if ($imageCreator->thumbnail == null){
                                    $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
                                } else {
                                    $path = $imageCreator->thumbnail->path;
                                    $extension = $imageCreator->thumbnail->extension;
                                    $image = $path ."/portrait_uncanny.". $extension;  
                                } 
                                ?>
                                <div class="col-12 col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="<?= $image ?>" alt="<?= $name?>">
                                        <div class="card-body text-center">
                                            <p class="titulo"><strong><?= $name?></strong></p>
                                            <p>(<?=$role?>)</p>
                                            <p>
                                                <a href="creator/<?= $id?>" class="btn btn-warning">See more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <?php 
            }

            $arquivo = "{$url}/stories/{$id}/comics?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);

            $comics = $dados->data->results;

            if (!empty($comics)) {
                ?>
                <h2 class="text-center">Comics</h2>
                <div class="row">
                    <?php
                        foreach ($comics as $comics) {
                            if ($comics->thumbnail == null){
                                $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
                            } else {
                                $path = $comics->thumbnail->path;
                                $extension = $comics->thumbnail->extension;
                                $image = $path ."/portrait_uncanny.". $extension;  
                            }
                            $id = $comics->id;
                            $title = $comics->title;
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
                <?php
            }

            $arquivo = "{$url}/stories/{$id}/series?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);

            $series = $dados->data->results;

            if(!empty($series)) {
                ?>
                <h2 class="text-center">Series</h2>
                <div class="row">
                    <?php
                    foreach ($series as $series) {
                        if ($series->thumbnail == null){
                            $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
                        } else {
                            $path = $series->thumbnail->path;
                            $extension = $series->thumbnail->extension;
                            $image = $path ."/portrait_uncanny.". $extension;  
                        }
                        $id = $series->id;
                        $title = $series->title;
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
                <?php
            }

            $arquivo = "{$url}/stories/{$id}/events?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);
            
            $events = $dados->data->results;
            
            if(!empty($events)) {
                ?>
                <h2 class="text-center">Events</h2>
                <div class="row">
                    <?php
                        foreach ($events as $events) {
                            if ($events->thumbnail == null){
                                $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available/portrait_uncanny.jpg";
                            } else {
                                $path = $events->thumbnail->path;
                                $extension = $events->thumbnail->extension;
                                $image = $path ."/portrait_uncanny.". $extension;  
                            }
                            $id = $events->id;
                            $title = $events->title;
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
}
                ?>