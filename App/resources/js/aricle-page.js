$('.slider').slick({
	infinite: true,
	cssEase: 'ease-out',
	speed: 2,
	arrows: false,
	pauseOnHover: true,
	centerMode: true,
	centerPadding: '0px',
	centerMode: true,
	slidesToShow: 3,
	responsive: [
	{
		breakpoint: 1200,
			settings: {
			slidesToShow: 2,
			autoplay: true,
			autoplaySpeed: 2500,
			}
		},
		{
			breakpoint: 768,
			settings: {
			centerMode: false,
			slidesToShow: 1,
			autoplay: true,
			autoplaySpeed: 2500,
			}
		}]
});
