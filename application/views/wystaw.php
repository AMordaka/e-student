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
                                <td><input type=\"text\" name=\"ocena\" pattern='[2-5]{1}' placeholder=\"Ocena\">
                                <input type='hidden' name='id' value='$d->gradeId'> 
                                <input type=\"submit\" name=\"wystawOcene\" value=\"Wystaw\">
                                </form></td>";
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
