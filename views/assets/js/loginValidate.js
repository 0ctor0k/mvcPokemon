function readLogin() {
    url = "../controllers/login.read.php";
    fetch(url)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        if(!data){
            window.location.href = "login.frm.php"
        }
    })
}
function deleteLogin(){
    let url = "../controllers/login.delete.php"
    fetch(url)
    .then((response) => response.json())
    .then((data) =>{
        console.log()
        if(!data){
            window.location.href = "login.frm.php"
        }
    })
}

window.onbeforeunload = function (e) {
    readLogin();
};