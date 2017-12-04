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