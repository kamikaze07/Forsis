// prepare the form when the DOM is ready 
$(document).ready(function() { 
    var options = { 
        target:        '#resultado1',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse,  // post-submit callback 
 
        // other available options: 
        url:       'mail.php'         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true,        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   2000 
    }; 
 
    // bind to the form's submit event 
    $('#formulario-de-contacto').submit(function(e) { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        e.preventDefault();
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    var form = jqForm[0]; 
    /*if (!form.name.value || !form.email.value || !form.phone.value || !form.subject.value || !form.sucursal.value || !form.equipo.value || !form.equipo.value || !form.servicio.value || !form.message.value) { 
        //alert('Porfavor ingrese los datos Requeridos');
        $.notify("Porfavor Introduzca Todos los Campos Requeridos", "error"); 
        return false;
    }*/
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue
    /*var name = $('input[name=name]').fieldValue(); 
    var email = $('input[name=email]').fieldValue();
    var telefono = $('input[name=phone]').fieldValue();
    var asunto = $('input[name=subject]').fieldValue();
    var sucursal = $('select[name=sucursal]').fieldValue();
    var equipo = $('select[name=equipo]').fieldValue();
    var servicio = $('select[name=servicio]').fieldValue();
    var mensaje = $('input[name=message]').fieldValue();
    if (!name[0] || !email[0] || !telefono[0] || !asunto[0] || !sucursal[0] || !equipo[0] || !servicio[0] || !mensaje[0]) { 
        alert('error'); 
        return false; 
    } 
    return true; */

    for (var i=0; i < formData.length; i++) { 
        if (!formData[i].value) { 
            //alert('error');
            $.notify("Porfavor Llene todos los campos Requeridos", "error"); 
            return false; 
        } 
    }
    $.notify("Enviando Mensaje por favor no cierre o salga de la pagina", "info");
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
      //  '\n\nThe output div should have already been updated with the responseText.');
      $.notify("Mensaje Enviado Correctamente", "success");  
      $('#ModalContacto').modal('show');
      //alert('enviado');
} 
$(document).ready(function(){
    $('#btn-modal').click(function(){
        $('#ModalContacto').modal('hide');
    });
    $('#ModalContacto').on('hidden.bs.modal',function(){
        var url = "index.html";
        $(location).attr('href',url);
    });
});