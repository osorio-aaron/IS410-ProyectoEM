let codigo = generarCodigo(4);
let codigoTemp = codigo;
function verificarUsuario(){
    let email = document.getElementById('userEmail').value;
    let parametros = new FormData();
    parametros.append('correo', email);
    parametros.append('codigo',codigoTemp);
    let password = document.getElementById('userPassword').value;
    let passwordConfirm = document.getElementById('passwordConfirm').value;
    console.log(parametros);
    console.log($('#user-info').serialize());
    if(password == passwordConfirm && password!=""){
        $.ajax({
            url:"ajax/user/email/",
            method: 'POST',
            data: parametros,
            processData: false,
            contentType: false,
            dataType: 'json',
            success:function(){
            },
            error:function(error){
                $('#btn-registrar').hide();
                $('#input-verificar').show();
                $('#btn-verificar').show();
            }
        });
    }
    else{
        alert("La confirmacion de Contraseñas es errónea o tiene campos vacíos")
        document.getElementById('firstName').value = "";
        document.getElementById('lastName').value = "";
        document.getElementById('userEmail').value = "";
        document.getElementById('userPassword').value = "";
        document.getElementById('passwordConfirm').value = "";

    }
}
function registrarUsuario(){
    let verificacion = document.getElementById('input-verificar').value;
    if(verificacion == codigoTemp)
    alert('Codigo Correcto');
}
function generarCodigo(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }
 