
$(document).ready(function(){
    var answer = {};
    $('#sub').click(function(){
        //alert('submit');
        var pol = $('#poland').val();
        //alert (pol);

        $.get(
            "/scripts/ajax.php",
            {
                poland: pol
            },
            onAjaxSuccess
        );
        function onAjaxSuccess(data){
            $('#out').text('Ответ:'+data);
        }
    });

});


