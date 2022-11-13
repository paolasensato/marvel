<div class="bg-event p-5">
    <div>
        <?php
        $id = $param[1] ?? null;
        
        if (empty($id)) {
            include 'erro.php';
        } else {
            $arquivo = "{$url}/events/{$id}?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);
            
            $comic = $dados->data->results[0];
            
            $title = $comic->title;
            $description = $comic->description;
            $path = $comic->thumbnail->path;
            $extension = $comic->thumbnail->extension;
            $image = $path .$imageSizeUrl. $extension;
            ?>

            <div class="container box-principal glass-effect">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="w-100 box-img">
                    </div>
                    <div class="col-12 col-md-9">
                        <h3 class="text-center head-font py-3"><?= $title ?></h3>
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
    </div>
</div>
            
            <div class="container">
                <?php
                $arquivo = "{$url}/events/{$id}/characters?{$apiKey}";
                $dados = file_get_contents($arquivo);
                $dados = json_decode($dados);
                
                if (!empty($dados->data->results)) {
                    ?>
                    <h2 class="text-center head-font py-5">Characters</h2>
                    <div class="row">
                        <?php
                        foreach ($dados->data->results as $characters) {
                            $path = $characters->thumbnail->path;
                            $extension = $characters->thumbnail->extension;
                            $image = $path .$imageSizeUrl. $extension;
                            $id = $characters->id;
                            $name = $characters->name;
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
                
            
                $arquivo = "{$url}/events/{$id}/creators?{$apiKey}";
                $dados = file_get_contents($arquivo);
                $dados = json_decode($dados);
                
                if (!empty($dados->data->results)) {
                    ?>
                <h2 class="text-center head-font py-5">Creators</h2>
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
                            <div class="card">
                                <img src="<?= $image ?>" alt="<?= $fullName ?>">
                                <div class="card-body text-center">
                                    <p class="titulo">
                                        <strong>
                                            <?= $fullName ?>
                                        </strong>
                                    </p>
                                    <p>
                                        <a href="creator/<?= $id ?>" class="btn btn-warning"> See more</a>
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
                
                $arquivo = "{$url}/events/{$id}/comics?{$apiKey}";
                $dados = file_get_contents($arquivo);
                $dados = json_decode($dados);
                
                if (!empty($dados->data->results)) {
                    ?>        
                    <h2 class="text-center head-font py-5">Comics</h2>
                    <div class="row">
                        <?php
                        foreach ($dados->data->results as $comics) {
                            $path = $comics->thumbnail->path;
                            $extension = $comics->thumbnail->extension;
                            $image = $path .$imageSizeUrl. $extension;
                            $title = $comics->title;
                            $id = $comics->id;
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
        }
    ?>
            </div>
