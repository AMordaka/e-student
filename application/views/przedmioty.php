    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">



            <div class="container">
                <h2>Lista przedmitów</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id przedmiotu</th>
                        <th>Nazwa przedmiotu</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($subjects as $subject) {
                        echo "<tr>";
                        echo "<td>$subject->subjectId</td>";
                        echo "<td>$subject->nameSubject</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <?php
                if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 1){
                    echo"<a href=\"#\" class=\"btn btn-third\" data-toggle=\"modal\" data-target=\"#dodajPrzedmiot\">Dodaj Przedmiot!</a>";
                }
                ?>
            </div>
            <div class="modal fade" id="dodajPrzedmiot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="loginmodal-container">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                    <h1>Dodaj Przedmiot!</h1><br>
                    <form role="form" method="post" action="<?php echo site_url('Przedmioty/addSubjectForm');?>">
                        <input type="text" name="nameSubject"  placeholder="Nazwa Przedmiotu">

                        <input type="submit" name="login" class="login loginmodal-submit" value="Dodaj Przedmiot">
                    </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Rozsuń menu</a>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
 