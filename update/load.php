<?php
    include __DIR__ . '/../database/execute.php';
    if(!empty($_GET['id'])) {
        if (ctype_digit(strval($_GET['id']))) {
            $roomId = $_GET['id'];
            $roomDetail = "SELECT * FROM `stanze` WHERE `id`='$roomId'";
            $data = getQuery($roomDetail);
            if ($data['success']) {
                foreach ($data['data'] as $room) {
                    if ($room['id'] == $roomId) {
                        $data = [
                            'success' => true,
                            'message' => 'ok',
                            'data' => $room
                        ];
                    } else {
                        $data = [
                            'success' => false,
                            'message' => 'id mismatch',
                            'data' => null
                        ];
                    }
                }
            }
        } else {
            $data = [
                'success' => false,
                'message' => 'id not valid',
                'data' => null
            ];
        }
    } else {
        $data = [
            'success' => false,
            'message' => 'id not found',
            'data' => null
        ];
    }
