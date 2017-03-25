jQuery(document).ready(function($){

	// // https://github.com/jedrzejchalubek/glidejs
	// $("#Glide").glide({
	//     type: "slider"
	// });

	// Unslider
	$('.carousel').unslider({
		animation: 'fade',
		autoplay: true,
		// arrows: {
		// 	prev: '<a class="unslider-arrow prev"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8"><path d="M4 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z" transform="translate(1)" /></svg></a>',
		// 	next: '<a class="unslider-arrow next"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8"><path d="M1.5 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z" transform="translate(1)" /></svg></a>',
		// },
		arrows: false,
		nav: false,
	});

});


