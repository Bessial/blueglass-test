
  (function($){

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
        $block.find('.slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            centerMode: true,
            variableWidth: true,
            adaptiveHeight: true,
            focusOnSelect: true,
            responsive: true,
            nextArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            prevArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
        });     
    }
  
    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.slider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=hero', initializeBlock );
    }

})(jQuery);

  