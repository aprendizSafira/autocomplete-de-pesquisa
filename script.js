$(function() {
    $('#busca').on('keyup', function() {//Quando tecla uma letra(quando solta a letra)
        //Captura o que foi digitado
        var texto = $(this).val();
        
        //Fazendo requisição ajax
        $.ajax({
            url:'busca.php',
            type:'POST',
            dataType:'json',
            data:{texto:texto},//Envio esses dados para busca.php
            success:function(json) {//a resposta é colocado na div resultado no htlm
                var html = '';
               for(var i in json) {
                   html += '<li><a href="usuarios.php?id='+json[i].id+'">'+json[i].nome+'</a></li>';
               }
               
               $('#resultado').html(html);
            }
        });
        
    });
});



