<?php
header('Content-Type: application/json; charset=utf-8');

include_once 'conexao.php';

$query_events = "SELECT id, title, color, start, end FROM events";
$result_events = $connection->prepare($query_events);
$result_events->execute();
$result_events->bind_result($id, $title, $color, $start, $end);

$eventos = [];

while ($result_events->fetch()) {
    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end,
    ];
}

$result_events->close();
echo json_encode($eventos);
?>