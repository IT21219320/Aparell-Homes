//Show/Hide Password
function show(pId, imgId){
    let type = document.getElementById(pId).type;

    if(type == 'password'){
        document.getElementById(pId).type = "text";
        document.getElementById(imgId).src = "images/hide.png";
    }
    if(type == 'text'){
        document.getElementById(pId).type = "password";
        document.getElementById(imgId).src = "images/show.png";
    }
}

//Check if passwords match
var regForm = document.getElementById("regForm");
regForm.addEventListener('submit', function (event) {
    event.preventDefault();

    var pwd = document.getElementById('pwd').value;
    var confirmPwd = document.getElementById('cPwd').value;

    if(pwd == confirmPwd){
        regForm.submit();
    }
    else{
        alert("Passwords do not Match!");
    }

});

//Enable submit button when terms and conditions checkbox is checked
function enableButton(){
    let chk = document.getElementById("terms");
    if(chk.checked){
        document.getElementById("submit").disabled = false;
    }
    else{
        document.getElementById("submit").disabled = true;}
}

