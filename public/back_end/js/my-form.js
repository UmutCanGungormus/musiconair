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
Developer by Asaf Mirturk (asaf.mirturk@mutfakyapim.com)
Version 1.0
*/

$('.form_name').keyup(function(){
    var value = $(this).val();
    $('h4.form_name').html(value);
})

$('.form_description').keyup(function(){
    var value = $(this).val();
    $('p.form_description').html(value);
})

// ELEMAN EKLE
$('.draggable a').draggable({
    helper: 'clone',
    zIndex: 100,
    opacity: '0.9',
    cursor: 'move',

    stop: function()
    {
        var href = $(this).parent().attr('data-href');
        var type = $(this).data("type");
        if (type == 'text')
        {
            var name = prompt('Metin Alanı Adı', '');
            if (name){
                var random_name = 'text_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'required'        : 'required',
                    'min_length'      : 5,
                    'max_length'      : 45
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                
                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="text" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="text" name="'+random_name+'" placeholder="'+name+'" class="span12 '+random_name+'"><div><div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'email')
        {
            var name = prompt('E-Posta Alanı Adı', '');
            if (name){
                var random_name = 'email_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'required'        : 'required',
                    'min_length'      : 15,
                    'max_length'      : 45
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                
                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="email" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="email" name="'+random_name+'" placeholder="'+name+'" class="span12 '+random_name+'"></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'number')
        {
            var name = prompt('Sayı Alanı Adı', '');
            
            if (name){
                var random_name = 'number_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : 'number',
                    'required'        : 'required',
                    'min_length'      : 11,
                    'max_length'      : 15
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="number" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="number" name="'+random_name+'" placeholder="'+name+'" class="span12 '+random_name+'"></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'textarea')
        {
            var name = prompt('Metin Alanı Adı', '');
            
            if (name){
                var random_name = 'textarea_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : 'textarea',
                    'required'        : 'required',
                    'min_length'      : 25,
                    'max_length'      : 150
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="textarea" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<textarea name="'+random_name+'" placeholder="'+name+'"  class="span12 '+random_name+'"></textarea></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'select')
        {
            var name = prompt('Açılır Menü Adı', '');
            
            if (name){
                var random_name = 'select_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'required'        : 'required',
                    'options'         : 'Test 1,Test 2,Test 3'
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="select" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<select name="'+random_name+'" class="span12 '+random_name+'"><option>Lütfen Seçin</option><option>Test 1</option><option>Test 2</option><option>Test 3</option></select></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'radio')
        {
            var name = prompt('Tekli Onay Kutusu Adı', '');
            
            if (name){
                var random_name = 'radio_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'options_1'       : 'Evet',
                    'options_2'       : 'Hayır'
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="radio" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="radio" class="element_radio_option_1" name="'+random_name+'" value="Evet" checked> <span class="element_radio_option_1">Evet</span> <input type="radio" class="element_radio_option_2" name="'+random_name+'" value="Hayır"> <span class="element_radio_option_2">Hayır</span></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'checkbox')
        {
            var name = prompt('Çoklu Onay Kutusu Adı', '');
            
            if (name){
                var random_name = 'checkbox_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'options'         : 'Test 1,Test 2,Test 3'
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="checkbox" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls '+random_name+'">';
                output += '<input type="checkbox" name="'+random_name+'" value="Test 1">Test 1 <input type="checkbox" name="'+random_name+'" value="Test 2">Test 2 <input type="checkbox" name="'+random_name+'" value="Test 3">Test 3</div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'date')
        {
            var name = prompt('Tarih Seçici Adı', '');
            
            if (name){
                var random_name = 'date_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'required'        : 'required'
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="date" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="date" name="'+random_name+'" class="span12 '+random_name+'"></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'time')
        {
            var name = prompt('Saat Seçici Adı', '');
            
            if (name){
                var random_name = 'time_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'required'        : 'required'
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="time" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="time" name="'+random_name+'" class="span12 '+random_name+'"></div></div>';
                $('div.content').append(output);
            }
        }

        else if (type == 'file')
        {
            var name = prompt('Dosya Seçici Adı', '');
            
            if (name){
                var random_name = 'file_' + Math.floor((Math.random() * 90000) + 1);
                var elementData = {
                    'name'            : name,
                    'random_name'     : random_name,
                    'type'            : type,
                    'required'        : 'required',
                    'extension_type'  : {'jpg':1, 'png':0, 'gif':0, 'tiff':0, 'doc':1, 'ppt':1, 'xls':1, 'pdf':1, 'mp3':0, 'mp4':0, 'zip':1},
                    'max_file_size'   : '8MB'
                };

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {elementData: elementData}
                });

                var output = '<div class="control-group">';
                output += '<label class="control-label"><span class="'+random_name+'">'+name+'</span> ';
                output += '<span class="edit" data-type="file" data-random="'+random_name+'" style="font-size: 10px; font-weight: bold;">(düzenle)</span>';
                output += '</label><div class="controls">';
                output += '<input type="file" name="'+random_name+'" class="span12 '+random_name+'"></div></div>';
                $('div.content').append(output);
            }
        }
    }
})

// $('div.drag-form').droppable({
//     accept: 'a',
//     activeClass: 'drag-hover',
//     hoverClass: 'drag-hover',
//     tolerance: 'fit'
// })

// DÜZENLEYİCİYİ AÇ
$('div.content').on('click', 'span.edit', function(){
    var random = $(this).attr('data-random');
    var type = $(this).attr('data-type');
    var url = $('form').attr('data-url');

    $('.nav-tabs li').removeClass('active');
    $('.nav-tabs li:eq(2)').addClass('active');
    $('form div').removeClass('active');
    $('form div#tab3').addClass('active');
    
    $.ajax({
        type: 'POST',
        url: url,
        data: {type: type, random: random},
        success: function (response)
        {
            $('div#tab3').html(response);
        }
    })
})



// ELEMAN DÜZENLE (TEXT)
$('*').on('keyup', 'input.element_text_name', function(){
    var element_text_random_name = $('input.element_text_random_name').val();
    var value = $(this).val();

    $('span.'+element_text_random_name).html(value);
    $('input.'+element_text_random_name).attr('placeholder', value);
})

// ELEMAN DÜZENLE (TEXT)
$('*').on('click', 'button.element-edit-text', function(){
   
    var url                             = $(this).attr('data-url');
    var element_text_random_name        = $('.element_text_random_name').val();
    var element_text_name               = $('.element_text_name').val();
    var element_text_min_length         = $('.element_text_min_length').val();
    var element_text_max_length         = $('.element_text_max_length').val();
    var element_text_required           = $('.element_text_required:checked').val();
    var element_type                    = $('.element_type').val();

    var data =
    {
        element_text_random_name    : element_text_random_name,
        element_text_name           : element_text_name,
        element_text_min_length     : element_text_min_length,
        element_text_max_length     : element_text_max_length,
        element_text_required       : element_text_required,
        element_type                : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (EMAIL)
$('*').on('keyup', 'input.element_email_name', function(){
    var element_email_random_name = $('input.element_email_random_name').val();
    var value = $(this).val();

    $('span.'+element_email_random_name).html(value);
    $('input.'+element_email_random_name).attr('placeholder', value);
})

// ELEMAN DÜZENLE (EMAIL)
$('*').on('click', 'button.element-edit-email', function(){
   
    var url                              = $(this).attr('data-url');
    var element_email_random_name        = $('.element_email_random_name').val();
    var element_email_name               = $('.element_email_name').val();
    var element_email_min_length         = $('.element_email_min_length').val();
    var element_email_max_length         = $('.element_email_max_length').val();
    var element_email_required           = $('.element_email_required:checked').val();
    var element_type                     = $('.element_type').val();

    var data =
    {
        element_email_random_name    : element_email_random_name,
        element_email_name           : element_email_name,
        element_email_min_length     : element_email_min_length,
        element_email_max_length     : element_email_max_length,
        element_email_required       : element_email_required,
        element_type                 : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (NUMBER)
$('*').on('keyup', 'input.element_number_name', function(){
    var element_number_random_name = $('input.element_number_random_name').val();
    var value = $(this).val();

    $('span.'+element_number_random_name).html(value);
    $('input.'+element_number_random_name).attr('placeholder', value);
})

// ELEMAN DÜZENLE (NUMBER)
$('*').on('click', 'button.element-edit-number', function(){
   
    var url                               = $(this).attr('data-url');
    var element_number_random_name        = $('.element_number_random_name').val();
    var element_number_name               = $('.element_number_name').val();
    var element_number_min_length         = $('.element_number_min_length').val();
    var element_number_max_length         = $('.element_number_max_length').val();
    var element_number_required           = $('.element_number_required:checked').val();
    var element_type                      = $('.element_type').val();

    var data =
    {
        element_number_random_name    : element_number_random_name,
        element_number_name           : element_number_name,
        element_number_min_length     : element_number_min_length,
        element_number_max_length     : element_number_max_length,
        element_number_required       : element_number_required,
        element_type                  : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (TEXTAREA)
$('*').on('keyup', 'input.element_textarea_name', function(){
    var element_textarea_random_name = $('input.element_textarea_random_name').val();
    var value = $(this).val();

    $('span.'+element_textarea_random_name).html(value);
    $('textarea.'+element_textarea_random_name).attr('placeholder', value);
})

// ELEMAN DÜZENLE (TEXTAREA)
$('*').on('click', 'button.element-edit-textarea', function(){
   
    var url                               = $(this).attr('data-url');
    var element_textarea_random_name        = $('.element_textarea_random_name').val();
    var element_textarea_name               = $('.element_textarea_name').val();
    var element_textarea_min_length         = $('.element_textarea_min_length').val();
    var element_textarea_max_length         = $('.element_textarea_max_length').val();
    var element_textarea_required           = $('.element_textarea_required:checked').val();
    var element_type                      = $('.element_type').val();

    var data =
    {
        element_textarea_random_name    : element_textarea_random_name,
        element_textarea_name           : element_textarea_name,
        element_textarea_min_length     : element_textarea_min_length,
        element_textarea_max_length     : element_textarea_max_length,
        element_textarea_required       : element_textarea_required,
        element_type                    : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (SELECT)
$('*').on('keyup', 'input.element_select_name', function(){
    var element_select_random_name = $('input.element_select_random_name').val();
    var value = $(this).val();

    $('span.'+element_select_random_name).html(value);
})

// ELEMAN DÜZENLE (SELECT)
$('*').on('click', 'button.element-edit-select', function(){
   
    var url                             = $(this).attr('data-url');
    var element_select_random_name      = $('.element_select_random_name').val();
    var element_select_name             = $('.element_select_name').val();
    var element_select_options          = $('.element_select_options').val();
    var element_select_required         = $('.element_select_required:checked').val();
    var element_type                    = $('.element_type').val();

    var data =
    {
        element_select_random_name      : element_select_random_name,
        element_select_name             : element_select_name,
        element_select_options          : element_select_options,
        element_select_required         : element_select_required,
        element_type                    : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response){
            $('select.'+element_select_random_name).html(response);
        },
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (RADIO)
$('*').on('keyup', 'input.element_radio_name', function(){
    var element_radio_random_name = $('input.element_radio_random_name').val();
    var value = $(this).val();

    $('span.'+element_radio_random_name).html(value);
})

// ELEMAN DÜZENLE (RADIO)
$('*').on('keyup', 'input.element_radio_option_1', function(){
    var value = $(this).val();

    $('span.element_radio_option_1').html(value);
})

// ELEMAN DÜZENLE (RADIO)
$('*').on('keyup', 'input.element_radio_option_2', function(){
    var value = $(this).val();

    $('span.element_radio_option_2').html(value);
})

// ELEMAN DÜZENLE (RADIO)
$('*').on('click', 'button.element-edit-radio', function(){
   
    var url                             = $(this).attr('data-url');
    var element_radio_random_name       = $('.element_radio_random_name').val();
    var element_radio_name              = $('.element_radio_name').val();
    var element_radio_option_1          = $('.element_radio_option_1').val();
    var element_radio_option_2          = $('.element_radio_option_2').val();
    var element_type                    = $('.element_type').val();

    var data =
    {
        element_radio_random_name       : element_radio_random_name,
        element_radio_name              : element_radio_name,
        element_radio_option_1          : element_radio_option_1,
        element_radio_option_2          : element_radio_option_2,
        element_type                    : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response)
        {
            $('div.ccc').html(response);
        },
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (CHECKBOX)
$('*').on('keyup', 'input.element_checkbox_name', function(){
    var element_checkbox_random_name = $('input.element_checkbox_random_name').val();
    var value = $(this).val();

    $('span.'+element_checkbox_random_name).html(value);
})

// ELEMAN DÜZENLE (CHECKBOX)
$('*').on('click', 'button.element-edit-checkbox', function(){
   
    var url                                 = $(this).attr('data-url');
    var element_checkbox_random_name        = $('.element_checkbox_random_name').val();
    var element_checkbox_name               = $('.element_checkbox_name').val();
    var element_checkbox_options            = $('.element_checkbox_options').val();
    var element_type                        = $('.element_type').val();

    var data =
    {
        element_checkbox_random_name      : element_checkbox_random_name,
        element_checkbox_name             : element_checkbox_name,
        element_checkbox_options          : element_checkbox_options,
        element_type                      : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response){
            $('div.'+element_checkbox_random_name).html(response)
        },
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (DATE)
$('*').on('keyup', 'input.element_date_name', function(){
    var element_date_random_name = $('input.element_date_random_name').val();
    var value = $(this).val();

    $('span.'+element_date_random_name).html(value);
})

// ELEMAN DÜZENLE (DATE)
$('*').on('click', 'button.element-edit-date', function(){
   
    var url                                 = $(this).attr('data-url');
    var element_date_random_name            = $('.element_date_random_name').val();
    var element_date_name                   = $('.element_date_name').val();
    var element_date_required               = $('.element_date_required:checked').val();
    var element_type                        = $('.element_type').val();

    var data =
    {
        element_date_random_name            : element_date_random_name,
        element_date_name                   : element_date_name,
        element_date_required               : element_date_required,
        element_type                        : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (TIME)
$('*').on('keyup', 'input.element_time_name', function(){
    var element_time_random_name = $('input.element_time_random_name').val();
    var value = $(this).val();

    $('span.'+element_time_random_name).html(value);
})

// ELEMAN DÜZENLE (DATE)
$('*').on('click', 'button.element-edit-time', function(){
   
    var url                                 = $(this).attr('data-url');
    var element_time_random_name            = $('.element_time_random_name').val();
    var element_time_name                   = $('.element_time_name').val();
    var element_time_required               = $('.element_time_required:checked').val();
    var element_type                        = $('.element_type').val();

    var data =
    {
        element_time_random_name            : element_time_random_name,
        element_time_name                   : element_time_name,
        element_time_required               : element_time_required,
        element_type                        : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response){
            $('div.ccc').html(response);
        },
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})


// ELEMAN DÜZENLE (FILE)
$('*').on('keyup', 'input.element_file_name', function(){
    var element_file_random_name = $('input.element_file_random_name').val();
    var value = $(this).val();

    $('span.'+element_file_random_name).html(value);
})

// ELEMAN DÜZENLE (FILE)
$('*').on('click', 'button.element-edit-file', function(){
   
    var url                                 = $(this).attr('data-url');
    var element_file_random_name            = $('.element_file_random_name').val();
    var element_file_name                   = $('.element_file_name').val();
    var element_file_max_file_size          = $('.element_file_max_file_size').val();
    var element_file_require                = $('.element_file_require:checked').val();
    var element_type                        = $('.element_type').val();

    var element_file_extension_types = [];
    var element_file_extension_type         = $('.element_file_extension_type:checked').each( function() {
        element_file_extension_types.push($(this).val());
    })

    var data =
    {
        element_file_random_name            : element_file_random_name,
        element_file_name                   : element_file_name,
        element_file_max_file_size          : element_file_max_file_size,
        element_file_extension_types        : element_file_extension_types,
        element_file_require                : element_file_require,
        element_type                        : element_type
    };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response){
            $('div.ccc').html(response);
        },
        beforeSend: function () {
            $('div.form-loader').show();
        },
        complete: function () {
            $('div.form-loader').hide();
        }
    })

    return false;
})

// FORMU KAYDET
$('.save-form').click(function(){
    var form_name               = $('.form_name').val();
    var form_send_mail          = $('.form_send_mail').val();

    if (form_name == '')
    {
        alert('Lütfen Form Adı alanını boş bırakmayın.');

        $('.nav-tabs li').removeClass('active');
        $('.nav-tabs li:eq(0)').addClass('active');
        $('form div').removeClass('active');
        $('form div#tab1').addClass('active');

        $('.form_name').focus();
        return false;
    } else if (form_send_mail == '')
        {
            alert('Lütfen Gönderim Ayarları alanını boş bırakmayın.');
            
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li:eq(3)').addClass('active');
            $('form div').removeClass('active');
            $('form div#tab4').addClass('active');

            $('.form_send_mail').focus();

            return false;
        }
})
