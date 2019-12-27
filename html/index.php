<?php
session_start();
?>
<?php require_once("includes/connect.php"); ?>
<?php
if(isset($_SESSION["session_login"])){
    header("Location: preview.php");
}
$flag=0;
if(isset($_POST["login"])){

    if(!empty($_POST['userlogin']) && !empty($_POST['password'])) {
        $userlogin=htmlspecialchars($_POST['userlogin']);
        $password=htmlspecialchars($_POST['password']);

        $userlogin=mysqli_real_escape_string($con, $userlogin);    //Защита от SQL-инЪекции методом экранирования
        $password=mysqli_real_escape_string($con, $password);    //

        $query =mysqli_query($con,"SELECT * FROM user_table WHERE userlogin='".$userlogin."' AND password='".$password."'");  //данные из БД
        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $dbuserlogin=$row['userlogin'];
                $dbpassword=$row['password'];
                $dbname=$row['username'];
                $dbsubname=$row['usersubname'];
                $dbpatronymic=$row['userpatronymic'];
                $dbemail=$row['email'];
                $dbpicturepath=$row['pictureroot'];
                $dbpicturetype=$row['picturetype'];

            }
           // if($userlogin == $dbuserlogin && $password == $dbpassword)
           /// {

                $_SESSION['session_login']=$userlogin;
                $_SESSION['session_name']=$dbname;
                $_SESSION['session_subname']=$dbsubname;
                $_SESSION['session_patronymic']=$dbpatronymic;
                $_SESSION['session_email']=$dbemail;
                $_SESSION['session_picturepath']=$dbpicturepath;
                $_SESSION['session_picturetype']=$dbpicturetype;
                header("Location: preview.php");/* Перенаправление браузера */
           // }

        } else {
            include("includes/header.php");
            $flag=1;
            if($lang=='ru') {
                $message = "Неправильное имя пользователя или пароль!";
            }
            else{
                $message = "Invalid username or password!";
            }

        }
    } else {
        include("includes/header.php");
        $flag=1;
        if($lang=='ru') {
            $message = "Все поля обязательны для заполнения!";
        }
        else{
            $message = "All fields are required!";
        }
    }
}
?>

<?php if($flag==0) {include("includes/header.php"); }?>
<?php if (!empty($message)) {echo '<p class="message">' . "MESSAGE: ". $message . "</p>";} ?>
<div class="container mlogin">
    <div id="login">
        <h1 class="ru" lang="ru">Вход</h1><h1 class="en" lang="en">Enter</h1>
        <form action="" id="loginform" method="post"name="loginform">
            <p><label for="user_login"><div class="ru" lang="ru">Логин</div><div class="en" lang="en">Login</div>
                    <input class="input" id="userlogin" name="userlogin"size="20"
                           type="text" value=""></label></p>
            <p><label for="user_pass"><div class="ru" lang="ru">Пароль</div><div class="en" lang="en">Password</div>
                    <input class="input" id="password" name="password"size="20"
                           type="password" value=""></label></p>
            <div class="ru" lang="ru"><p class="submit"><input class="button" name="login"type= "submit" value="Войти"></p></div><div class="en" lang="en"><p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p></div>
            <div class="ru" lang="ru"><p class="regtext">Еще не зарегистрированы?<a href= "reg.php">Регистрация</a>!</p></div><div class="en" lang="en"><p class="regtext">Not registered yet?<a href= "reg.php">Registration</a>!</p></div>
        </form>
    </div>
</div>
<!-- библиотеки для переключения языка -->
<script src="JS/lang.js"></script>
</body>
</html>