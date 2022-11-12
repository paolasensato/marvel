<div class="container">
    <?php
        $id = $param[1] ?? null;

        if (empty($id)) {
            ?>
            <p class="alert alert-danger text-center">
                Oops! Invalid character!
            </p>
            <?php
        } else {
            $arquivo = "{$url}/characters/{$id}?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);

            $character = $dados->data->results[0];

            $path = $character->thumbnail->path;
            $extension = $character->thumbnail->extension;
            $image = $path . $imageSizeUrl . $extension;
            $name = $character->name;
            $description = $character->description;

        ?>
            <div class="card">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="<?= $image ?>" alt="<?= $name ?>">
                    </div>
                    <div class="col-12 col-md-9 p-3 card-principal">
                        <h1 class="text-center py-3"><?= $name ?></h1>
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
        }
        ?>
</div>
