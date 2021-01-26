// Get elements
let btn1 = document.getElementById("btn");
var checkbox = document.getElementById("checkbox");
let rect1 = document.getElementById("rect1");
let rect2 = document.getElementById("rect2");
var terms = document.getElementById("terms");

// Set events
btn1.addEventListener("mousedown", animeDown);
btn1.addEventListener("mouseup", animeUp);

// CSS toggle functions
function animeDown() {
	btn1.classList.toggle("h_btn");
}

function animeUp() {
	btn1.classList.toggle("h_btn");
	checkbox.classList.toggle("h_cb");
	rect1.classList.toggle("h_rects");
	rect2.classList.toggle("h_rects");
}
btn1.addEventListener("click", function () {
	if (checkbox.classList.contains("h_cb")) {
		terms.setAttribute("value", "no");
		let change = document.getElementById("submit");
		change.style.background = "#6d6d6d";
		change.style.pointerEvents = "none";
		change.style.boxShadow = "unset";
	} else {
		terms.setAttribute("value", "si");
		var restore = document.getElementById("submit");
		restore.style.background = "#a060ff";
		restore.style.pointerEvents = "unset";
		restore.style.boxShadow = "0px 0px 30px 0px rgb(160 96 255 / 0.3)";
	}
});
window.addEventListener("load", function () {
	if ((terms.value = "no")) {
		let change = document.getElementById("submit");
		change.style.background = "#6d6d6d";
		change.style.pointerEvents = "none";
		change.style.boxShadow = "unset";
	}
});

let btn2 = document.getElementById("btn2");
let checkbox2 = document.getElementById("checkbox2");
let rect12 = document.getElementById("rect12");
let rect22 = document.getElementById("rect22");
var ads = document.getElementById("ads");

btn2.addEventListener("mousedown", animeDown2);
btn2.addEventListener("mouseup", animeUp2);
// CSS toggle functions
function animeDown2() {
	btn2.classList.toggle("h_btn");
}

function animeUp2() {
	btn2.classList.toggle("h_btn");
	checkbox2.classList.toggle("h_cb");
	rect12.classList.toggle("h_rects");
	rect22.classList.toggle("h_rects");
}
btn2.addEventListener("click", function () {
	if (checkbox2.classList.contains("h_cb")) {
		ads.setAttribute("value", "no");
	} else {
		ads.setAttribute("value", "si");
	}
});

let btn3 = document.getElementById("btn3");
let checkbox3 = document.getElementById("checkbox3");
let rect13 = document.getElementById("rect13");
let rect23 = document.getElementById("rect23");
var premium = document.getElementById("premium");

btn3.addEventListener("mousedown", animeDown3);
btn3.addEventListener("mouseup", animeUp3);
// CSS toggle functions
function animeDown3() {
	btn3.classList.toggle("h_btn");
}

function animeUp3() {
	btn3.classList.toggle("h_btn");
	checkbox3.classList.toggle("h_cb");
	rect13.classList.toggle("h_rects");
	rect23.classList.toggle("h_rects");
}
var show = document.getElementById("show");
btn3.addEventListener("click", function () {
	if (checkbox3.classList.contains("h_cb")) {
		premium.setAttribute("value", "no");
		show.style.display = "none";
		
	} else {
		premium.setAttribute("value", "si");
		show.style.display = "unset";
	}
});
