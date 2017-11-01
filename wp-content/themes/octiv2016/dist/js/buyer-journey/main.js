jQuery(document).ready(function($){
	var timelineBlocks = $('.cd-timeline-block'),
		offset = 0.7;

	//hide timeline blocks which are outside the viewport
	hideBlocks(timelineBlocks, offset);

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) 
			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});

	function hideBlocks(blocks, offset) {
		blocks.each(function(){
			( $(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		});
	}

	function showBlocks(blocks, offset) {
		blocks.each(function(){
			( $(this).offset().top <= $(window).scrollTop()+$(window).height()*offset && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in').find('.chart .chart-bar').addClass('fadeInLeft').siblings('.chart .data-point').addClass('fadeInUp');
		});
	}
});

$(window).scroll(function() {
	var wScroll = $(this).scrollTop();
	var airplane = $('.airplane');
	var airplanePos = airplane.offset().top;
	var titleHeroHeight = $('#title-hero').height();
	
	// console.log('wScroll = ' + wScroll);
	
	if (wScroll < titleHeroHeight) {
	// console.log('airplanePos = ' + airplanePos);	
	airplane.css({
		'transform' : 'translate('+ wScroll /-4 +'%, '+ wScroll /-4 +'%)'
	})
	}

});


$('#toc a').on('click', function(e) {
  e.preventDefault();
  var target = $(this.hash);
  $('html, body').animate({
      scrollTop: target.offset().top
  }, 300);
});