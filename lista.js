$(document).ready(function(){   
    $('.todo').on('click', 'li', function(){    
       $(this).appendTo('.done');
    });

    $('.done').on('click', 'li', function(){    
       $(this).appendTo('.todo');
    });
});