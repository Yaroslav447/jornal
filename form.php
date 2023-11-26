<html>
<head>
<title>добавть пользователя</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
    <div>
        <div class="add-user">
                <span>
                    <h2>Добавить пользователя</h2>
                    <form action="input.php" method="POST">
                    <p>Введите имя:<br> 
                    <input type="text" name="name" /></p>
                    <p>Введите фамилию:<br> 
                        <input type="text" name="fam" /></p>
                        <p>Введите отчество:<br> 
                            <input type="text" name="otz" /></p>
                    <p>Выберите группу</p>
                    <?php
                         $username = "root";
                         $password = "";
                         // Создаем соединение
                         $conn = new PDO('mysql:host=localhost;dbname=jornal', $username, $password);
                         $query = $conn->prepare("SELECT group_name FROM groups");
                         $query->execute();
                         $result = $query->fetchAll(PDO::FETCH_ASSOC);
                         echo "<select name=\"group\">";
                            foreach($result as $row){
                                $group = $row["group_name"];
                                echo "<option>
                                        $group
                                    </option>";
                            }
                            echo "</select>";
                    ?>
                    <!-- <select name="groups">
                        <option value="Выберите группу">Выберите группу</option>
                        <option value="3-1ИС">3-1ИС</option>
                        <option value="3-2ИС">3-2ИС</option>
                    </select> -->
                    <p>Введите логин:<br> 
                        <input type="text" name="login" /></p>
                        <p>Введите пароль:<br> 
                            <input type="text" name="password" /></p>
                    <input type="submit" value="Отправить">
                    </form>
                </span>
        </div>
    </div>
</body>
</html>