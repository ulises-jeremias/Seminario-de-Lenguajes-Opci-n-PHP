function prepare_view(){
    var body = __tn(document, 'body'),
        footer = document.createElement('footer'),
        p = document.createElement('p'),
        span = document.createElement('span');

    p.innerHTML = '&copy; Dealership';
    footer.appendChild(p);
    span.className = 'fa fa-arrow-up ir-arriba';
    body[0].appendChild(footer);
    body[0].appendChild(span);
};

//paralax
function paralax(){
	$(window).scroll(function(){
		var barra = $(window).scrollTop(),
		    posicion = barra * 0.04; //el numero por el q multiplicamos cambia de acuerdo a cuanto quiero que baje la imagen..

		$('body').css({
			'background-position': '0 ' + posicion + 'px'
		});
	});
};

//---------
function scrollTop(){

    $('.ir-arriba').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });

    $(window).scroll(function(){
        if( $(this).scrollTop() > 0 ){
            $('.ir-arriba').slideDown(300);
        } else {
            $('.ir-arriba').slideUp(300);
        }
    });
};

function main(){
    prepare_view();
    paralax();
    scrollTop();
}

$(window, document, undefined).ready(function() {
    main();
});

//----------------------------------Form Animation------------------------------------------------------------

$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  	$(this).removeClass('is-active');
  });

});
