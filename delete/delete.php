<?php
    include __DIR__ . '/../database/execute.php';
    include_once __DIR__ . '/../env.php';
    if(!empty($_POST['id'])) {
        if (ctype_digit(strval($_POST['id']))) {
            $roomId = $_POST['id'];
            $checkRoomId = "SELECT * FROM `stanze` WHERE `id` = $roomId";
            $data = getQuery($checkRoomId);
            foreach ($data['data'] as $room) {
                if ($room['id'] != $roomId) {
                    header("Location: $baseRoot?success=false");
                } else {
                    $deleteRoom = "DELETE FROM `stanze` WHERE `id` = $roomId";
                    $data = getQuery($deleteRoom);
                    if ($data['success']) {
                        header("Location: $baseRoot?success=true");
                    } else {
                        header("Location: $baseRoot?success=false");
                    }
                }
            }
        } else {
            header("Location: $baseRoot?success=false");
        }
    } else {
        header("Location: $baseRoot?success=false");
    }
