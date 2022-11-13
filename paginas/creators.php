<div class="banner banner-creators">
    <div class="w-100">
        <p id="titulo-principal" class="head-font"><strong>CREATORS</strong></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        $arquivo = "{$url}/creators?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach ($dados->data->results as $creator) {
            $path = $creator->thumbnail->path;
            $extension = $creator->thumbnail->extension;
            $image = $path .$imageSizeUrl. $extension;
            $name = $creator->fullName;
            $id = $creator->id;

        ?>
            <div class="col-12 col-md-2">
                <a href="creator/<?= $id ?>">
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
