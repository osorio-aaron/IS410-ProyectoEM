//Intente hacer una peticion asíncrona para enviar los parametros con el archivo de imagen, pero en el index no me reconocia la peticion POST
/*
function registroEuser(){
    var formData = new FormData();
    var fileData = $('#txtImg').prop('files')[0];
    console.log(fileData);
    formData.append('companyName', document.getElementById('companyName').value);
    formData.append('companyEmail', document.getElementById('companyEmail').value);
    formData.append('img', fileData);
    formData.append('ubicacion', document.getElementById('ubicacion').value);
    formData.append('latitud', document.getElementById('latitud').value);
    formData.append('longitud', document.getElementById('longitud').value);
    formData.append('password', document.getElementById('password').value);
    console.log(formData);
    $.ajax({
        url:"../ajax/eUser",
        method:'POST',
        type:"POST",
        data:formData,
        dataType:'json',
        contentType:false,
        processData:false,
        cache:false,
        success:function(res) {
          console.log("Response: ", res.mensaje);
          alert('Se Agrego la empresa a la Base de Datos');
        },
        error: function(error) {
          console.error(error);
        }
    })
}*/