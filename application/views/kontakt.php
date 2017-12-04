    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

            <section id="contact">
                <div class="container">
                    <div class="well well-sm">
                        <h3><strong>Skontaktuj się z nami!</strong></h3>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <iframe width="100%" height="340" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJl8MdW9k0GkcRmtGA0yzo_Gw&key=AIzaSyBtvCEoS1sFZUwi75UX3-zYSjqdagwoi8M" allowfullscreen></iframe>
                        </div>

                        <div class="col-md-5">
                            <h4><strong>Napisz do nas!</strong></h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="" value="" placeholder="Imie">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="" value="" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="" value="" placeholder="Telefon">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="" rows="3" placeholder="Wiadomość"></textarea>
                                </div>
                                <button class="btn btn-default" type="submit" name="button">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Wyslij!
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
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
