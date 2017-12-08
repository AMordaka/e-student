    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">


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
                        echo "<td>$u->academyName</td>";
                        echo "<td>$u->street $u->number $u->postCode $u->city</td>";
                        echo "<td>$u->year</td>";
                        if(isset($_SESSION['name']) && isset($_SESSION['surname']) && $_SESSION['roleId'] == 1) {
                            echo "<form role=\"form\" method=\"post\" action='uczelnie\deleteAcademyForm'>
                                    <td><input type='hidden' name='id' value='$u->academyId'> 
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
                    echo"<a href=\"#\" class='btn btn-primary' data-toggle=\"modal\" data-target=\"#dodajuczelnie\">Dodaj Uczelnie!</a>";
                }
                ?>
            </div>
            <div class="modal fade" id="dodajuczelnie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="loginmodal-container">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                    <h1>Dodaj Uczelnie!</h1><br>
                    <form role="form" method="post" action="<?php echo site_url('uczelnie/addAcademyForm');?>">
                        <input type="text" name="name" placeholder="Nazwa Uczelni">
                        <input type="text" name="street" placeholder="Ulica">
                        <input type="text" name="number" placeholder="Numer">
                        <input type="text" name="postCode" pattern="[0-9]{2}[\-]{1}[0-9]{3}" placeholder="Kod Pocztowy">
                        <input type="text" name="city" placeholder="Miasto">
                        <input type="text" name="year" pattern="[0-9]{4}" placeholder="Rok Założenia">

                        <input type="submit" name="login" class="login loginmodal-submit" value="Dodaj Uczelnie">
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
