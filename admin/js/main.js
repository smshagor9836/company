 "use strict";

(function ($) {

  /*----------------------------
        Comment reply box scrollbar Active
      ------------------------------*/
    $(".comment-reply-box").niceScroll({cursorcolor:"#5b7798"}); 

    
  /*----------------------------
        Hamburger Active
      ------------------------------*/
    $('.hamburger').on('click',function(){
      $('.sidebar').toggleClass('active');
      $('.main-content-area').toggleClass('active');
    });


  /*----------------------------
        Data Append
      ------------------------------*/
    $('#theme_file').on('change',function(){
      var files = [];
      for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
      }
      $(this).next('.custom-file-label').html(files.join(', '));
    })


  /*----------------------------
        Jquery Live Search
      ------------------------------*/
    $('#data_search').keyup(function(){  
      search_table($(this).val());  
    });  
    function search_table(value){  
        $('.table tbody tr').each(function(){  
        var found = 'false';  
        $(this).each(function(){  
          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
          {  
            found = true;  
          }  
        });  
        if(found == true)  
        {  
          $(this).show();  
        }  
        else  
        {  
          $(this).hide();  
        }  
      });  
    } 


})(jQuery);	

/*----------------------------
        Sweet Aleart
      ------------------------------*/
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

  function Sweet(icon,title){
    Toast.fire({
      icon: icon,
      title: title
    })
  }