/*

 __  __       _    __      _  __     __                    
|  \/  |     | |  / _|    | | \ \   / /                  
| \  / |_   _| |_| |_ __ _| | _\ \_/ /_ _ _ __  _ _ __ ___  
| |\/| | | | | __|  _/ _` | |/ /\   / _` | '_ \| | '_ ` _ \ 
| |  | | |_| | |_| || (_| |   <  | | (_| | |_) | | | | | | |
|_|  |_|\__,_|\__|_| \__,_|_|\_\ |_|\__,_| .__/|_|_| |_| |_|
                                         | |                
                                         |_|       

-------------------------------------------------------------
Copyright © 2019 All Right Reserved
Software by www.mutfakyapim.com
Developer by Asaf Mirtürk (asafmirturk@mutfakyapim.com)
Version 1.0
*/

$('a.test-mail').click(function(){
    var url = $(this).attr('data-url');
    var test_mail = $('input[name="test_mail"]').val();

    $.ajax({
        type: 'POST',
        data: {test_mail:test_mail},
        url: url,
        success: function(response){
            if (response == 'ok')
            {
                $.nok({
                    message: 'E-posta gönderme işlemi başarılı.',
                    type: 'success',
                });

            } else
                {
                    $.nok({
                        message: 'E-posta gönderme işlemi sırasında bir hata oluştu. Lütfen bilgileri kontrol edin.',
                        type: 'error',
                    });
                }
         },
        beforeSend: function () {
            $("div.loader").show();
        },
        complete: function () {
            $("div.loader").hide();
        }
    });

    return false;
   
})
 

/* PRODUCT EDIT */
$('a.photo').click(function(){
	var id = $(this).attr('id');
	var url = $(this).attr('data-url');
	var name = $(this).attr('data-name');

	$.ajax({
		type: 'POST',
		url: url,
		data: {id:id, name: name},
		success:function(response)
		{
			$('div.'+id).slideUp();
			
		}
	})
	return false;
})


