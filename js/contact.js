// prepare the form when the DOM is ready 
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#formulario_de_contacto').ajaxSubmit( { beforeSubmit: validate } ); 
});

function validate(formData, jqForm, options) { 
    // formData is an array of objects representing the name and value of each field 
    // that will be sent to the server;  it takes the following form: 
    // 
    // [ 
    //     { name:  username, value: valueOfUsernameInput }, 
    //     { name:  password, value: valueOfPasswordInput } 
    // ] 
    // 
    // To validate, we can examine the contents of this array to see if the 
    // username and password fields have values.  If either value evaluates 
    // to false then we return false from this method. 
    for (var i=0; i < formData.length; i++) { 
        if (!formData[i].value) { 
            alert('error'); 
            return false; 
        } 
    }
    alert('Enviando'); 
}