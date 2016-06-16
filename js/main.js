$(document).ready(function() {   
    $("#formulario").validate({
        rules: {   
            email: { required: true, maxlength: 20 },
            email2: { required: true, maxlength: 20, equalTo: "#email" },
            clave: { required: true, minlength: 6, maxlength: 20 },
            clave2: { required: true, minlength: 6, maxlength: 20, equalTo: "#clave" },
            nombre: { required:true},
            apellidos: { required:true},
            direccion: { required:true},
            tipo: { required:true},
            activo: { required:true},
            fecha: { required:true},
        }, 
       
			
	});
	
	
});