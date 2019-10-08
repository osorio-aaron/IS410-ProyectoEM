let codigo = generarCodigo(8);
let codigoTemp = codigo;
var campos =[
    {campo:'firstName',valido:false},
    {campo:'lastName',valido:false},
    {campo:'userEmail',valido:false},
    {campo:'userPassword',valido:false},
    {campo:'passwordConfirm',valido:false}
];
function verificarUsuario(){
    for (let i=0;i<campos.length;i++)
        campos[i].valido = validarCampoVacio(campos[i].campo);
    if (document.getElementById('email')!=''){
        let resultadoEmail = validarEmail(document.getElementById('userEmail').value);
        campos[2].valido = resultadoEmail;
        marcarInput('userEmail',resultadoEmail);
        if (!resultadoEmail)
            document.getElementById('email-invalid-feedback').innerHTML = "Correo Inválido";    
    }
    for (let i=0;i<campos.length;i++)
        if (!campos[i].valido) return;
    

    let email = document.getElementById('userEmail').value;
    let mail = new FormData();
    mail.append('correo', email);
    mail.append('codigo',codigoTemp);
    let password = document.getElementById('userPassword').value;
    let passwordConfirm = document.getElementById('passwordConfirm').value;
    if(password == passwordConfirm){
        $.ajax({
            url:'ajax/user/?userEmail='+email,
            method:'GET',
            dataType:'json',
            success:function(res){
                console.log(res.mensaje);
                if (res.valor == 'true')
                    enviarEmail(mail);
                else
                    alert('Ya hay una cuenta vinculada con este correo');
                    limpiarCampos();
            },
            error:function(error){
                console.error(error);
            }
        })
    }
    else{
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
                window.location.href = "index.php"
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
    document.getElementById('input-verificar').value = "";
    $('#btn-registrar').show();
    $('#input-verificar').hide();
    $('#btn-verificar').hide();
 }
 function validarCampoVacio(id){
    let resultado = (document.getElementById(id).value=='')?false:true;
    marcarInput(id, resultado);
    return resultado;
}

function validarEmail(email){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function marcarInput(id,valido){
    if (valido){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
    } else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');        
    }
}
function enviarEmail(email){
    $.ajax({
        url:"ajax/user/email/",
        method: 'POST',
        data: email,
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
    limpiarCampos();
}