
 
document.getElementById("nuevo").onclick = function() { 
    var x = document.getElementById("creacion");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  document.getElementById("salir").onclick = function() { 
    var x = document.getElementById("creacion");
    if (x.style.display === "block") {
      x.style.display = "none";
      document.getElementById("crea").reset()
    } else {
      x.style.display = "none";
    }
  }