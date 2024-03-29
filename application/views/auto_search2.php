<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>

<script>
$(document).ready(function() {
	var link = "/index.php/gredient";
        //Checking for the selected Item and handling it in 
        //autocompletion list.
         var selectedItem = null;  
         var setSelectedItem = function(item) {
             selectedItem = item;
             if (selectedItem === null) {
             $autocomplete.hide();
             return;
             }
             if (selectedItem < 0) {
             selectedItem = 0;
             }
             if (selectedItem >= $autocomplete.find('li').length) {
             selectedItem = $autocomplete.find('li').length - 1;
             }
             $autocomplete.find('li').removeClass('selected')
             .eq(selectedItem).addClass('selected');
             $autocomplete.show();
          };                   
  
         var populateSearchField = function() {
             $('#content').val($autocomplete.find('li').eq(selectedItem).text());
             setSelectedItem(null);
         };
  
        //Handling user events.                                     
         $('#content').keypress(function(event) {
             if ((event.keyCode == 13) && selectedItem !== null) {
             // User pressed enter key.
             populateSearchField();
             event.preventDefault();
             }
          });
  
         //Making sure that default autocomplete of browser off.
         $('#content').attr('autocomplete', 'off');
         var $autocomplete = $('<ul class="autocomplete"></ul>').hide().insertAfter('#content');
                             
         //Ajax retrieval of the data from the database using PHP.
         //Here the code is shown in gethint.php
         $('#content').keyup(function(event) {
         if (event.keyCode > 40 || event.keyCode == 8) {
			 
        $.post(link + "/searching_cont", {

            queryString: $('#content').val(),
			hint: $('#content').val()

        }, function(data){
							 if (data.length) {
                             $autocomplete.empty();
                             //Appending the suggestions to the list
                             $.each(data, function(index, term) {
                                     $('<li></li>').text(term).appendTo($autocomplete)
                                     .mouseover(function() { //Handling mouse over event.
                                      setSelectedItem(index);
                                     })
                                     .click(function() {     //Handling mouse click event.
                                     $('#content').val(term);
                                     $autocomplete.hide();
                                     });
                             });                
                             setSelectedItem(0);
                             }
                             else {
                             setSelectedItem(null);
                             }
			
        });
         }
         else if (event.keyCode == 38 &&    selectedItem !== null) {
         // User pressed up arrow
         setSelectedItem(selectedItem - 1);
         event.preventDefault();
         }
         else if (event.keyCode == 40 &&    selectedItem !== null) {
         // User pressed down arrow.
         setSelectedItem(selectedItem + 1);
         event.preventDefault();
         }
         else if (event.keyCode == 27 &&    selectedItem !== null) {
         //User pressed escape key.
             event.preventDefault();
         }
         });
         //Make sures that it removes the list when textbox looses focus
         $('#content').blur(function(event) {
         setSelectedItem(null);
         });
  });




</script>
<style>
.autocomplete{
background-color:#FFFFFF;
border:1px solid orange;
text-indent:0;
list-style:none;
list-style-position:outside;
padding:0;
margin-top:1px;
position:absolute;
width: 250px;
}

.selected{
background-color:#FFCC33;
}




</style>
</head>
<body>
<input type="text" id="content" name="content"/>
</body>
</html>