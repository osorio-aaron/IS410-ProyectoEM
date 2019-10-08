function loginUser(){
    let parametros = $('#user-login').serialize();
    console.log('Login: ' + parametros);
    $.ajax({
        url:'ajax/user/index.php?accion=login',
        method:'POST',
        data:parametros,
        dataType:'json',
        success:function(res){
            console.log(res);
            if(res.valido)
            window.location.href = "index.php";   
        },
        error:function(error){
            console.error(error);
            alert('Usuario o Contraseña Incorrecto')
        }
    })
}