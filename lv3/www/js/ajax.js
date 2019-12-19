$(document).ready(function(){
    $('form').submit(function(){
        $.ajax({
			url: 'user_data.php', 
			type: $(this).attr('method'), 
			dataType: "html", 
            data: $("form").serialize(), 
        });  
    });
});