(function($) {
'use strict';
    
       
  // PRELOADER
    $(window).on('load', function() {
        $('#page-loader').fadeOut('slow', function() {
            $(this).remove();
        });
    });

    
  // SCROLL TO TOP
  
  $(window).on('scroll', function () {
    if ($(window).scrollTop() > 70) {
        $('.scroll-to-top').addClass('reveal');
    } else {
        $('.scroll-to-top').removeClass('reveal');
    }
});
 
 
/* ----------------------------------------------------------- */
    /*  Fixed header
    /* ----------------------------------------------------------- */


    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 70) {
            $('.site-navigation,.trans-navigation').addClass('header-white');
        } else {
            $('.site-navigation,.trans-navigation').removeClass('header-white');
        }

    });

 
    
  // Smooth scrolling using jQuery easing
// jQuery for page scrolling feature - requires jQuery Easing plugin
    
    
    $('a.js-scroll-trigger').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'ease');
        event.preventDefault();
    });


  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').on('click', function(event) {
    $('.navbar-collapse').collapse('hide');
  });

   

          /*START GOOGLE MAP*/
          function initialize() {
            var mapOptions = {
              zoom: 15,
              scrollwheel: false,
              center: new google.maps.LatLng(40.7127837, -74.00594130000002)
            };
            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);
            var marker = new google.maps.Marker({
              position: map.getCenter(),
              icon: 'assets/img/map_pin.png',
              map: map
            });
          }
          google.maps.event.addDomListener(window, 'load', initialize);	
          /*END GOOGLE MAP*/	

 

})(jQuery); // End of use strict


if (document.querySelector("#form2")) {
  
  document.querySelector("#form2").addEventListener("submit",function(event){
    event.preventDefault();
    const form = document.querySelector("#form2");
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open("POST",form.dataset.dest);
    xhr.onloadstart = function() {
        //progressbar document.querySelector("#loader").style.display = "flex";
    }
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) 
      {
          console.log(this.responseText);
      }
      if (this.status==201 || this.status == 200) {
          console.log("BAŞARILI");
          
          document.querySelector("#formalertsuccess").style.display = "block";
          document.querySelector("#formalertsuccess").innerHTML=this.responseText;
    
          setTimeout(function(){
                      document.querySelector("#formalertsuccess").style.display = "none";
                      form.reset();
                      location.href = "anasayfa";
                  },9000);
    
      }else{
          document.querySelector("#formalertdanger").style.display = "block";
          document.querySelector("#formalertdanger").innerHTML=this.responseText;
          setTimeout(function(){
                      document.querySelector("#formalertdanger").style.display = "none";
                  },9000);
      }
          console.log(this.readyState);
          console.log(this.status);
    }
    xhr.send(formData);
  });
}

if (document.querySelector("#form1")) {
  
  document.querySelector("#form1").addEventListener("submit",function(event){
    event.preventDefault();
    const form = document.querySelector("#form1");
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    console.log(form.dataset.dest);
    xhr.open("POST",form.dataset.dest);
    xhr.onloadstart = function() {
        //progressbar document.querySelector("#loader").style.display = "flex";
    }
    xhr.onreadystatechange = function() 
    {
      // console.log("geldi");
        // console.log(this.responseText);
        if (this.readyState == 4 && this.status == 200) 
        {
            console.log(this.responseText);
        }
        if (this.status==201 || this.status == 200) {
            console.log("BAŞARILI");
            
            document.querySelector("#formalertsuccess").style.display = "block";
            document.querySelector("#formalertsuccess").innerHTML=this.responseText;
      
            setTimeout(function(){
                        document.querySelector("#formalertsuccess").style.display = "none";
                        form.reset();
                        location.href = "anasayfa";
                    },3000);
      
        }else{
            document.querySelector("#formalertdanger").style.display = "block";
            document.querySelector("#formalertdanger").innerHTML=this.responseText;
            setTimeout(function(){
                        document.querySelector("#formalertdanger").style.display = "none";
                    },9000);
        }
    }
    xhr.send(formData);
  });
}
