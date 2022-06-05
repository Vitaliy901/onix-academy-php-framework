let one = document.querySelector('#one');
let two = document.querySelector('#two');
let three = document.querySelector('#three');

setTimeout(function () {
	setInterval(function () {
		if (one.checked) {
			two.checked = true;
			one.checked = false;
			return;
		} 
		if (two.checked) {
			three.checked = true;
			two.checked = false;
			return;
		}
		if (three.checked) {
			one.checked = true;
			three.checked = false;
			return;
		}
	}, 7000);
},1000);

