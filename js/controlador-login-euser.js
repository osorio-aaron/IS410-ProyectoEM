function loginEuser(){
    let parametros = $('#euserLogin').serialize();
    console.log('Login: ' + parametros);
    $.ajax({
        url:'../ajax/eUser/?accion=login',
        method:'POST',
        data:parametros,
        dataType:'json',
        success:function(res){
            console.log(res);
            if(res.valido)
                window.location.href = "admin-enterprise.php";
            else
                alert('Correo o Contraseña incorrectos');
                limpiarCampos();
        },
        error:function(error){
            console.error(error);
            alert('No se pudo enviar la información');
            limpiarCampos();
        }
    })
}
function limpiarCampos(){
    document.getElementById('password').value = "";
    document.getElementById('companyEmail').value = "";
}