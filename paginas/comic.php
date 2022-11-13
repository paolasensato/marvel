<div class="bg-comic p-5">
    <div>
        <?php
        $id = $param[1] ?? null;
        
        if (empty($id)) {
            ?>
            <p class="alert alert-danger text-center">
                Oops! Invalid comic!
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
            foreach($comic->urls as $detail){
                if ($detail->type == "detail") {
                    $urlDetail = $detail->url;
                }
            }
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
                                            Description not available. For more information click see more
                                        </p>
                                        <a href="<?= $urlDetail?>">
                                            <button class="btn btn-outline-light">See More</button>
                                        </a>
                                        <?php
                                } else {
                                    ?>
                                        <p><?= $description ?></p>
                                        <div class="creators">
                                            <?php
                                            if($comic->creators != null) {

                                                foreach ($comic->creators->items as $creator) {
                                                    $role = $creator->role;
                                                    $name = $creator->name;
                                                    if ($role == "writer") {
                                                        $writer = $name;
                                                    } elseif ($role == "penciller" || $role == "penciller (cover)") {
                                                        $penciller = $name;
                                                    }
                                                }
                                                ?>
                                                <div class="writer">
                                                    <div>
                                                        <p class="title"><strong>Writer:</strong></p>
                                                    </div>
                                                    <div>
                                                       <p><?=$writer?></p>
                                                    </div>
                                                </div>
                                                <div class="penciler">
                                                    <div>
                                                        <p class="title"><strong>Penciller:</strong></p>
                                                    </div>
                                                    <div>
                                                        <p><?=$penciller?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <a href="<?= $urlDetail?>">
                                                <button class="btn btn-outline-light">See More</button>
                                            </a>
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
                    $arquivo = "{$url}/comics/{$id}/characters?{$apiKey}";
                    $dados = file_get_contents($arquivo);
                    $dados = json_decode($dados);
                    
                    if(!empty($dados->data->results)) {
                        ?>
                            <h2 class="text-center head-font py-5">Characters</h2>
                            <div class="row text-center">
                                <?php
                                    foreach ($dados->data->results as $characters) {
                                        $path = $characters->thumbnail->path;
                                        $extension = $characters->thumbnail->extension;
                                        $image = $path .$imageSizeUrl. $extension;
                                        $name = $characters->name;
                                        $id = $characters->id;
                                        ?>
                                        <div class="col-12 col-md-2">
                                            <a href="character/<?= $id ?>">
                                                <div class="card">
                                                    <img src="<?= $image ?>" alt="<?=  $fullName ?>" class="card-img w-100">
                                                    <div class="card-body text-center">
                                                        <p class="titulo">
                                                            <strong>
                                                                <?= $name ?>
                                                            </strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                            </div>
                            <?php
                        }
                        
                        $arquivo = "{$url}/comics/{$id}/creators?{$apiKey}";
                        $dados = file_get_contents($arquivo);
                        $dados = json_decode($dados);
                        
                        if(!empty($dados->data->results)){
                            ?>
                                <h2 class="text-center head-font py-5">Creators</h2>
                                <div class="row text-center">
                                    <?php
                                    foreach ($dados->data->results as $creators) {
                                        $path = $creators->thumbnail->path;
                                        $extension = $creators->thumbnail->extension;
                                        $image = $path .$imageSizeUrl. $extension;
                                        $id = $creators->id;
                                        $fullName = $creators->fullName;
                                        ?>
                                        <div class="col-12 col-md-2">
                                            <a href="creators/<?= $id ?>">
                                                <div class="card">
                                                    <img src="<?= $image ?>" alt="<?=  $fullName ?>" class="card-img w-100">
                                                    <div class="card-body text-center">
                                                        <p class="titulo">
                                                            <strong><?= $fullName ?></strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
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
