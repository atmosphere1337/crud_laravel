hello world? 
<?php 
echo "sosi";
$host = 'db';
$user = 'root';
$pass = '1337';
$mydatabase = 'test';
$conn = new mysqli($host, $user, $pass, $mydatabase);
$sql = 'SELECT * FROM person';
if ($result = $conn->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}
foreach ($users as $user) {
    echo "<br>";
    echo $user->id . " " . $user->name;
    echo "<br>";
}
?>
