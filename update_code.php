<?php
$data = json_decode(trim(file_get_contents("php://input")));
file_put_contents($data->file, $data->code);
echo json_encode(['status' => 'ok']);
?>
