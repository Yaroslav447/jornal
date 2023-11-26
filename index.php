<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Авторизация</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style-login.css'>
</head>
<body>
    <div id="page">
        <div id="page-content">
            <div class="user-login">
                <span>
                    <form  action="/" method="post">
                        <img src="/img/Логотип-техникума1.png">
                        <div class="text-box-padding">
                            <input type="text" class="text-box" placeholder="Логин" name="login">
                        </div>
                        <div class="text-box-padding">
                            <input type="password" class="text-box" placeholder="Пароль" name="password">
                        </div>
                        <div class="button-align text-box-padding">
                            <button class="button" name="log_in">Вход</button>
                        </div>
                    </form>
                </span>
            </div>
        </div>
    </div>
    <?php
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
?>
    <?php
	if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Поиск пользователя в базе данных
    $query = "SELECT * FROM students WHERE login_s='$login' AND pass_s='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        // Учетные данные верны
        $_SESSION['login'] = $login;

        // Перенаправляем пользователя
        header('Location: menu.php');
    } else{
         $query = "SELECT * FROM teacher WHERE login_t='$login' AND pass_t='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        // Учетные данные верны 
        $_SESSION['login'] = $login;

        // Перенаправляем пользователя на страницу
        header('Location: menu.php');
    } else{
        // Учетные данные неверны - отображаем сообщение об ошибке
        echo "<table class=\"erorr\"><tr><td>Неверный логин или пароль, попробуйте заново.</td></tr></table>";
    }
    }
}
?>
	
	
</body>
</html>
