(()=>{
    $.ajax({
        url:'ajax/user/?accion=verificar',
        dataType:'json',
        success:(res)=>{
            if (res.valor == 'valido')
                llenarPerfil(res.infoUser);
            else
                console.log(res.valor);
        },
        error:(error)=>{
            console.error(error);
        }
    });
})();
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
    document.getElementById('user-password').value = "";
    document.getElementById('user-email').value = "";
}
function llenarPerfil(perfil){
    $('#btnUser').empty();
    $('#btnUser').addClass('dropdown')
    $('#btnUser').append(`
    <a class="far fa-user icon navbar-brand" data-display="static" data-toggle="dropdown" aria-expanded="false"></a>
    <div class="dropdown-menu dropdown-menu-lg-right">
        <h5 class="dropdown-header"> Hola ${perfil.firstName}</h5>
        <a class="dropdown-item" href="#">Editar Perfil</a>
        <a id="logout" onclick="logout()" class="dropdown-item" href="#">Cerrar Sesión</a>
    </div>
    `)
}

function logout(){
    let mensaje = confirm('¿Desea Cerrar Sesión?');
    window.location.href = "ajax/user/?accion=limpiarCookies";
}