<div class="bg-character p-5">
    <div>
        <?php
            $id = $param[1] ?? null;

            if (empty($id)) {
                include 'erro.php';
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
                foreach($character->urls as $detail){
                    if ($detail->type == "detail") {
                        $urlDetail = $detail->url;
                    }
                }

?>
                <div class="container box-principal glass-effect">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="<?= $image ?>" alt="<?= $name ?>" class="w-100 box-img">
                        </div>
                        <div class="col-12 col-md-9 p-4">
                            <h3 class="text-center head-font py-3"><?= $name ?></h3>
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

                                    <a href="<?= $urlDetail?>">
                                        <button class="btn btn-outline-light">See More</button>
                                    </a>
                                    <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
    </div>
</div>

                <div class="container">
                    <?php
                        $arquivo = "{$url}/characters/{$id}/comics?{$apiKey}";
                        $dados = file_get_contents($arquivo);
                        $dados = json_decode($dados);

                        if(!empty($dados->data->results)) {
                        ?>
                            <h2 class="text-center head-font py-5">Comics</h2>
                            <div class="row text-center">
                            <?php
                                foreach ($dados->data->results as $comics) {
                                    $id = $comics->id;
                                    $title = $comics->title;
                                    $path = $comics->thumbnail->path;
                                    $extension = $comics->thumbnail->extension;
                                    $image = $path .$imageSizeUrl. $extension;
                                ?>
                                    <div class="col-12 col-md-2">
                                        <a href="comic/<?= $id ?>"> 
                                            <div class="card">
                                                <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img w-100">
                                                <div class="card-body text-center">
                                                    <p class="titulo">
                                                        <strong><?= $title ?></strong>
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
                
                    $arquivo = "{$url}/characters/{$id}/events?{$apiKey}";
                    $dados = file_get_contents($arquivo);
                    $dados = json_decode($dados);

                    if (!empty($dados->data->results)) {
                        ?>
                            <h2 class="text-center head-font py-5">Events</h2>
                            <div class="row text-center">
                            <?php
                                foreach ($dados->data->results as $events) {
                                    $id = $events->id;
                                    $title = $events->title;
                                    $path = $events->thumbnail->path;
                                    $extension = $events->thumbnail->extension;
                                    $image = $path .$imageSizeUrl. $extension;
                                    ?>
                                    <div class="col-12 col-md-2">
                                        <a href="event/<?= $id ?>">
                                            <div class="card">
                                                <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img w-100">
                                                <div class=" card-body text-center">
                                                    <p class="titulo">>
                                                        <strong><?= $title ?></strong>
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
