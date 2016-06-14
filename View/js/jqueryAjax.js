
$(document).ready(function () {
 
 $('#search').keyup(function(){
   var name = $(this).val();
   $.post('busqueda.php', {name:name}, function(data){
      
       
   });
     
     
 });
    

 });

//// borrar   _  Confirmation 
function borrar(isbn) {

    $("#dialog-confirm").dialog({
        resizable: false,
        height: 140,
        modal: true,
        buttons: {
            "Delete": function () {
                console.log(isbn);
                $.ajax({
                    type: "POST",
                    url: "../Controller/borrarLibro.php",
                    data: "isbn=" + isbn,
                    success: function (data) {
                        $(".container").html(data);
                    }
                });
                $(this).dialog("close");
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        }


    });
    
    }
    //// borrar   _  Confirmation 
function borra(idCritica) {

    $("#dialog-confi").dialog({
        resizable: false,
        height: 140,
        modal: true,
        buttons: {
            "Delete": function () {
                console.log(idCritica);
                $.ajax({
                    type: "POST",
                    url: "../Controller/borrarComentario.php",
                    data: "idCritica=" + idCritica,
                    success: function (data) {
                        $(".container").html(data);
                    }
                });
                $(this).dialog("close");
            },
            Cancel: function () {
                $(this).dialog("close");
              
            }
        }


    });
    
    }
    /*/
     * 
     */
      function eliminar(idEvento) {
               $("#dialog-coni").dialog({
                   resizable: false,
                   height: 200,
                   modal: true,
                   buttons: {
                       "Delete": function () {
                           console.log(idEvento);
                           $.ajax({
                               type: "POST",
                               url: "../Controller/borrarEvento.php",
                               data: "idEvento=" + idEvento,
                               success: function (data) {
                                    $(".container").html(data);
                                }
                            });
                            $(this).dialog("close");
                        },
                        Cancel: function () {
                            $(this).dialog("close");

                        }
                    }


                });
            };
            
            
    
 /* more / back */
$(function () {

    $('.descripcion').each(function (event) { 
        var max_length = 200; 
        if ($(this).html().length > max_length) { /* check for content length */
            var short_content = $(this).html().substr(0, max_length); /* split the content in two parts */
            var long_content = $(this).html().substr(max_length);
            
            $(this).html(short_content +
                    '<a href="#" class="read_more"><br/> Leer Mas ... </a>' +
                    '<span class="more_text" style="display:none;">' + long_content + '</span>'+ '<a href="#" class="back" style="display:none;"><br/>  Menos </a>');

            $(this).find('a.read_more').click(function (event) { 
                event.preventDefault(); /* prevent the a from changing the url */
                $(this).hide(); /* hide the read more button */
                $(this).parents('.descripcion').find('.more_text').show();
                $(this).parents('.descripcion').find('.back').show();
            });
            
            $(this).find('a.back').click(function (event) { 
                event.preventDefault(); /* prevent the a from changing the url */
                $(this).hide(); /* hide  button */
                $(this).parents('.descripcion').find('.more_text').hide(); 
                $(this).parents('.descripcion').find('a.read_more').show(); 
            });
        }

    });


});

/*  iniciar button / (not working)*/
    $("#iniciar a").on("click", function(){
        $(this).find('span').toggle();

    });
    

/* validation */

$.validate({
    modules: 'location, date, security, file'
});

// Restrict presentation length
$('#presentation').restrictLength($('#pres-max-length'));
 

/*  canvas  */
