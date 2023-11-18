
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let mensaje=JSON.parse(this.responseText);
            document.getElementById("demo").innerHTML ="Hola "+mensaje.name;
          }
        };
        xhttp.open("POST", "devuelveinfo.php", true);
        document.getElementById("demo").innerHTML="CARGANDO"
        xhttp.send();
      }


  