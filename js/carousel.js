const sliders = document.querySelector(".carousel-inner");
let scrollAmount = 0;
let scrollPerClick = 400;

function sliderScrollLeft() {
	sliders.scrollTo({
		top: 0,
		left: (scrollAmount -= scrollPerClick),
		behavior: "smooth",
	});

	if (scrollAmount < 0) scrollAmount = 0;
}

function sliderScrollRight() {
	if (scrollAmount <= sliders.scrollWidth - sliders.clientWidth) {
		sliders.scrollTo({
			top: 0,
			left: (scrollAmount += scrollPerClick),
			behavior: "smooth",
		});
	}
  
}