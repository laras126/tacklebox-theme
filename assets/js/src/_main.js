
$(document).ready(function() {
	
	console.log('Check it: https://github.com/laras126/content-blocks-starter');


	// ----
	// Toggle Menu
	// ----

	// TODO: better fallback for non-JS - adding a .js class but it causes the nav to blink
	// Look into Modernizr for that

	var $menu = $('#menu'),
	    $menulink = $('.menu-link'),
	    $menuTrigger = $('.has-subnav > a');

	$menulink.on('click', function(e) {
		e.preventDefault();
		$menulink.toggleClass('open');
		$menu.toggleClass('open');
		return false;
	});

	$menuTrigger.click(function(e) {
		e.preventDefault();
		var $this = $(this);
		$this.toggleClass('open').next('ul').toggleClass('open');
	});
		
  	
  	// Load Sources based on category with REST API

    $('.load').each( function() {
		$(this).on('click', function() {

	    	var cat_id = $(this).attr('data-id');
	    	var cat_name = $('.cat-list').find('a[data-id='+cat_id+']').html();
			var cpt = $(this).attr('data-cpt');

	    	$('#results').animate({
	    		'opacity': 0, 
	    		'max-height': '0'
	    	}, 200);
	    	
	    	// $('.spinner').animate({'opacity': 1}, 200);

	        $.ajax({
				url: 'http://tsk.local/wp-json/wp/v2/'+cpt,
				data: {
		        	filter: {
		        		'posts_per_page': -1,
		        		'cat': cat_id
		        	}
		    	},
		    	dataType: 'json',
		    	type: 'GET',

	        })
			.done(function(data) {
				$('#results').html('');
				$('#results').animate({
					'opacity': 1, 
					'max-height': 'none'
				}, 200);
		    	// $('.spinner').animate({'opacity': 0}, 200);

	           	for (var i = 0; i < data.length; i++) {
	           		console.log(data[i].title.rendered);
					$('#results').append('<div class="item__row"><h5 class="meta--upper"><a href="'+data[i].link+'">'+data[i].title.rendered+'</a><span class="meta--light"> '+data[i].source_author+'</span></h5><p class="meta">'+data[i].source_blurb+'</p></div>');
	           	};
	           	// $('#current-cat').html(cat_name);
	        })
	        .fail( function(xhr, textStatus, errorThrown) {
		        // $('#results').html('');
		        console.log(xhr.responseText);
		    });

	    });

    });
    



	// Back to top arrow

	$('.nav--backtop').on( 'click', function() {
		var hash = $('#pageTop');
		var $target = $(hash);

		// Slide to section corresponding to clicked hash
		$('html,body').animate({
			scrollTop: $target.offset().top
        }, 700);

        return false;

	});


	// Tabbed Content

	$('.tab').on('click', function() {
		var href = $(this).find('.tab-link').attr('href');
		$('.-tabbed').removeClass('open');
		$('.tab-link').removeClass('open');

		$('.-tabbed' + href).addClass('open');
		$('.tab-link[href='+href+']').addClass('open');
	});

	$('.tab-link').on('click', function(e) {
        e.preventDefault();
	});




	// ----
	// Plugins
	// ----

	$('.site__main').fitVids();




});

