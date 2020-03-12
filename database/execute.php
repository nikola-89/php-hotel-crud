<?php
    function getQuery($sqlQuery) {
        include __DIR__ . '/../env.php';
        $conn = new mysqli(
            $serverName,
            $user,
            $pwd,
            $dbName
        );
        if ($conn && $conn->connect_error) {
            $result = [
                'success' => false,
                'message' => $conn->connect_error,
                'data' => null
            ];
        }
        // *******************************
        $execute = $conn->query($sqlQuery);
        if($execute && $execute->num_rows > 0) {
            while ($row = $execute->fetch_assoc()) {
                $data[] = $row;
            }
            $result = [
                'success' => true,
                'message' => 'ok',
                'data' => $data
            ];
        } elseif ($execute) {
            if (is_bool($execute)) {
                if ($execute) {
                    $result = [
                        'success' => true,
                    ];
                } else {
                    $result = [
                        'success' => false,
                    ];
                }
            } else {
                $result = [
                    'success' => true,
                    'message' => 'query no results',
                    'data' => null
                ];
            }
        } else {
            $result = [
                'success' => true,
                'message' => 'query error',
                'data' => null
            ];
        }
        $conn->close();
        return $result;
    }
