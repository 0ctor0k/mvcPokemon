var id;
function readRol() {
    let url = "../controllers/roles.read.php";
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let opciones = "<option selected disabled>Seleccione</option>";
            data.forEach((element) => {
                opciones += `<option value="${element.id}">${element.nombreRol}</option>`
            });
            selRol.innerHTML = opciones;
            selRolUpdate.innerHTML = opciones;
        });
}
readRol();  

function create() {
    let tipo = selTipoDoc.value;
    let identificacion = txtnumDoc.value;
    let name = txtNombre.value;
    let ape = txtApellido.value;
    let corre = txtCorreo.value;
    let contra = txtPassword.value;
    let direc = txtDireccion.value;
    let tele = txtTelefono.value;
    let gene = selGenero.value;
    let rol = selRol.value;

    if (tipo === '' || identificacion === '' || name === '' || ape === '' || corre === '' || contra === '' || direc === '' || tele === ''
        || gene === '' || rol === '') {
        alertify.error("Por favor, completa todos los campos.");
        return;
    }

    let data = `selTipoDoc=${selTipoDoc.value}&txtnumDoc=${txtnumDoc.value}&txtNombre=${txtNombre.value}&txtApellido=${txtApellido.value}&txtCorreo=${txtCorreo.value}&txtPassword=${txtPassword.value}&txtDireccion=${txtDireccion.value}&txtTelefono=${txtTelefono.value}&selGenero=${selGenero.value}&selRol=${selRol.value}`;
    const options = {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data,
    };

    let url = "../controllers/usuario.create.php"

    fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            alertify.success(data);
            txtnumDoc.value = "";
            txtNombre.value = "";
            txtApellido.value = "";
            txtCorreo.value = "";
            txtDireccion.value = "";
            txtTelefono.value = "";
            txtPassword.value = "";
            selTipoDoc.selectedIndex = 0;
            selGenero.selectedIndex = 0;
            selRol.selectedIndex = 0;

            read();
        });
}

function read() {
    let url = "../controllers/usuario.read.php";
    fetch(url)
        .then(response => response.json())
        .then((data) => {
            let tabla = "";
            data.forEach((element, index) => {
                tabla += `<tr>`;
                tabla += `<th scope="row">${index + 1}</th>`;
                tabla += `<td>${element.tipoDoc}</td>`;
                tabla += `<td>${element.identificacion}</td>`;
                tabla += `<td>${element.nombre}</td>`;
                tabla += `<td>${element.apellido}</td>`;
                tabla += `<td><div onclick="estadoUsu('${element.estado}','${element.id}')" class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="switch${element.nombre}">
            <label class="form-check-label" for="flexSwitchCheckDefault">${element.estado == 'A' ? 'Activo' : 'Inactivo'}</label>
          </div></td>`;
                tabla += `<td><a onclick="estadoUpdate(${element.id})" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateModal" title="Modificar"><i class="fa-solid fa-highlighter"></i></a>
                          <a onclick="estadoDelete(${element.id},'${element.nombre}')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Eliminar"><i class="fa-solid fa-delete-left"></i></a></td>`;
                tabla += `</tr>`;
            })
            document.getElementById("tableUsuarios").innerHTML = tabla;
            actualizarEstado();
            alertify.warning("Usuarios Cargados")
            let table = new DataTable('#tabla', {
                retrieve: true,
                language: {
                    url: "./assets/es-Es.json",
                },
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'excel',
                      text: '<i class="fa-solid fa-file-excel"></i>',  
                      titleAtr: "Excel",
                      exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                      },   
                      className: "btn excelDataTable",     
                    },
                    {extend: 'pdf',
                     text: '<i class="fa-solid fa-file-pdf"></i>',   
                     titleAtr: "PDF",
                     exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                      },   
                      className: "btn pdfDataTable",    
                      download: "open",    
                    },
                    { extend: 'print',
                      text: '<i class="fa-solid fa-print"></i>',  
                      titleAtr: "Imprimir",
                      exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                      },   
                      className: "btn printDataTable",     
                    },
                    { extend: 'colvis',
                      text: '<i class="fa-solid fa-eye"></i>',  
                      titleAtr: "Filtrar",
                      className: "btn colvisDataTable",     
                    },
                    { extend: 'copy',
                      text: '<i class="fa-solid fa-copy"></i>',  
                      titleAtr: "Copiar",
                      exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                      },
                      className: "btn copyDataTable",     
                    },
                    
                ]
            });
        });
}
read()
function update() {
    let id = localStorage.id;
    let tipoDocumento = selTipoDocUpdate.value;
    let numIdentificacion = txtnumDocUpdate.value;
    let nombre = txtNombreUpdate.value;
    let apellido = txtApellidoUpdate.value;
    let correo = txtCorreoUpdate.value;
    let direccion = txtDireccionUpdate.value;
    let telefono = txtTelefonoUpdate.value;
    let genero = selGeneroUpdate.value;
    let idRol = selRolUpdate.value;
    let password = txtPasswordUpdate.value;

    const options = {
        method: "POST",
        body: `id=${id}&selTipoDoc=${tipoDocumento}&txtnumDoc=${numIdentificacion}&txtNombre=${nombre}&txtApellido=${apellido}&txtCorreo=${correo}&txtDireccion=${direccion}&txtTelefono=${telefono}&selGenero=${genero}&selRol=${idRol}&txtPassword=${password}`,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    let url = "../controllers/usuario.update.php";
    fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
            alertify.success(data);
            read();
        });
}
function deletes() {
    let url = "../controllers/usuario.delete.php"
    const options = {
        method: "POST",
        body: `id=${this.id}`,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
            alertify.error(data);
            read();
        });
}


function estadoUsu(estado, id) {
    let data = `id=${id}&estado=${estado}`;

    let option = {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data,
    }

    let url = "../controllers/usuario.estado.php";

    fetch(url, option)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            read()
        });
}

function actualizarEstado() {
    const estados = document.getElementById("tableUsuarios").getElementsByClassName("form-check-input");
    const labelEstado = document.getElementById("tableUsuarios").getElementsByClassName("form-check-label");

    for (let i = 0; i < estados.length; i++) {
        if (labelEstado[i].innerHTML == "Activo") {
            estados[i].setAttribute("checked", "");
        }
    }

}
function estadoUpdate(id) {
    let url = `../controllers/usuario.readid.php?id=${id}`;
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            document.getElementById("selTipoDocUpdate").value = data[0].tipoDoc;
            document.getElementById("txtnumDocUpdate").value = data[0].identificacion;
            document.getElementById("txtNombreUpdate").value = data[0].nombre;
            document.getElementById("txtApellidoUpdate").value = data[0].apellido;
            document.getElementById("txtCorreoUpdate").value = data[0].correo;
            document.getElementById("txtPasswordUpdate").value = data[0].password;
            document.getElementById("txtDireccionUpdate").value = data[0].direccion;
            document.getElementById("txtTelefonoUpdate").value = data[0].telefono;
            document.getElementById("selGeneroUpdate").value = data[0].genero;
            document.getElementById("selRolUpdate").value = data[0].idRol;
            localStorage.id = data[0].id
        });
}

function estadoDelete(id, nombre) {
    this.id = id;
    document.getElementById("eliminarUsu").innerHTML = `Esta seguro de eliminar el Usuario: ${nombre}?`;
}