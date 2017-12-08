<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="loginmodal-container">

        <h1>Zaloguj się!</h1>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form role="form" method="post" action="<?php echo site_url('zaloguj/login');?>">
                        <select name="role" data-live-search="true" required>
                            <option value="" disabled selected>Wybierz rolę</option>
                            <option value="2">Student</option>
                            <option value="3">Wykładowca</option>
                        </select>
                        <input type="text" name="user" pattern="[0-9]{1,}" title="Proszę podać tylko cyfry" placeholder="Indeks">
                        <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Hasło musi zawierać jedną mała literę, jedną dużą jedną cyfrę i minimum 8 znaków" placeholder="Hasło">
                        <input type="submit" name="login" class="login loginmodal-submit" value="Zaloguj się!">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>