<?php include_once "header.php"; ?>
<form id="rolesFrm">
    <div class="row my-5">
        <div class="col-12">
            <h1 class="text-center">Formulario Productos</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label class="form-label">Nombre: </label>
            <input class="form-control" type="text" name="txtNombre" id="txtNombre">
        </div>
        <div class="col-3">
            <label class="form-label">Precio: </label>
            <input class="form-control" type="number" name="txtPrecio" id="txtPrecio"> 
        </div>
        <div class="col-3">
            <label class="form-label">Cantidad: </label>
            <input class="form-control" type="number" name="txtCantidad" id="txtCantidad">
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-6">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" id="txtDescripcion" rows="3"></textarea>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <div class="">
                <a onclick="create()" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Registrar</a>
        </div>
    </div>

    <div class="row">
        <h1 class="mt-5 mb-3 py-1 text-center bg-dark text-white">Productos</h1>
        <div class="col-12">
            <table class="table table-hover table-dark text-white" id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="tableProducto">
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
                        <h1 class="modal-title fs-5 col-11 text-center ms-4" id="updateModal">Modificar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Nombre: </label>
                                <input class="form-control" type="text" name="txtProductoUpdate" id="txtProductoUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Precio: </label>
                                <input class="form-control" type="number" name="txtPrecioUpdate" id="txtPrecioUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Cantidad: </label>
                                <input class="form-control" type="number" name="txtCantidadUpdate" id="txtCantidadUpdate">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <label class="form-label">Descripción:</label>
                                <textarea class="form-control" id="txtDescripcionUpdate" rows="3"></textarea>
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
                        <h1 class="modal-title fs-5 col-11 text-center ms-4" id="deleteModal">Eliminar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 id="eliminarProd" class="text-center fw-bold"></h4>
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
<script src="./assets/js/productos.js"></script>