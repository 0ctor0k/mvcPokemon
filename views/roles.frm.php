<?php include_once "header.php"; ?>
<form id="rolesFrm">
    <div class="row my-5">
        <div class="col-12">
            <h1 class="text-center">Formulario Roles</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-end">
        <div class="col-6">
            <label class="form-label">Nombre del Rol: </label>
            <input class="form-control" type="text" name="txtRol" id="txtRol">
        </div>
        <div class="col-3 d-flex align-self-end">
            <a onclick="create()" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Registrar</a>
        </div>
    </div>
    <div class="row">
        <h1 class="mt-5 mb-3 py-1 text-center bg-dark text-white">Roles</h1>
        <div class="col-12">
            <table class="table table-hover table-dark text-white" id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tableRol">
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
                        <h1 class="modal-title fs-5 col-11 text-center ms-4" id="updateModal">Modificar Rol</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Nombre del Rol: </label>
                                <input class="form-control" type="text" name="txtRolUpdate" id="txtRolUpdate">
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
                        <h1 class="modal-title fs-5 col-11 text-center ms-4" id="deleteModal">Eliminar Rol</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 id="textEliminar" class="text-center fw-bold"></h4>
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
<script src="./assets/js/roles.js"></script>