<?php
session_start();
?>
<?php include("includes/connect.php"); ?>
<?php

if(isset($_POST["register"])) {

    $userlogin = $_POST['userlogin'];

    // Проверка заполнен ли логин.
    if (!empty($userlogin)) {
        $logincheck = true;
    } else {
        $logincheck = false;
        if ($lang == 'ru') {
            $errors[] = "Ошибка! Заполните поле Логин!";
        } else {
            $errors[] = "Mistake! Enter the Login field!";
        }
    }

    $salt = 'Здесь будет 32 рандомных символа';

    $pass1 = strlen($_POST['password']);
    if ($pass1 < 8) {
        $errors[] = "Короткий пароль";
        $passlength = false;
    } else {
        $passlength = true;
    }

    $pass1 = hash('sha256', $_POST['password'] . $salt);
    $pass2 = hash('sha256', $_POST['password2'] . $salt);

    // Проверка заполненности и подобия паролей.
    if (!empty($pass1 AND $pass2) && $pass1 == $pass2) {
        $passcheck = true;
    } else {
        $passcheck = false;
        $errors[] = "Ошибка! Пароли не совпадают или поля не заполнены!";
    }


    if (!empty($errors)){
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }


    if($passcheck == true && $logincheck = true && $passlength == true) {
        // проверка полей
        if (!empty($_POST['userlogin']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['usersubname']) && !empty($_POST['userpatronymic'])) {
            $userlogin = htmlspecialchars($_POST['userlogin']);
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $usersubname = htmlspecialchars($_POST['usersubname']);
            $userpatronymic = htmlspecialchars($_POST['userpatronymic']);
            $password = htmlspecialchars($_POST['password']);

            $userlogin = mysqli_real_escape_string($con, $userlogin);    //Защита от SQL-инЪекции методом экранирования


            $uploads_dir = 'uploads';  // путь до картинки

            if ($_FILES["pictures"]["error"] == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["picture"]["tmp_name"];
                // basename() может предотвратить атаку на файловую систему;
                // может быть целесообразным дополнительно проверить имя файла
                $name = basename($_FILES["picture"]["name"]);
                $form_image = substr($name, -4, 4);   //беру формат картинки
                move_uploaded_file($tmp_name, "$uploads_dir/$userlogin$form_image");  // загружаю картинку в дирректорию для картинок
            }

            $query = mysqli_query($con, "SELECT * FROM user_table WHERE userlogin='" . $userlogin . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {
                $sql = "INSERT INTO user_table
                (userlogin, email, username,  password, usersubname, userpatronymic,pictureroot,picturetype)
	            VALUES('$userlogin','$email', '$username', '$password', '$usersubname', '$userpatronymic', '$uploads_dir','$form_image')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    // $message = "Аккаунт был успешно создан";
                    header('Location: index.php');  // перенаправление на нужную страницу

                } else {
                    if ($lang == 'ru') {
                        $message = "Не получилось добавить данные в базу даннаых!";
                    } else {
                        $message = "Failed to add data to the database!";
                    }
                }
            } else {
                if ($lang == 'ru') {
                    $message = "Этот пользователь уже существует. Попробуйте другой логин!";
                } else {
                    $message = "This user already exists. Try another login!";
                }
            }
        } else {
            if ($lang == 'ru') {
                $message = "Все поля обязательны для заполнения!";
            } else {
                $message = "All fields are required!";
            }
        }
    }
}
?>





<?php include("includes/header.php"); ?>
<?php if (!empty($message)) {echo '<p class="message">' . "MESSAGE: ". $message . "</p>";} ?>
<div class="container mregister">
    <div id="login">
        <h1 class="ru" lang="ru">Регистрация</h1><h1 class="en" lang="en">Registration</h1>
        <form class="registerform" action="reg.php" id="registerform" method="post"name="registerform" enctype="multipart/form-data" >
            <p><label for="userlogin"><div class="ru" lang="ru">Логин</div><div class="en" lang="en">Login</div>
                    <input class="input" id="userlogin" name="userlogin"size="20"  type="text"></label></p>
            <p><label for="user_pass"><div class="ru" lang="ru">Электронная почта</div><div class="en" lang="en">Email</div>
                    <input class="input" id="email" name="email" size="32"type="email" ></label></p>
            <p><label for="user_pass"><div class="ru" lang="ru">Имя</div><div class="en" lang="en">Name</div>
                    <input class="input" id="username" name="username"size="20" type="text" ></label></p>
            <p><label for="user_pass"><div class="ru" lang="ru">Фамилия</div><div class="en" lang="en">Subname</div>
                    <input class="input" id="usersubname" name="usersubname"size="20" type="text" ></label></p>
            <p><label for="user_pass"><div class="ru" lang="ru">Отчество</div><div class="en" lang="en">Patronymic</div>
                    <input class="input" id="userpatronymic" name="userpatronymic"size="20" type="text" ></label></p>
            <p><label for="pass1"><div class="ru" lang="ru">Пароль</div><div class="en" lang="en">Password</div>
                    <input class="input" id="password" name="password"size="32"   type="password" ></label></p>
            <p><label for="pass2"><div class="ru" lang="ru">Пароль</div><div class="en" lang="en">Password again</div>
                    <input class="input" id="password2" name="password2"size="32"   type="password" ></label></p>
            <p><label for="inputimg"><div class="ru" lang="ru">Изображение</div><div class="en" lang="en">Your image</div>
                    <input  id="picture" name="picture" type="file"  ></label></p>
            <div class="ru" lang="ru"><p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться" ></p></div> <div class="en" lang="en"><p class="submit"><input class="button" id="register" name= "register" type="submit" value="Register" ></p></div>
            <div class="ru" lang="ru"><p class="regtext">Уже зарегистрированы? <a href= "index.php">Введите имя пользователя</a>!</p></div><div class="en" lang="en"><p class="regtext" >Already registered? <a href= "index.php">Enter your Login</a>!</p></div>
        </form>
    </div>
</div>
<script src="JS/lang.js"></script>
<script src="JS/validation.js"></script>
<footer>

</footer>
</body>
</html>