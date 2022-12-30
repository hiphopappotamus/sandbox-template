(function($){
  if($('.bg-parallax').length) {
    $('.bg-parallax').each(function(){
        const dataSpeed = $(this).attr('data-scroll');
        $(this).bgParallax({
          speed: dataSpeed
        });
      });
    }
  }(jQuery));
