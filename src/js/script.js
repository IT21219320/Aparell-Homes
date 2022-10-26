/*
//Change theme
var theme = localStorage.getItem("Light");
light(theme);

function light(val){
    if(val == 'OFF'){
        document.getElementById("stylesheet").href = "style/darkstyle.css";
        document.getElementById("logo").src = "images/Logo(dark).png";
        localStorage.setItem("Light","OFF");
    }
    else if(val == 'ON'){
        document.getElementById("stylesheet").href = "style/lightstyle.css";
        document.getElementById("logo").src = "images/Logo(light).png";
        localStorage.setItem("Light","ON");
    }
}
*/

//show profile menu
function showDpNav(){
    document.getElementById("dpNav").style.display = "block";
}
//hide profile menu
function hideDpNav(){
    document.getElementById("dpNav").style.display = "none";
}
