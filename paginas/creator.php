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
    <h1 class="mb-3 text-center">Creator</h1>
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body text-center">
                <img src="<?= $image ?>" alt="<?= $name ?>">
                <h1><?= $name ?></h1>
            </div>
        </div>
    </div>

<?php
    $arquivo = "{$url}/creators/{$id}/comics?{$apiKey}";
    $dados = file_get_contents($arquivo);
    $dados = json_decode($dados);
    
    if(!empty($dados->data->results)){
?>
        <h2 class="text-center">Comics</h2>
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
