<?php include_once "header.php"; ?>
<form id="rolesFrm">
    <div class="row my-5">
        <div class="col-12">
            <h1 class="text-center">Formulario Usuarios</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
    <div class="col-3">
            <label class="form-label">Tipo Documento:</label>
            <select class="form-control" name="selTipoDoc" id="selTipoDoc">
                <option value="0" selected disabled>Seleccione</option>
                <option value="TI">TI</option>
                <option value="CC">CC</option>
                <option value="NUIP">NUIP</option>
                <option value="DNI">DNI</option>
            </select>
        </div>
        <div class="col-3">
            <label class="form-label">Número Documento: </label>
            <input class="form-control" type="number" name="txtnumDoc" id="txtnumDoc"> 
        </div>
        <div class="col-3">
            <label class="form-label">Nombre: </label>
            <input class="form-control" type="text" name="txtNombre" id="txtNombre">
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-3">
            <label class="form-label">Apellido: </label>
            <input class="form-control" type="text" name="txtApellido" id="txtApellido">
        </div>
        <div class="col-3">
            <label class="form-label">Correo: </label>
            <input class="form-control" type="email" name="txtCorreo" id="txtCorreo">
        </div>
        <div class="col-3">
            <label class="form-label">Dirección: </label>
            <input class="form-control" type="text" name="txtDireccion" id="txtDireccion">
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-3">
            <label class="form-label">Password:</label>
            <input type="password" class="form-control" name="txtPassword" id="txtPassword">
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-3">
            <label class="form-label">Telefono: </label>
            <input class="form-control" type="number" name="txtTelefono" id="txtTelefono">
        </div>
        <div class="col-3">
            <label class="form-label">Genero:</label>
                <select class="form-control" name="selGenero" id="selGenero">
                    <option value="0" selected disabled>Seleccione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
        </div>
        <div class="col-3">
            <label class="form-label">Rol:</label>
                <select name="selRol" id="selRol" class="form-control">
                    <option value="0" selected disabled>Seleccione</option>
                </select>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <div class="">
                <a onclick="create()" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Registrar</a>
        </div>
    </div>

    <div class="row">
        <h1 class="mt-5 mb-3 py-1 text-center bg-dark text-white">Usuarios</h1>
        <div class="col-12">
            <table class="table table-hover table-dark text-white" id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo Documento</th>
                        <th scope="col">Documentp</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tableUsuarios">
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">
    Launch demo modal
    </button> -->

        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-gradient bg-warning">
                        <h1 class="modal-title fs-5 col-11 text-center ms-4" id="updateModal">Modificar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Tipo Documento:</label>
                                    <select class="form-control" name="selTipoDocUpdate" id="selTipoDocUpdate">
                                        <option value="0" selected disabled>Seleccione</option>
                                        <option value="TI">TI</option>
                                        <option value="CC">CC</option>
                                        <option value="NUIP">NUIP</option>
                                        <option value="DNI">DNI</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Número Documento: </label>
                                <input class="form-control" type="number" name="txtnumDocUpdate" id="txtnumDocUpdate"> 
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Nombre: </label>
                                <input class="form-control" type="text" name="txtNombreUpdate" id="txtNombreUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Apellido: </label>
                                <input class="form-control" type="text" name="txtApellidoUpdate" id="txtApellidoUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Correo: </label>
                                <input class="form-control" type="email" name="txtCorreoUpdate" id="txtCorreoUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                                <div class="col-9">
                                <label class="form-label">Password:</label>
                                <input type="password" class="form-control" name="txtPasswordUpdate" id="txtPasswordUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Dirección: </label>
                                <input class="form-control" type="text" name="txtDireccionUpdate" id="txtDireccionUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Telefono: </label>
                                <input class="form-control" type="number" name="txtTelefonoUpdate" id="txtTelefonoUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Genero:</label>
                                <select class="form-control" name="selGeneroUpdate" id="selGeneroUpdate">
                                    <option value="0" selected disabled>Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Rol:</label>
                                <select name="selRolUpdate" id="selRolUpdate" class="form-control">
                                    <option value="0" selected disabled>Seleccione</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button onclick="update()" type="button" class="btn btn-warning" data-bs-dismiss="modal">Modificar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
    Launch demo modal
    </button> -->

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-gradient bg-danger">
                        <h1 class="modal-title fs-5 col-11 text-center ms-4" id="deleteModal">Eliminar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 id="eliminarUsu" class="text-center fw-bold"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button onclick="deletes()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
<?php include_once "footer.php"; ?>
<script src="./assets/js/usuarios.js"></script>