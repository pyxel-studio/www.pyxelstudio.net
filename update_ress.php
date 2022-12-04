<?php
$data = file_get_contents("php://input");
file_put_contents('scripts/'.$_GET['s'], $data);
echo 'CA MARCHE!';
?>
