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
                
                $event = $dados->data->results[0];
                
                $title = $event->title;
                $description = $event->description;
                $path = $event->thumbnail->path;
                $extension = $event->thumbnail->extension;
                $image = $path .$imageSizeUrl. $extension;
                foreach($event->urls as $detail){
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
                        <div class="col-12 col-md-9 p-4">
                            <h3 class="text-center head-font py-3"><?= $title ?></h3>
                            <p>
                                <?php 
                                    if(empty($description)) {
                                        ?>
                                            <p>
                                                Description not available. For more information click on see more.
                                            </p>
                                            <a href="<?= $urlDetail?>" target="blank">
                                                <button class="btn btn-outline-light">See More</button>
                                             </a>
                                            <?php
                                    } else {
                                        ?>
                                            <p><?= $description ?></p>
                                            <h5 class="title-h5"><strong>Creators:</strong></h5>
                                            <div class="creators">
                                                <?php
                                                if($event->creators != null) {

                                                    foreach ($event->creators->items as $creator) {
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
                                                    <?php
                                                }
                                                ?>
                                            </div>

                        
                                            <h5 class="title-h5"><strong>Dates:</strong></h5>
                                            <div class="dates">
                                                <?php
                                                    $start = $event->start;
                                                    $end = $event->end;

                                                    $start = strtotime($start);
                                                    $end = strtotime($end);

                                                    $formatStart = date('d/M/Y', $start);
                                                    $formatEnd = date('d/M/Y', $end);
                                                ?>
                                                <div class="start">
                                                    <div>
                                                        <p class="title-dates"><strong>Start:</strong></p>
                                                    </div>
                                                    <div>
                                                    <p><?=$formatStart?></p>
                                                    </div>
                                                </div>
                                                <div class="end">
                                                    <div>
                                                        <p class="title-dates"><strong>End:</strong></p>
                                                    </div>
                                                    <div>
                                                        <p><?=$formatEnd?></p>
                                                    </div>
                                                </div>
                                            </div>

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
                    $arquivo = "{$url}/events/{$id}/characters?{$apiKey}";
                    $dados = file_get_contents($arquivo);
                    $dados = json_decode($dados);
                    
                    if (!empty($dados->data->results)) {
                        ?>
                        <h2 class="text-center head-font py-5">Characters</h2>
                        <div class="row text-center">
                            <?php
                                foreach ($dados->data->results as $characters) {
                                    $path = $characters->thumbnail->path;
                                    $extension = $characters->thumbnail->extension;
                                    $image = $path .$imageSizeUrl. $extension;
                                    $id = $characters->id;
                                    $name = $characters->name;
                                    ?>
                                    <div class="col-12 col-md-2">
                                        <a href="character/<?= $id ?>">
                                            <div class="card">
                                                <img src="<?= $image ?>" alt="<?= $name ?>" class="card-img w-100">
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
                    
                    $arquivo = "{$url}/events/{$id}/comics?{$apiKey}";
                    $dados = file_get_contents($arquivo);
                    $dados = json_decode($dados);
                    
                    if (!empty($dados->data->results)) {
                        ?>        
                        <h2 class="text-center head-font py-5">Comics</h2>
                        <div class="row text-center">
                            <?php
                            foreach ($dados->data->results as $comics) {
                                $path = $comics->thumbnail->path;
                                $extension = $comics->thumbnail->extension;
                                $image = $path .$imageSizeUrl. $extension;
                                $title = $comics->title;
                                $id = $comics->id;
                                ?>
                                <div class="col-12 col-md-2">
                                    <a href="comic/<?= $id ?>">
                                        <div class="card">
                                            <img src="<?= $image ?>" alt="<?= $title ?>" class="card-img w-100">
                                            <div class="card-body text-center">
                                                <p class="titulo">
                                                    <strong>
                                                        <?= $title ?>
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
            }
    ?>
                </div>
