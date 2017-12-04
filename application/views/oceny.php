    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">


            <div class="container">
                <h2>Lista Twoich przedmiotów</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Przedmiot</th>
                        <th>Imie i Nazwisko prowadzącego</th>
                        <th>Ocena</th>
                        <th>Data Wpisu</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($oceny as $o) {
                        echo "<tr>";
                        echo "<td>$o->nameSubject</td>";
                        echo "<td>$o->name $o->surname</td>";
                        echo "<td>$o->grade</td>";
                        echo "<td>$o->date</td>";
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
