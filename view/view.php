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
                <div class="card">
                    <ul>
                        <li>Piano: <?php echo $data['data']['floor'] ?></li>
                        <li>Numero Letti: <?php echo $data['data']['beds'] ?></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
