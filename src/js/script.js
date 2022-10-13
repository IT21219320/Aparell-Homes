//Change theme
function light(val){
    if(val == 'ON'){
        document.getElementById("stylesheet").href = "style/darkstyle.css";
        document.getElementById("logo").src = "images/Logo(dark).png";
    }
    else if(val == 'OFF'){
        document.getElementById("stylesheet").href = "style/lightstyle.css";
        document.getElementById("logo").src = "images/Logo(light).png";
    }
}