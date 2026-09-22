<?php
$mysqli = new mysqli('localhost', 'root', '', 'insights_counselling');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error . "\n");
}

$res = $mysqli->query("SELECT id, name, about FROM team_members");
while ($row = $res->fetch_assoc()) {
    echo "ID {$row['id']} ({$row['name']}):\n" . $row['about'] . "\n-------------------\n";
}
