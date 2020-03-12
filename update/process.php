<?php
    include __DIR__ . '/../database/execute.php';
    include_once __DIR__ . '/../env.php';
    if (empty($_POST['id'])) {
        header("Location: $baseRoot?success=false");
    }
    if (empty($_POST['beds'])) {
        header("Location: $baseRoot?success=false");
    }
    if (empty($_POST['floor'])) {
        header("Location: $baseRoot?success=false");
    }
    if (empty($_POST['room_number'])) {
        header("Location: $baseRoot?success=false");
    }
    foreach($_POST as $key => $value) {
        if (intval($value) == 0) {
            header("Location: $baseRoot?success=false");
        }
    }
    $roomId = $_POST['id'];
    $beds = $_POST['beds'];
    $floor = $_POST['floor'];
    $roomNumber = $_POST['room_number'];
    $roomDetail = "SELECT * FROM `stanze` WHERE `id`='$roomId'";
    $data = getQuery($roomDetail);
    if ($data['success']) {
        foreach ($data['data'] as $room) {
            if ($room['id'] == $roomId) {
                $conn = new mysqli(
                    $serverName,
                    $user,
                    $pwd,
                    $dbName
                );
                $sql = "UPDATE `stanze` SET `room_number` = ?, `beds` = ?, `floor` = ?, `updated_at` = NOW() WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iiii", $roomNumber, $beds, $floor, $roomId);
                $stmt->execute();
                $conn->close();
                if ($stmt->affected_rows > 0) {
                    header("Location: $baseRoot" . "view/view.php?id=$roomId");
                }
            } else {
                header("Location: $baseRoot?success=false");
            }
        }
    } else {
        header("Location: $baseRoot?success=false");
    }
