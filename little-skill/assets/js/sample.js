$(document).ready(function(){

    $('#log').hide();
    $('#reg').hide();
    $('#jm').show();

    $('#btn-log').click(function(){
        $('#log').show();
        $('#reg').hide();
        $('#jm').hide();
    });

    $('#btn-reg').click(function(){
        $('#log').hide();
        $('#reg').show();
        $('#jm').hide();
    });

    $('#btn-log-1').click(function(){
        $('#log').show();
        $('#reg').hide();
        $('#jm').hide();
    });

    $('#btn-reg-1').click(function(){
        $('#log').hide();
        $('#reg').show();
        $('#jm').hide();
    });
    
   
 
    });