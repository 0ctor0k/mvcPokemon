function login(){
    let data = `correo=${txtCorreoLogin.value}&password=${txtPasswordLogin.value}`;
    let url = "../controllers/login.php?" + data;
    fetch(url)
    .then((response) => response.json())
    .then((data) => {
        console.log(data)
        try {
            if ((data[0].correo === txtCorreoLogin.value)) {
                window.location.href = "roles.frm.php";
            }
        } catch (error) {
            alert("Usuario o Password incorrectos");
        }
    })
}