(function($){
  var initBlock = function( $block ) {
    $block.find('.repeater-wrap').click(function() {
      $('.accordion-repeaters .repeater-wrap').removeClass("active");
      $(this).addClass("active");
    });
  };
 
  $(document).ready(function(){
      $('.accordion-wrap-right .accordion-repeaters .repeater-wrap').click(function(){
        $('.accordion-repeaters .repeater-wrap').removeClass("active");
        $(this).addClass("active");
      });
  });
  
  if( window.acf ) {
        window.acf.addAction( 'render_block_preview', initBlock ); 
  }
})(jQuery);
