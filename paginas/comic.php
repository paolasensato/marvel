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
        
            <div class="container box-principal">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="w-100">
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
            
            <?php
                $arquivo = "{$url}/comics/{$id}/characters?{$apiKey}";
                $dados =  file_get_contents($arquivo);
                $dados = json_decode($dados);
                
                if(!empty($dados->data->results)) {
                    ?>
                        <h2 class="text-center head-font py-5">Characters</h2>
                        <div class="row">
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
                                        <div class="card h-100">
                                            <img src="<?= $image ?>" alt="<?=  $fullName ?>">
                                            <div class="card-body text-center">
                                                <p class="titulo">
                                                    <strong><?= $name ?></strong>
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
                        <div class="row">
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
                                        <div class="card h-100">
                                            <img src="<?= $image ?>" alt="<?=  $fullName ?>">
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
