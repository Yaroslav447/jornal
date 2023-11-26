<html>
    <head>
    <link rel='stylesheet' href='monitor-style.css'>
    </head>
    <body>
        <section class="top">
        <a href="menu.php"><img src="/img/ket_logo.png" class="logo"></a>
        </section>
        <div class="page-title">
            Мониторинг<br>
            заболеваемости
        </div>
    <p>Выберите группу</p>
                        <?php
                            $username = "root";
                            $password = "";
                            // Создаем соединение
                            $conn = new PDO('mysql:host=localhost;dbname=jornal', $username, $password);
                            $query = $conn->prepare("SELECT group_s FROM students");
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            echo "<form method=\"POST\">";
                            echo "<select name=\"groups\">";
                            foreach($result as $row){
                                $group = $row["group_s"];
                                echo "<option>
                                        $group
                                    </option>";
                            }
                            echo "</select>";
                            echo "<button name=\"proupsButton\">Отправить</button>";
                            echo "</form>";
         if(isset($_POST['proupsButton']))
         {
            $date = date('d.m.Y');
             $group = $_POST["groups"];
             $query = $conn->prepare("SELECT * FROM students WHERE group_s = '$group'") ;
             $query->execute();
             $result = $query->fetchAll(PDO::FETCH_ASSOC); //соединение с базой
             echo "<table class=\"table\">
                        <tr>
                            <td>текущая дата:</td>
                            <td>$date</td>
                        </tr>
                </table>";
             echo "<table class=\"table\">";
             echo "<tr class=\"table-head\">
                        <td>Фамилия</td>
                        <td>Имя</td>
                        <td>Отчество</td>
                        <td>1 пара</td>
                        <td>2 пара</td>
                        <td>3 пара</td>
                        <td>4 пара</td>
                    </tr>";
                 foreach($result as $row){

                     $surname = $row["surname"];
                     $name = $row["name"];
                     $patronymic = $row["patronymic"];
                        echo "<tr>
                                <td>$surname </td>
                                <td>$name </td>
                                <td>$patronymic</td>
                                <td><input type=\"text\"></td>
                                <td><input type=\"text\"></td>
                                <td><input type=\"text\"></td>
                                <td><input type=\"text\"></td>
                            </tr>";
                 }
                 echo "</table>";
         } 
?>
    </body>
</html>