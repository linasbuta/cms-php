

$(document).ready(function () {
    
//editor
ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
        //Rest of The code



    } );





});

//funkcija kai krauna puslapi uzdeti atvaizda kol krauna
//$("body").prepend("Hello");

var div_box ="<div id='load-screen'> <div id='loading'></div></div>";
$("body").prepend(div_box);
$("#load-screen").delay(700).fadeOut(600, function(){
    $(this).remove();
});