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
            <div class="col-12 col-md-9">
                <h1 class="text-center"><?= $name ?></h1>
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
    $arquivo = "{$url}/characters/{$id}/comics?{$apiKey}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    if(!empty($dados->data->results)) {
    ?>
        <h2 class="text-center">Comics</h2>
        <div class="row text-center">
        <?php
        foreach ($dados->data->results as $comics) {
            $id = $comics->id;
            $title = $comics->title;
            $path = $comics->thumbnail->path;
            $extension = $comics->thumbnail->extension;
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
    
    $arquivo = "{$url}/characters/{$id}/events?{$apiKey}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);

    if (!empty($dados->data->results)) {
        ?>
        <h2 class="text-center">Events</h2>
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
                    <div class="text-center">
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
