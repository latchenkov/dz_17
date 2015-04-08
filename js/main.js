$(function() {
// Вывод предупреждения о пустой базе
    $.getJSON('action.php?action=countads',
        function(response){
            if(response.quantity == 'empty'){
                $('#informer').informerWarning(response);
            }
        });
    
    function showResponse(response){
            // Изменение или добавление в таблицу        
            var id_add = response.id;
            var hasId=$('table#main tbody tr').is('tr[data-id='+id_add+']');
            if (hasId){
                $('table#main tr[data-id='+id_add+']').replaceWith(response.row);
            }
            else{
                $('table#main tbody').append(response.row);
            }
            $('#form').resetFormFull();
            if(response.status=='success'){
                $('#informer').informerSuccess(response);
            }
            else if(response.status=='error'){
                $('#informer').informerError (response);
            }
    }

// Функция очистки формы    
    $.fn.resetFormFull = function (){
        $('#submit').html('<strong>Добавить объявление</strong>');
        return this.resetForm().find('input:hidden').val('').end();
    };    
    
    $.fn.informerSuccess = function(response){
        return this.removeClass('alert-danger alert-warning').addClass('alert-success').
            find('#informer_text').html(response.message).end().
            fadeIn('slow').delay(1500).fadeOut('slow');
    };
    
    $.fn.informerError = function(response){
        return this.removeClass('alert-warning alert-success').addClass('alert-danger').
            find('#informer_text').html(response.message).end().
            fadeIn('slow').delay(1500).fadeOut('slow');
    };
    
    $.fn.informerWarning = function(response){
        return this.removeClass('alert-danger alert-success').addClass('alert-warning').
        find('#informer_text').html(response.warning).end().
        fadeIn('slow').delay(1500).fadeOut('slow');
    };
    
    
    var options = { 
        target: '#informer',   // target element(s) to be updated with server response 
        //beforeSubmit:  showRequest,  // pre-submit callback 
        success: showResponse,  // post-submit callback 
        // other available options: 
        url: 'action.php?action=save',         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        dataType:  'json'        // 'xml', 'script', or 'json' (expected server response type) 
        //resetForm: true      // reset the form after successful submit 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#form').ajaxForm(options);
 
 
// Удаление объявления   
    $( '#tbody' ).on('click', 'a.delete', function() {
        var tr = $(this).closest('tr');
        var id = tr.attr('data-id');
        var data = {"id":id};
        $.getJSON('action.php?action=delete', data,
            function(response){
                tr.fadeOut('normal',function(){
                    $(this).remove();
                    if($('#form [name=id]').val()==id){
                       $('#form').resetFormFull();
                    }
                if(response.status=='success' && response.quantity == 'full'){
                    $('#informer').informerSuccess(response);
                }
                else if (response.status=='success' && response.quantity == 'empty'){
                    $('#informer').informerSuccess(response).
                                  queue('fx',
                                        function(){
                                            $(this).informerWarning(response);
                                            $(this).dequeue('fx');
                                        }
                                        );
                }
                else if(response.status=='error'){
                    $('#informer').informerError (response);
                }    
                });
            });
    });
    
    // Кнопка очистки формы
    $('#resetForm').on('click',function(){$('#form').resetFormFull();});

    // Показ объявления в форме
    $( '#tbody' ).on('click', '.show', function(event) {
        var tr = $(this).closest('tr');
        var id = tr.attr('data-id');
        var data = {"id":id};
        $.getJSON('action.php?action=show', data,
            function(response){
                $('#form .clear_form').each(function(){
                    var name=$(this).attr('name');
                    $(this).val(response[name]);
                });
                $('#form input.set_form, #form select.set_form').val([response.type, response.allow_mails, response.location_id, response.category_id]);
                $('#submit').html('<strong>Сохранить объявление</strong>');
            });
    });
});

