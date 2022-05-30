$(document).ready(function(){
    $("#btnAddN").click(function(e){
        e.preventDefault()
        var form = $("#frmNotas")
        console.log(form);
        var method = form.attr('method')
        var action = form.attr('action')
        var data = form.serialize()
        $.ajax({
            type : method,
            url : action,
            data : data,
            success: function(response){
                var mensaje = (response)?'Registro insertado':'Error al insertar al registrar';
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
        var form = $('#frmActualizar')
        var method = form.attr('method')
        var action = form.attr('action')
        var data = form.serialize()
        $.ajax({
            type : method,
            url : action,
            data : data,
            success : function(response){
                var mensaje = (response)?'Nota modificada':'Error al modificar nota';
                alert(mensaje)
                console.log(response)
            },
            error : function(){
                console.log('ERROR')
            }
        })
    })



 })