$(function(){
    //original field values
    var field_values = {
            //id        :  value
            'username'  : 'username',
            'password'  : 'password',
            'cpassword' : 'password',
            'firstname'  : 'first name',
            'lastname'  : 'last name',
            'email'  : 'email address'
    };



    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');

    //first_step
    $('#S1').click(function(){
        //ckeck if inputs aren't empty
        var fields = $('#first_step input[type=text], #short_desc');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<4 ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {
			
                $('#progress_text').html('33% Complete');
                $('#progress').css('width','113px');
			} else return false;
			
			
    });
		function progress() {
        
		var cnt=0;
		var pgln=0;
		var recipe_name = $("#recipe_name");
		var value1 = recipe_name.val();
		var desc = $("#short_desc");
		var value2 = desc.val();
            if( value1.length>4 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value2.length>4 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 

//        var fields = $('#first_step input[type=text], #short_desc');
//        fields.each(function(){
//            var value = $(this).val();
//            if( value.length>4 ) {
//				cnt=cnt+10;
//                $('#progress_text').html(cnt+'% Complete');
//                $('#progress').css('width','226px');
//            } 
//        });        
		}


    $('#submit_second').click(function(){
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
        var fields = $('#second_step input[type=text]');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('66% Complete');
                $('#progress').css('width','226px');
                
                //slide steps
                $('#second_step').slideUp();
                $('#third_step').slideDown();     
        } else return false;
		
    });


    $('#submit_third').click(function(){
        //update progress bar
        $('#progress_text').html('100% Complete');
        $('#progress').css('width','339px');

        //prepare the fourth step
        var fields = new Array(
            $('#username').val(),
            $('#password').val(),
            $('#email').val(),
            $('#firstname').val() + ' ' + $('#lastname').val(),
            $('#age').val(),
            $('#gender').val(),
            $('#country').val()                       
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();            
    });


    $('#submit_fourth').click(function(){
        //send information to server
        alert('Data sent');
    });

});