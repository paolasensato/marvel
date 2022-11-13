const sliderComics = document.querySelector("#carousel-comics");
const sliderEvents = document.querySelector("#carousel-events");

const cardPadding = 18;
const scrollPerClickComics = (cardPadding + document.querySelector("#img-comics").clientWidth);
const scrollPerClickEvents = (cardPadding + document.querySelector("#img-events").clientWidth);

let scrollAmountComics = 0;
let scrollAmountEvents = 0;


function scrollLeftComics() {
	sliderComics.scrollTo({
		top: 0,
		left: (scrollAmountComics -= scrollPerClickComics),
		behavior: "smooth",
	});

	if (scrollAmountComics < 0) scrollAmountComics = 0;
}

function scrollRightComics() {
	if (scrollAmountComics <= sliderComics.scrollWidth - sliderComics.clientWidth) {
		sliderComics.scrollTo({
			top: 0,
			left: (scrollAmountComics += scrollPerClickComics),
			behavior: "smooth",
		});
	}
}


function scrollLeftEvents() {
	sliderEvents.scrollTo({
		top: 0,
		left: (scrollAmountEvents -= scrollPerClickEvents),
		behavior: "smooth",
	});

	if (scrollAmountEvents < 0) scrollAmountEvents = 0;
}

function scrollRightEvents() {
	if (scrollAmountEvents <= sliderEvents.scrollWidth - sliderEvents.clientWidth) {
		sliderEvents.scrollTo({
			top: 0,
			left: (scrollAmountEvents += scrollPerClickEvents),
			behavior: "smooth",
		});
	}
}
