<div class="container">
    <?php
        $id = $param[1] ?? null;
        
        if (empty($id)) {
            ?>
            <p class="alert alert-danger text-center">
                Oops! Invalid creator!
            </p>
            <?php
        } else {
            $arquivo = "{$url}/creators/{$id}?{$apiKey}";
            $dados = file_get_contents($arquivo);
            $dados = json_decode($dados);
            
            $creator = $dados->data->results[0];
            
            $path = $creator->thumbnail->path;
            $extension = $creator->thumbnail->extension;
            $image = $path .$imageSizeUrl. $extension;
            $name = $creator->fullName;
            
            ?>
                <div class="container box-principal">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="<?= $image ?>" alt="<?= $name ?>" class="w-100">
                        </div>
                        <div class="col-12 col-md-9 p-4">
                            <h3 class="text-center head-font py-3"><?= $name ?></h3>
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
                $arquivo = "{$url}/creators/{$id}/comics?{$apiKey}";
                $dados = file_get_contents($arquivo);
                $dados = json_decode($dados);
                
                if(!empty($dados->data->results)){
                    ?>
                    <h2 class="text-center head-font py-5">Comics</h2>
                    <div class="row text-center">
                        <?php
                    foreach ($dados->data->results as $comics) {
                        $id = $comics->id;
                        $title = $comics->title;
                        $path = $comics->thumbnail->path;
                        $extension = $comics->thumbnail->extension;
                        $image = $path . $imageSizeUrl . $extension;
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
                
                $arquivo = "{$url}/creators/{$id}/events?{$apiKey}";
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
</div>
