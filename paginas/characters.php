<div class="banner banner-characters">
    <div class="w-100">
        <p id="titulo-principal" class="head-font"><strong>CHARACTERS</strong></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
            $arquivo = "{$url}/characters?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);
            
            foreach ($dados->data->results as $comics) {
                $path = $comics->thumbnail->path;
                $extension = $comics->thumbnail->extension;
                $image = $path .$imageSizeUrl. $extension;
                $name = $comics->name;
                $id = $comics->id;
                
                ?>
                <div class="col-12 col-md-2">
                    <a href="character/<?= $id ?>">
                        <div class="card">
                            <img src="<?= $image ?>" alt="<?= $name ?>">
                            <div class="card-body text-center">
                                <p class="titulo"><?= $name ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
    </div>
</div>