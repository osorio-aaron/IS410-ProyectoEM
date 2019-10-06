let codigo = generarCodigo(4);
let codigoTemp = codigo;
function verificarUsuario(){
    let email = document.getElementById('userEmail').value;
    let mail = new FormData();
    mail.append('correo', email);
    mail.append('codigo',codigoTemp);
    let password = document.getElementById('userPassword').value;
    let passwordConfirm = document.getElementById('passwordConfirm').value;
    if(password == passwordConfirm && password!=""){
        $.ajax({
            url:"ajax/user/email/",
            method: 'POST',
            data: mail,
            processData: false,
            contentType: false,
            dataType: 'json',
            success:function(res){
                console.log(res);
                $('#btn-registrar').hide();
                $('#input-verificar').show();
                $('#btn-verificar').show();
            },
            error:function(error){
                console.error(error);
            }
        });
    }
    else{
        alert("La confirmacion de Contraseñas es errónea o tiene campos vacíos")
        limpiarCampos();
    }
}
function registrarUsuario(){
    let verificacion = document.getElementById('input-verificar').value;
    if(verificacion == codigoTemp){
        alert('Codigo Correcto');    
        let parametros = $('#user-info').serialize();
        console.log("Información que se envia a Firebase: " + parametros);
        $.ajax({
            url:'ajax/user/',
            method:'POST',
            data:parametros,
            dataType:'json',
            success:function(res){
                console.log(res);
                alert('Usuario agregado a la base de datos');
            },
            error:function(error){
                console.error(error)
            }
        })
    }else
        alert('Codigo Incorrecto');
        limpiarCampos();
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
 function limpiarCampos(){
    document.getElementById('firstName').value = "";
    document.getElementById('lastName').value = "";
    document.getElementById('userEmail').value = "";
    document.getElementById('userPassword').value = "";
    document.getElementById('passwordConfirm').value = "";
 }
 