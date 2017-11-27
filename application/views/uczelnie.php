<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Student - Serwis dla studentów</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Menu
                </a>
            </li>
            <li>
                <?php
                if(isset($_SESSION['name']) && isset($_SESSION['surname'])){
                    echo"<li><a href=\"home\">Witaj ".$_SESSION['name']." !</a></li>";
                }

                ?>
            </li>
            <li>
                <a href="/student/home">Strona Główna</a>
            </li>
            <?php
            if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 2){
                echo"<li><a href=\"oceny\">Twoje Oceny</a></li>";
            }
            ?>
            <?php
            if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 3){
                echo"<li><a href=\"wystaw\">Wystaw Oceny</a></li>";
            }
            ?>
            <li>
                <a href="/student/uczelnie">Lista Uczelni</a>
            </li>
            <li>
                <a href="/student/kontakt">Kontakt</a>
            </li>
            <?php
            if(isset($_SESSION['name']) || isset($_SESSION['user']) )
            {
                echo"<li><a href=\"zaloguj\logout\">Wyloguj się!</a></li>";
            }
            else
            {
                echo"<li><a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\">Zaloguj się!</a></li>";
            }
            ?>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="loginmodal-container">
                    <h1>Zaloguj się!</h1><br>
                    <form role="form" method="post" action="<?php echo site_url('zaloguj/login');?>">
                        <input type="radio" name="role" value="2" checked>Student
                        <input type="radio" name="role" value="3">Wykładowca
                        <input type="text" name="user" placeholder="Indeks">
                        <input type="password" name="password" placeholder="Hasło">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>
                </div>
            </div>
            <div class="container">
                <h2>Lista uczelni</h2>
                <p>Wszystkie uczelnie obsługiwane przez nasz serwis</p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nazwa uczelni</th>
                        <th>Adres</th>
                        <th>Rok Założenia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($uczelnie as $u) {
                        echo "<tr>";
                        echo "<td>$u->name</td>";
                        echo "<td>$u->street $u->number $u->postCode $u->city</td>";
                        echo "<td>$u->year</td>";
                        echo "</tr>";
                    }

                    ?>
                    </tbody>
                </table>
            </div>

            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Rozsuń menu</a>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
