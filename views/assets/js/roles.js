function create() {
    let data = `txtRol=${document.getElementById("txtRol").value}`;

    let option = {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data,
    };

    let url = "../controllers/roles.create.php";

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
    let url = "../controllers/roles.read.php";
    fetch(url)
        .then(response => response.json())
        .then((data) => {
            let tabla = "";
            data.forEach((element, index) => {
                tabla += `<tr>`;
                tabla += `<th scope="row">${index + 1}</th>`;
                tabla += `<td>${element.nombreRol}</td>`;
                tabla += `<td><div onclick="estadoRol('${element.estado}','${element.id}')" class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="switch${element.nombreRol}">
            <label class="form-check-label" for="flexSwitchCheckDefault">${element.estado == 'A' ? 'Activo' : 'Inactivo'}</label>
          </div></td>`;
                tabla += `<td><a onclick="estadoUpdate(${element.id})" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateModal" title="Modificar"><i class="fa-solid fa-highlighter"></i></a>
                          <a onclick="estadoDelete(${element.id},'${element.nombreRol}')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Eliminar"><i class="fa-solid fa-delete-left"></i></a></td>`;
                tabla += `</tr>`;
            })
            document.getElementById("tableRol").innerHTML = tabla;
            actualizarEstado();
            alertify.warning("Roles Cargados")
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
                        columns: [0, 1, 2],
                      },   
                      className: "btn excelDataTable",     
                    },
                    {extend: 'pdf',
                     text: '<i class="fa-solid fa-file-pdf"></i>',   
                     titleAtr: "PDF",
                     exportOptions: {
                        columns: [0, 1, 2],
                      },   
                      className: "btn pdfDataTable",    
                      download: "open",    
                    },
                    { extend: 'print',
                      text: '<i class="fa-solid fa-print"></i>',  
                      titleAtr: "Imprimir",
                      exportOptions: {
                        columns: [0, 1, 2],
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
                        columns: [0, 1, 2],
                      },
                      className: "btn copyDataTable",     
                    },
                    
                ]
            });
        });
}
function update() {
    let id = localStorage.id;
    let nombreRol = document.getElementById("txtRolUpdate").value;

    const options = {
        method: "POST",
        body: `txtRol=${nombreRol}&id=${id}`,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    let url = "../controllers/roles.update.php";
    fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
            alertify.success(data);
            read();
        });
}
function deletes() {
    let url = "../controllers/roles.delete.php"
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

function estadoRol(estado, id) {
    let data = `id=${id}&estado=${estado}`;

    let option = {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data,
    }

    let url = "../controllers/roles.estado.php";

    fetch(url, option)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            read()
        });
}

function actualizarEstado() {
    const estados = document.getElementById("tableRol").getElementsByClassName("form-check-input");
    const labelEstado = document.getElementById("tableRol").getElementsByClassName("form-check-label");

    for (let i = 0; i < estados.length; i++) {
        if (labelEstado[i].innerHTML == "Activo") {
            estados[i].setAttribute("checked", "");
        }
    }

}
function estadoUpdate(id) {
    let url = `../controllers/roles.readid.php?id=${id}`;
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            document.getElementById("txtRolUpdate").value = data[0].nombreRol;
            localStorage.id = data[0].id
        });
}

function estadoDelete(id, nombreRol) {
    this.id = id;
    document.getElementById("textEliminar").innerHTML = `Esta seguro de eliminar el rol: ${nombreRol}?`;
}