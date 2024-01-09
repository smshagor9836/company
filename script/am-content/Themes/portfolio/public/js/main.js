(function ($) {
    "use strict";

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

    
    /*-------------------------------------*/
    /* Preloader Active
    /*--------------------------------------*/
    $(window).on('load', function () {
        $('.preloader').fadeOut();
    });


    /*-------------------------------------*/
    /* Preloader Active
    /*--------------------------------------*/
    $("img.lazy").lazyload({
       effect : "fadeIn"
   });


  


    /*-------------------------------------*/
    /* Isotope Active
    /*--------------------------------------*/
    var $grid = $('.grid').isotope();

    // filter items on button click
    $('.filter-button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
    });


    /*-------------------------------------*/
    /* Owl Carousel Active
    /*--------------------------------------*/
    $('.client-review').owlCarousel({
        loop: true,
        autoplay: true,
        nav: false,
        dots: true,
        items: 2,
        responsive: {
            0: {
                items: 1
            },
            900: {
                items: 2
            }
        }
    });
    

    /*-------------------------------------*/
    /* Sticky Header & Back to top Active
    /*--------------------------------------*/

    $(window).on('scroll', function () {
        if ($(window).scrollTop() >= 100) {
            $('.navigation').addClass('fixed');
            $('.back-top').fadeIn();
        } else {
            $('.navigation').removeClass('fixed');
            $('.back-top').fadeOut();
        }
    });



    })(jQuery);
