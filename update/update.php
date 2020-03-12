<?php
        include __DIR__ . '/load.php';
        include __DIR__ . '/../templates/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (!$data['success'] && $data['data'] == null) { ?>
                <div class="alert alert-danger mt-3">
                    <p class="text-center"><?php echo strtoupper($data['message']) ?></p>
                </div>
            <?php } elseif ($data['success'] && $data['data'] == null) { ?>
                <div class="alert alert-danger mt-3">
                    <p class="text-center"><?php echo strtoupper($data['message']) ?></p>
                </div>
            <?php } else { ?>
                <h1 class="text-center">STANZA: <?php echo $data['data']['room_number'] ?></h1>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="room_number">Numero Stanza</label>
                        <input class="form-control" type="number" name="room_number" value="<?php echo $data['data']['room_number'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="floor">Piano</label>
                        <input class="form-control" type="number" name="floor" value="<?php echo $data['data']['floor'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="beds">Numero Letti</label>
                        <input class="form-control" type="number" name="beds" value="<?php echo $data['data']['beds'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $data['data']['id'] ?>">
                        <input class="form-control" class="btn btn-submit" type="submit" value="Salva">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
