// info for button file.
const inputFile = document.querySelector("#file");
const buttonFile = document.querySelector(".button-file");
const publish = document.querySelector('.button');
let buttonCont = buttonFile.innerHTML;

publish.addEventListener("click", function (e) {
	if (buttonFile.innerHTML != 'File selected') {
		alert('You forgot to add an image!');
		publish.disabled = true;
	}
});

inputFile.addEventListener("change", function (e) {
	if (this.files.length > 0) {
		buttonFile.innerHTML = 'File selected';
		publish.disabled = false;
	} else {
		buttonFile.innerHTML = buttonCont ;
		publish.disabled = true;
	}
}, false);
