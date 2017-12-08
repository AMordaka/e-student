    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">



            <div class="container">
                <h2>Lista Twoich przedmiotów</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Przedmiot</th>
                        <th>Imie i Nazwisko studenta</th>
                        <th>Dodaj Ocene</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($dowystawienia as $d) {
                        echo "<tr>";
                        echo "<td>$d->gradeId</td>";
                        echo "<td>$d->nameSubject</td>";
                        echo "<td>$d->name $d->surname</td>";
                        echo "<form role=\"form\" method=\"post\" action='wystaw\wystawOcene'>
                                <td>
                                <div class='selectcustom'>
                                <select name=\"ocena\" data-live-search=\"true\" required>
                                    <option value=\"\" disabled selected>Wybierz ocenę</option>
                                    <option value=\"2\">2 - Dwa</option>
                                    <option value=\"3\">3 - Trzy</option>
                                    <option value=\"3.5\">3.5 - Trzy i pół</option>
                                    <option value=\"4\">4 - Cztery</option>
                                    <option value=\"4.5\">4.5 - Cztery i pół</option>
                                    <option value=\"5\">5 - Pięć</option>
                                </select>
                                <input type='hidden' name='id' value='$d->gradeId'> 
                                <input class='btn-secondary' type=\"submit\" name=\"wystawOcene\" value=\"Wystaw\">
                                </div>
                                </form>
                                </td>";
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

