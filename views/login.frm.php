<?php include_once "header.php"; ?>
<form action="">
    <div class="row d-flex justify-content-center mt-3">
            <div class="col-3">
                <label class="form-label">Correo: </label>
                <input class="form-control" type="email" name="txtCorreoLogin" id="txtCorreoLogin">
            </div>
            <div class="col-3">
                <label class="form-label">Password: </label>
                <input class="form-control" type="text" name="txtPasswordLogin" id="txtPasswordLogin">
            </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
            <div class="">
                    <a onclick="login()" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Iniciar</a>
            </div>
    </div>
</form>
    
<?php include_once "footer.php"; ?>
<script src="./assets/js/login.js"></script>