$(document).ready(function(){
    // console.log(url)
    mostrarEstudiantes()

    function mostrarEstudiantes(){
        $.ajax({
            type : 'POST',
            url : url+'estudiante/mostrarEstudiantes',
            success : function(response){
                $("#estudiantes tbody").html(response)
            }, 
            error : function(){
                console.log('error ajax')
            }
        })
    }
    // Agregar
    $("#btnAdd").click(function(e){
        e.preventDefault()
        var form = $("#frmEstudiantes")
        var method = form.attr('method')
        var action = form.attr('action')
        var data = form.serialize()
        $.ajax({
            type : method,
            url : action,
            data : data,
            success: function(response){
                // console.log(response)
                var mensaje = (response)?'Estudiante insertado':'Error al insertar al estudiante';
                alert(mensaje)
                form[0].reset()
            },
            error: function(){
                console.log('ERROR')
            }
        })
    })

    // Modificar
    $("#btnModificar").click(function(e){
        e.preventDefault()
        var form = $('#frmEstudiante')
        var method = form.attr('method')
        var action = form.attr('action')
        var data = form.serialize()
        $.ajax({
            type : method,
            url : action,
            data : data,
            success : function(response){
                var mensaje = (response)?'Estudiante modificado':'Error al modificar estudiante';
                alert(mensaje)
                console.log(response)
            },
            error : function(){
                console.log('ERROR')
            }
        })
    })

    
    $('body').on('click', '#btnEliminar', function(e){
        e.preventDefault()
        var href = $(this).attr('href')
        $.ajax({
            type : 'GET',
            url : href,
            success : function(response){
                console.log(response)
                var mensaje = (response)?'Pasajero eliminado':'Error al eliminar pasajero';
                alert(mensaje)
                mostrarProductos()
            },
            error : function(){
                console.log('ERROR')
            }
        })
    })
})