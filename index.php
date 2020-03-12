<?php
    include __DIR__ . '/database/execute.php';
    include __DIR__ . '/templates/header.php';
    // query
    $allRooms = "SELECT * FROM `stanze`";
    $data = getQuery($allRooms);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (!empty($_GET['success'])) { ?>
                <?php $deleted = filter_var($_GET['success'], FILTER_VALIDATE_BOOLEAN); ?>
                <?php if ($deleted) { ?>
                    <div class="alert alert-success mt-3">
                        <p class="text-center">OPERAZIONE ESEGUITA</p>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger mt-3">
                        <p class="text-center">OPERAZIONE FALLITA</p>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if (!$data['success'] && $data['data'] == null) { ?>
                <div class="alert alert-danger mt-3">
                    <p class="text-center"><?php echo strtoupper($data['message']) ?></p>
                </div>
            <?php } elseif ($data['success'] && $data['data'] == null) { ?>
                <div class="alert alert-danger mt-3">
                    <p class="text-center"><?php echo strtoupper($data['message']) ?></p>
                </div>
            <?php } else ?>
                <h1 class="text-center">TUTTE LE STANZE</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Numero Stanza</th>
                        <th>Piano</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php { foreach ($data['data'] as $room) { ?>
                            <tr>
                                <td><?php echo $room['room_number'] ?></td>
                                <td><?php echo $room['floor'] ?></td>
                                <td><a class="btn btn-info" href="view/view.php?id=<?php echo $room['id'] ?>">VEDI</a></td>
                                <td><a class="btn btn-success" href="update/update.php?id=<?php echo $room['id'] ?>">AGGIORNA</a></td>
                                <td>
                                    <form action="delete/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $room['id'] ?>">
                                        <input class="btn btn-danger" type="submit" value="ELIMINA">
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/templates/footer.php'; ?>
