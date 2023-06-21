function create() {
    let data = `txtNombre=${document.getElementById("txtNombre").value}&txtPrecio=${document.getElementById("txtPrecio").value}&txtCantidad=${document.getElementById("txtCantidad").value}&txtDescripcion=${document.getElementById("txtDescripcion").value}`;

    let option = {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data,
    };

    let url = "../controllers/producto.create.php";

    fetch(url, option)
        .then((response) => response.json())
        .then((data) => {
            alertify.success(data);
            read();
        })
        .catch((err) => {
            alertify.error(err);
        });
}
function read() {
    let url = "../controllers/producto.read.php";
    fetch(url)
        .then(response => response.json())
        .then((data) => {
            let tabla = "";
            data.forEach((element, index) => {
                tabla += `<tr>`;
                tabla += `<th scope="row">${index + 1}</th>`;
                tabla += `<td>${element.nombrePro}</td>`;
                tabla += `<td>${element.precioPro}</td>`;
                tabla += `<td>${element.contidadPro}</td>`;
                tabla += `<td>${element.descripPro}</td>`;
                tabla += `<td><div onclick="estadoProd('${element.estado}','${element.id}')" class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="switch${element.nombrePro}">
            <label class="form-check-label" for="flexSwitchCheckDefault">${element.estado == 'A' ? 'Activo' : 'Inactivo'}</label>
          </div></td>`;
                tabla += `<td><a onclick="estadoUpdate(${element.id})" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateModal" title="Modificar"><i class="fa-solid fa-highlighter"></i></a>
                          <a onclick="estadoDelete(${element.id},'${element.nombrePro}')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Eliminar"><i class="fa-solid fa-delete-left"></i></a></td>`;
                tabla += `</tr>`;
            })
            document.getElementById("tableProducto").innerHTML = tabla;
            actualizarEstado();
            alertify.warning("productos Cargados")
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

function update() {
    let id = localStorage.id;
    let nombrePro = document.getElementById("txtProductoUpdate").value;
    let precioPro = document.getElementById("txtPrecioUpdate").value;
    let contidadPro = document.getElementById("txtCantidadUpdate").value;
    let descripPro = document.getElementById("txtDescripcionUpdate").value;

    const options = {
        method: "POST",
        body: `id=${id}&txtNombre=${nombrePro}&txtPrecio=${precioPro}&txtCantidad=${contidadPro}&txtDescripcion=${descripPro}`,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    let url = "../controllers/producto.update.php";
    fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
            alertify.success(data);
            read();
        });
}
function deletes() {
    let url = "../controllers/producto.delete.php"
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

read();

function estadoProd(estado, id) {
    let data = `id=${id}&estado=${estado}`;

    let option = {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data,
    }

    let url = "../controllers/producto.estado.php";

    fetch(url, option)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            read()
        });
}

function actualizarEstado() {
    const estados = document.getElementById("tableProducto").getElementsByClassName("form-check-input");
    const labelEstado = document.getElementById("tableProducto").getElementsByClassName("form-check-label");

    for (let i = 0; i < estados.length; i++) {
        if (labelEstado[i].innerHTML == "Activo") {
            estados[i].setAttribute("checked", "");
        }
    }

}
function estadoUpdate(id) {
    let url = `../controllers/producto.readid.php?id=${id}`;
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            document.getElementById("txtProductoUpdate").value = data[0].nombrePro;
            document.getElementById("txtPrecioUpdate").value = data[0].precioPro;
            document.getElementById("txtCantidadUpdate").value = data[0].contidadPro;
            document.getElementById("txtDescripcionUpdate").value = data[0].descripPro;
            localStorage.id = data[0].id
        });
}

function estadoDelete(id, nombrePro) {
    this.id = id;
    document.getElementById("eliminarProd").innerHTML = `Esta seguro de eliminar el producto: ${nombrePro}?`;
}