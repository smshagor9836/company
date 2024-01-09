(function($) {
    "use strict";
     
    /*----------------------------
        Sticky nav Active
       ------------------------------*/
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();   
        if (scroll > 150 ) {
            $(".header-main-area").addClass("navbar_fixed");
        } else {
            $(".header-main-area").removeClass("navbar_fixed");
        }
    });
    
   

    /*----------------------------
        Cart Count
       ------------------------------*/
    if($('#count_url').val()){
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: $('#count_url').val(),
            data: {id:$('#post_id').val()},
            
        })
    }  


    /*----------------------------
        Mobile Menu Active
       ------------------------------*/
    $('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "992"
    });


    /*----------------------------
        OwlCarousel Active
       ------------------------------*/
    $('.owl-carousel1').owlCarousel({
        margin: 0,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 1
            },
            992: {
                items: 1
            }
        }
    })

    /*----------------------------
        Language Active
        ------------------------------*/
     $('#select_language').on('change',function(e){
        e.preventDefault();
        var url = $('#select_lang_url').val();
        $.ajax({
            type: 'GET',
            url: url,
            data: {locale:$('#select_language option:selected').val()},
            dataType: 'HTML',
            success: function(response){ 
                location.reload();
            }
        })
    });

    /*----------------------------
        OwlCarousel Active
       ------------------------------*/
    $('.owl-carousel2').owlCarousel({
        margin: 0,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            767: {
                items: 3
            },
            992: {
                items: 5
            }
        }
    })

    /*----------------------------
        Team Carousel Active
       ------------------------------*/
    $('.team').owlCarousel({
        margin: 0,
        loop: true,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: 4 
            }
        }
    })

    /*----------------------------
        Multipleimg active
       ------------------------------*/
    $('.multi-img img').on('click',function(e){
        e.preventDefault();
        $('.main-image img').attr("src",$(this).attr("src"));
        $(this).addClass('active').siblings().removeClass('active');
    });


    /*----------------------------
        Ajax Contact Form Submit
       ------------------------------*/
    $('#contact_form').on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('#contact_button_label').html('Sending...');
            },
            success: function(response){ 
                $('#contact_button_label').html('Send Message');
                $('#success').html('Your Message Send Successfully');
                $('#name').val('');
                $('#email').val('');
                $('#subject').val('');
                $('#message').val('');
            },
            error: function(xhr, status, error) 
            {
                $('#error').html('Something Went Wrong');
                $('#contact_button_label').html('Send Message');
            }
        })


    });


})(jQuery);

/*----------------------------
    Add to Cart
   ------------------------------*/
function add_to_cart(id)
{   
    var qty = $('#product_qty'+id).val();
    var url = $('#add_to_cart').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        data: { id: id , qty:qty },
        type: "GET",
        dataType: "HTML",
        success: function(response) {
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

            Toast.fire({
              icon: 'success',
              title: 'Product added successfully'
          })
         $('#load_cart_count').load(' #load_cart_count');
     }
 });


}

/*----------------------------
    Cart Update
   ------------------------------*/
function cart_update(id)
{
    var qty = $('#product_qty'+id).val();
    var url = $('#cart_update').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        data: { id: id, qty: qty },
        type: "GET",
        dataType: "HTML",
        beforeSend: function() {
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

            Toast.fire({
              icon: 'success',
              title: 'Cart update successfully'
          })
        },
        success: function(response) {
         $('.cart-table').load(' .cart-table');
         $('#cart_count').html(response);
     }
 });
}

/*----------------------------
    Cart Remove
   ------------------------------*/
function remove_cart(id)
{   
    var url = $('#remove_cart').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        data: { id: id },
        type: "GET",
        dataType: "HTML",
        beforeSend: function() {
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

            Toast.fire({
              icon: 'success',
              title: 'Cart remove successfully'
          })
        },
        success: function(response) {
         location.reload();
     }
 });


}


