document.getElementById("eye").addEventListener("click", function(e){
var pwd = document.getElementById("pwd");
if(pwd.getAttribute("type")=="password"){
pwd.setAttribute("type","text");
} else {
pwd.setAttribute("type","password");
}
});