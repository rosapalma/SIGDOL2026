<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>PRUEBA</title>
</head>
<body>
    <select id="tipo" name="tipo">
        <option value="">Tipo de Constancia.</option>
        <option value="1">Básica</option>
        <option value="2">Con Sueldo Base</option>
        <option value="3">Con Sueldo Integral</option>
        <option value="4">Para Jubilado(a) || Pensionado</option>
        <option value="5">Para Sobreviviente</option>
    </select>

    <input type="checkbox" id="miCheckbox" name="sobreviviente"> Constancia para sobreviviente
    
    <input type="text" id="miInputOculto" name="beneficiario" style="display:none;" placeholder="Cedula de Beneficiario" >

        

    </body>
</html>


<script>
    //USANDO EL SELECT
    //inputOculto.style.display = 'none'; // Ocultar
    const select = document.getElementById("tipo");
    console.log(tipo);
    select.addEventListener("change", function() {
        const valor= this.value;
        if (valor == 5){
            inputOculto.style.display = 'block'; // Mostrar
            //alert("valor =" +valor);
        }
        
    });


  // CHECKBOX
  const checkbox = document.getElementById('miCheckbox');
  const inputOculto = document.getElementById('miInputOculto');

  checkbox.addEventListener('change', function() {
    if (this.checked) {
      inputOculto.style.display = 'block'; // Mostrar
    } else {
      inputOculto.style.display = 'none'; // Ocultar
    }
  });
</script>
