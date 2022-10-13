function light(val){
    if(val == 'ON'){
        document.getElementById("dark").style.display = "none";
        document.getElementById("light").style.display = "inherit";
        
        
        document.getElementById("stylesheet").href = "style/darkstyle.css";
    }
    else if(val == 'OFF'){
        document.getElementById("light").style.display = "none";
        document.getElementById("dark").style.display = "inherit";
        
        
        document.getElementById("stylesheet").href = "style/lightstyle.css";
    }
}