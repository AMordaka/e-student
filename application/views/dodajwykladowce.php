    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">



            <div class="container">
                <h2>Lista Wykładowców</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Uczelnia</th>
                        <th>Wydział</th>
                        <th>Stopień Naukowy</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>Adres</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($users as $u) {
                        echo "<tr>";
                        echo "<td>$u->academyName</td>";
                        echo "<td>$u->nameDepartment</td>";
                        echo "<td>$u->title</td>";
                        echo "<td>$u->name</td>";
                        echo "<td>$u->surname</td>";
                        echo "<td>$u->street $u->number $u->postCode $u->city</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <?php
                if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 1){
                    echo"<a href=\"#\" class='btn btn-primary' data-toggle=\"modal\" data-target=\"#dodajwykladowce\">Dodaj Wykładowce!</a>";
                }
                ?>
            </div>



            <div class="modal fade" id="dodajwykladowce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="loginmodal-container">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h1>Dodaj Wykładowce!</h1><br>
                                <form role="form" method="post" action="<?php echo site_url('DodajWykladowce/addUser');?>">
                                    <select name="title" data-live-search="true" required>
                                        <option value="" disabled selected>Wybierz Stopień</option>
                                        <option value="Inżynier">Inżynier</option>
                                        <option value="Magister">Magister</option>
                                        <option value="Doktor">Doktor</option>
                                        <option value="Docent">Docent</option>
                                        <option value="Profesor">Profesor</option>
                                    </select>
                                    <select name="departmentId" data-live-search="true" required>
                                        <option value="" disabled selected>Wybierz Wydział</option>
                                        <?php

                                        foreach($departments as $department)
                                        {
                                            echo '<option value="'.$department->departmentId.'">'.$department->nameDepartment.'</option>';

                                        }
                                        ?>
                                    </select>
                                    <input type="text" name="name" placeholder="Imie">
                                    <input type="text" name="surname" placeholder="Nazwisko">
                                    <input type="text" name="street" placeholder="Ulica">
                                    <input type="text" name="number" placeholder="Numer">
                                    <input type="text" name="postCode" pattern="[0-9]{2}[\-]{1}[0-9]{3}" placeholder="Kod Pocztowy">
                                    <input type="text" name="city" placeholder="Miasto">


                                    <input type="submit" name="login" class="login loginmodal-submit" value="Dodaj Studenta">
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
 