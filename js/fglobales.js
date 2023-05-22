//---------------------------------------------------------
//------------- VALIDACION DE USUARIOS--------------------
//---------------------------------------------------------
    //------------- Usuarios -------------------
    //Datos del usuario
    USUnomb = document.getElementById("usuario");
    USUpass = document.getElementById("clave");

function ValidarUsuario (usuario, password)
{
    try
    {
        Aviso("CONSULTANDO");
        jQuery.ajax
        ({
            url: 'modulos/get-usuarios.php',
            type: 'POST',
            data: {
                    usuario_nomb:  usuario,
                    usuario_pass:  password
            },
            success: function (response)
            {
                try
                {
                    this.resultado = JSON.parse(response);
                    this.resultado.nombre
                    $("#popupmensaje").modal("hide");
                    window.location.href = 'modulos/validar.php';
                }
                catch
                {
                    Aviso("Usuario o contrasena");
                }
            }
        });
    }
    catch
    {
        Aviso("ERROR AL CARGAR", 'no se logro conectar a la base de datos');
    }
}
//---------------------------------------------------------
//------------- RECARGA UN SEGMENTO DEL HTML --------------
//---------------------------------------------------------
function recargar(id, ubicacion, condicion)
{
    this.condicion = condicion;
    this.ubicacion = ubicacion;
    jQuery.ajax
    ({
        url: ubicacion,
        type: 'POST',
        data: 
        {
            condicion:  this.condicion
        },
        success: function (response)
        {
            if (response != null)
            {
                document.getElementById(id).innerHTML = response;
            }
        }
    });
}
//---------------------------------------------------------
//------------------------- AVISOS ------------------------
//---------------------------------------------------------

function Aviso (opcion, error)
{
    this.icono = document.getElementById("aviso-icono");
    this.titulo = document.getElementById("aviso-titulo");
    this.mensaje = document.getElementById("aviso-mensaje");
    this.cerrar = document.getElementById("cerrar");

    this.cerrar.className = "btn btn-danger";
    this.cerrar.disabled = false;
    this.cerrar.innerHTML = "Cerrar";

    switch (opcion)
    {
        case "GUARDANDO":
            this.icono.className = "text-info";
            this.titulo.className = "d-inline text-primary";
            this.titulo.innerHTML = 'GUARDANDO';
            this.mensaje.innerHTML = "Guardando la informacion, por favor espere";
            this.cerrar.disabled = true;
            this.cerrar.className = "spinner-grow text-info";
            this.cerrar.innerHTML = '';
        break;
        case "CAMBIOS GUARDADOS":
            this.icono.className = "oi oi-circle-check text-success";
            this.titulo.className = "d-inline text-success";
            this.titulo.innerHTML = "CAMBIOS GUARDADOS";
            this.mensaje.innerHTML = "Se guardaron los cambios sin problemas!";            
        break;
        case "USUARIO CREADO":
            this.icono.className = "oi oi-circle-check text-success";
            this.titulo.className = "d-inline text-success";
            this.titulo.innerHTML = "USUARIO CREADO";
            this.mensaje.innerHTML = "Se creo el usuario sin problemas!";            
        break;
        case "CAMBIOS NO GUARDADOS":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "ERROR AL GUARDAR";
            this.mensaje.innerHTML = "No se pudieron guardar los cambios.";
        break;
        case "ERROR AL GUARDAR":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "ERROR AL GUARDAR";
            this.mensaje.innerHTML = "Se generaron errores al intentar guardar la informacion: " + "<b>" + error + "</b>";
        break;
        case "ERROR AL CARGAR":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "ERROR AL CONSULTAR";
            this.mensaje.innerHTML = "Se generaron errores al intentar consultar la informacion: " + "<b>" + error + "</b>";
        break;
        case "BORRANDO":
            this.icono.className = "oi oi-transfer text-primary";
            this.titulo.className = "d-inline text-primary";
            this.titulo.innerHTML = "BORRANDO";
            this.mensaje.innerHTML = "Borrando el registro, por favor espere";
            this.cerrar.disabled = true;
        break;
        case "REGISTRO ELIMINADO":
            this.icono.className = "oi oi-circle-check text-danger";
            this.titulo.className = "d-inline text-trash";
            this.titulo.innerHTML = "REGISTRO ELIMINADO";
            this.mensaje.innerHTML = "Se elimino el registro sin problemas!";            
        break;
        case "ERROR AL BORRAR":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "ERROR AL BORRAR";
            this.mensaje.innerHTML = "Se generaron errores al intentar borrar la informacion: " + "<b>" + error + "</b>";            
        break;
        case "Usuario o contrasena":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "Usuario O Clave Incorrecto";
            this.mensaje.innerHTML = "Verifique los datos ingresados";            
        break;
        case "Debe Autenticarse":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "Debe Autenticarse";
            this.mensaje.innerHTML = "Ingrese con usuario y contraseña";            
        break;
        case "Sin Permiso":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "Sin Permiso";
            this.mensaje.innerHTML = "No tiene permisos para usar esta aplicacion";            
        break;
        case "CONSULTANDO":
            this.icono.className = "";
            this.titulo.className = "d-inline text-success";
            this.titulo.innerHTML = 'CONSULTANDO';
            this.mensaje.innerHTML = "Consultando la informacion, por favor espere";
            this.cerrar.disabled = true;
            this.cerrar.className = "spinner-border text-success";
            this.cerrar.innerHTML = "";
        break;
        case "DUPLICADO":
            this.icono.className = "oi oi-circle-x text-danger";
            this.titulo.className = "d-inline text-danger";
            this.titulo.innerHTML = "DUPLICADO";
            this.mensaje.innerHTML = "No se puede guardar, ya se encuentra registrado";
        break;
    }
    $("#popupmensaje").modal("show");
}