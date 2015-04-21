 jQuery(document).ready(function() {
     
     $('.quality').change(function(){
//         id=$(this).attr('id');
        
         formid =$(this).closest('form').attr('id');
        console.log(formid);
         $("#"+formid).submit();
//         total=price * value;
//         $("#"+id).closest('td').next('td > p').html(total);
//         console.log(value);html
     });
     
    $(function() {
            //	Scrolled by user interaction
            $('#foo2').carouFredSel({
                    auto: true,
                    prev: '#prev2',
                    next: '#next2',
//					pagination: "#pager2",
                    mousewheel: true,
                    swipe: {
                            onMouse: true,
                            onTouch: true
                    }
            });


    });
        // Can also be used with $(document).ready()
 $('.option-heart').click(function(e) {  // to show the created folder
        var id = $(this).data('bind');
        console.log(id);
        var base_url = window.location.origin;
         var ajaxurl = base_url+'/admin/products/addLikes/'+id;
         console.log(ajaxurl);
        $.ajax({
            type: 'GET',
            url: ajaxurl,
            data: {'id': id},
            success: function() {
            }
        });

    });
     
     
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
$('.flex-prev').html('<i class="fa fa-arrow-left"></i>');
$('.flex-next').html('<i class="fa fa-arrow-right"></i>');


$(function() {
    
    $("figure").hover(function() {        
        $(this).find('figcaption').css("display", "block");
       
    }, function() {
         $(this).find('figcaption').css("display", "none");     
    });
    
});
$(function() {
    
    $(".option-heart").hover(function() {        
       $(this).find('.likes-no').show();
    }, function() {
       $(this).find('.likes-no').hide(); 
    });
    
});
$(function() {    
    $(".item-star").hover(function() {        
       $(this).find('.fivestar').show();
    }, function() {
       $(this).find('.fivestar').hide(); 
    });
    
});
$(function() {    
    $(".item-box").hover(function() {        
       $(this).find('.item-box-image').hide();
       $(this).find('.hover-item-box-image').show();
    }, function() {
     $(this).find('.item-box-image').show();
       $(this).find('.hover-item-box-image').hide();
    });
    
});
});