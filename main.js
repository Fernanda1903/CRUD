$(document).ready(function() {
var id_empleado, opcion;
opcion = 4;
tablaEmpleados = $('#tablaEmpleados').DataTable({
	 "ajax":{
		"url": "crud.php",
		"method": 'POST',
		"data":{opcion:opcion},
		"dataSrc":""
	},
	"columns":[
	{"data": "id_empleado"},
	{"data": "nombre"},
	{"data": "apellido_paterno"},
	{"data": "apellido_materno"},
	{"data": "correo"},
	{"data": "telefono"},
	{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; 
$('#formEmpleados').submit(function(e){                         
    e.preventDefault();
    nombre = $.trim($('#nombre').val());    
    apellido_paterno = $.trim($('#apellido_paterno').val());
    apellido_materno = $.trim ($('#apellido_materno').val()); 
    correo = $.trim ($('#correo').val());
    telefono = $.trim ($('#telefono').val());                               
        $.ajax({
          url: "crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id_empleado:id_empleado, nombre:nombre, apellido_paterno:apellido_paterno, apellido_materno:apellido_materno, correo:correo, telefono:telefono, opcion:opcion},    
          success: function(data) {
            location.reload();
           }
        });			        
    $('#modalRegistro').modal('hide');											     			
});
        
$("#btnNuevo").click(function(){
    opcion = 1; //crear          
    id_empleado=null;
    $("#formEmpleados").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalRegistro').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    user_id = parseInt(fila.find('td:eq(0)').text());	            
    nombre = fila.find('td:eq(1)').text();
    apellido_paterno = fila.find('td:eq(2)').text();
    apellido_materno = fila.find('td:eq(3)').text();
    correo = fila.find('td:eq(4)').text();
    telefono = fila.find('td:eq(5)').text();
    $("#nombre").val(nombre);
    $("#apellido_paterno").val(apellido_paterno);
    $("#apellido_materno").val(apellido_materno);
    $("#correo").val(correo);
    $("#telefono").val(telefono);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalRegistro').modal('show');		   
});

$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_empleado = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;   
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id_empleado+"?");                
    if (respuesta) {            
        $.ajax({
          url: "crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_empleado:id_empleado},    
          success: function() {
              tablaEmpleados.row(fila.parents('tr')).remove().draw();                  
           }
        }); 
    }
 });
     
}); 



