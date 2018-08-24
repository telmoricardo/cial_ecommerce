//$(document).ready(function () {
//    var BASE = 'https://localhost/works/paulo/admin/';
//
//    $('form').submit(function () {
//        var form = $(this);
//        var cap = form.attr('id');
//        var dados = new FormData($(this)[0]);
//        
//        $.ajax({
//            url: BASE + cap,
//            data: dados,
//            type: 'POST',
//            dataType: 'json',
//            processData: false,
//            contentType: false,
//            beforeSend: function (data) {
////                $(".icone").addClass("fas fa-sync fa-spin");
//                
////                $.each(alerts, function(key,value){
////                    $(".alert").removeClass(value);
////                });
//            },
//            success: function (data) {
////                $(".icone").removeClass("fas fa-sync fa-spin");
//                console.log(dados);
//                
////                if(data.retorno){
////                    $('.alert').addClass(data.retorno[0]);
////                    $('.result').html(data.retorno[1]);
////                }
////                
////                if(data.redirect){
////                    window.setTimeout(function(){
////                        window.location.href = BASE + data.redirect[0];
////                    }, data.redirect[1]);
////                }
//            }
//        });
//        
//        return false;
//    });
//});