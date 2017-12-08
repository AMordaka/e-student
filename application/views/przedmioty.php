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
                        if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 1) {
                            echo "<form role=\"form\" method=\"post\" action='przedmioty\deleteSubject'>
                                    <td><input type='hidden' name='id' value='$subject->subjectId'> 
                                    <input class='btn-secondary' type=\"submit\" name=\"wystawOcene\" value=\"Usuń\">
                                    </form></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <?php
                if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 1){
                    echo"<a href=\"#\" class='btn btn-primary' data-toggle=\"modal\" data-target=\"#dodajPrzedmiot\">Dodaj Przedmiot!</a>";
                    echo"<a href=\"#\" class='btn btn-primary' data-toggle=\"modal\" data-target=\"#przypiszPrzedmiot\">Przypisz Przedmiot!</a>";
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

            <div class="modal fade" id="przypiszPrzedmiot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="loginmodal-container">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>Przypisz Przedmiot!</h1><br>
                                <form role="form" method="post" action="<?php echo site_url('Przedmioty/addSubjectToStudent');?>">
                                    <select name="subject" data-live-search="true" required>
                                        <option value="" disabled selected>Wybierz Przedmiot</option>
                                        <?php

                                        foreach($subjects as $subject)
                                        {
                                            echo '<option value="'.$subject->subjectId.'">'.$subject->nameSubject.'</option>';

                                        }
                                        ?>
                                    </select>
                                    <select name="student" data-live-search="true" required>
                                        <option value="" disabled selected>Wybierz Studenta</option>
                                        <?php

                                        foreach($students as $student)
                                        {
                                            echo '<option value="'.$student->userId.'">'.$student->name.' '.$student->surname.'</option>';

                                        }
                                        ?>
                                    </select>
                                    <select name="teacher" data-live-search="true" required>
                                        <option value="" disabled selected>Wybierz Wykładowcę</option>
                                        <?php

                                        foreach($teachers as $teacher)
                                        {
                                            echo '<option value="'.$teacher->teacherId.'">'.$teacher->name.' '.$teacher->surname.'</option>';

                                        }
                                        ?>
                                    </select>
                                    <input type="submit" name="login" class="login loginmodal-submit" value="Przypisz przedmiot">
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
 