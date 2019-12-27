<?php
session_start();
if(!isset($_SESSION["session_login"])):
    header("location:index.php");
else:
    ?>



    <?php include("includes/header.php"); ?>
    <div id="welcome">
        <h2><span class="ru" lang="ru">Добро пожаловать</span><span class="en" lang="en">Welcome</span>, <span><?php echo $_SESSION['session_login'];?>! </span></h2>
        <p ><em class="ru" lang="ru">Ваша почта: </em><em class="en" lang="en">Your Email: </em><span><?php echo $_SESSION['session_email'];?>! </span></p>
        <p><em class="ru" lang="ru">Ваше имя: </em><em class="en" lang="en">Your name: </em><span><?php echo $_SESSION['session_name'];?>! </span></p>
        <p><em class="ru" lang="ru">Ваша фамилия: </em><em class="en" lang="en">Your subname: </em><span><?php echo $_SESSION['session_subname'];?>! </span></p>
        <p><em class="ru" lang="ru">Ваше отчество: </em><em class="en" lang="en">Your patronymic: </em><span><?php echo $_SESSION['session_patronymic'];?>! </span></p>
        <p><em class="ru" lang="ru">Ваше изображение: </em><em class="en" lang="en">Your image: </em><br><span> <img src= "<?php echo $_SESSION['session_picturepath'];?>/<?php echo $_SESSION['session_login'].$_SESSION['session_picturetype'];?>" width="75%" height="auto" class="center-img" ><span class="ru" lang="ru" > <?php if($_SESSION['session_picturetype']=="") echo"Вы не загрузили изображение";?></span><span class="en" lang="en"> <?php if($_SESSION['session_picturetype']=="") echo"You did not downloaded picture";?></span> </span></p>

        <p><a href="exit.php"><span class="ru" lang="ru">Выйти из системы</span><span class="en" lang="en">Exit</span></a></p>
    </div>
    <script src="JS/lang.js"></script>
</body>
</html>
<?php endif; ?>