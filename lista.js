$(document).ready(function(){   
    $('.todo').on('click', 'li', function(){    
       $(this).appendTo('.done');
    });

    $('.done').on('click', 'li', function(){    
       $(this).appendTo('.todo');
    });
});

function inscribir() {
   console.log('Usuario Inscrito');
   alert("Alumno inscrito");
 };