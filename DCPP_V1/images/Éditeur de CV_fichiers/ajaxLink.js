var bindAjaxLink = function(){
    $('.ajaxLink').unbind('click');
    $('.ajaxLink').click(function(e){

        if( $(this).hasClass('loading') ){
            // on ne fait rien cest en attente
        }else {

            var self = this

            $(this).addClass('loading');

            var action = $(this).attr('ajax-action');
            var data = $(this).attr('ajax-data');
            var method = $(this).attr('ajax-method');
            var callback = $(this).attr('ajax-callback');
            var confirmMsg = $(this).attr('ajax-confirm');

            if (!confirmMsg || confirm(confirmMsg)) {

                $.ajax({
                    url: action,
                    method: method,
                    dataType: "json",
                    data: data,
                    success: function (json) {

                        if (json && json != null) {

                            $(self).removeClass('loading');

                            if (json.success) {
                                // condiiton sur formid

                                if ((!callback || callback == '') && json.redirect) {
                                    window.location = json.redirect;
                                }

                            }

                            if (typeof( json.data ) == 'string' && json.data != '') {
                                alert(json.data);
                            }
                            if (json.data && json.data.error && typeof( json.data.error ) == 'string' && json.data.error != '') {
                                alert(json.data.error);
                            }

                            if (callback && callback != '') {
                                window[callback](json);
                            }

                        } else {

                            alert(lang_var['set_all_fields']);

                        }

                    }
                });

            } else {
                $(self).removeClass('loading');
            }
        }

        e.preventDefault();
        return false;
    });
}

$(document).ready(function () {
    bindAjaxLink();
});
