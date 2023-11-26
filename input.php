<?php
    $name = htmlentities($_POST["name"]);
    $fam = htmlentities($_POST["fam"]);
    $otz = htmlentities($_POST["otz"]);
    $group = $_POST["group"];
    $login = htmlentities($_POST["login"]);
    $password_s = htmlentities($_POST["password"]);
$servername = "localhost";
$database = "jornal";
$username = "root";
$password = "";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $conn->real_escape_string($_POST["name"]);

$sql= "INSERT INTO students(surname,name,patronymic,group_s,login_s,pass_s) VALUES('$fam','$name','$otz','$group','$login','$password_s')";

if($conn->query($sql)){
    echo "Данные успешно добавлены";
} 
else{
    echo "Ошибка: " . $conn->error;
}

?>