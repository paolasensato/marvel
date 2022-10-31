<h1 class="text-center">
    Stories
</h1>
<div class="row">
    <?php
        $arquivo = "{$url}stories?{$apiKey}";
        $dados = file_get_contents($arquivo);
        $dados = json_decode($dados);

        foreach($dados->data->results as $stories){
            if($stories->thumbnail == null) {
                $image = "http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg";
            } else {
                $path = $stories->thumbnail->path;
                $extension = $stories->thumbnail->extension;
                $image = $path .".". $extension;                
            }
            $title = $stories->title;
            $id = $stories->id;

    ?>
        <div class="col-12 col-md-3">
            <div class="card">
                <img src="<?= $image ?>" alt="<?= $title?>">
                <div class="card-body text-center">
                    <p class="titulo"><strong><?= $title?></strong></p>
                    <p>
                        <a href="storie/<?= $id?>" class="btn btn-warning">Ver detalhes</a>
                    </p>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
</div>
