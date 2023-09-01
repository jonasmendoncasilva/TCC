function abrirnav(icone) {
    document.getElementById("side-nav").style.width = "280px";

    document.getElementById("icone").style = "transform: rotate(-90deg);";
    icone.setAttribute("onclick","fecharnav(this)");
}

function fecharnav(icone) {
    document.getElementById("side-nav").style.width = "0";

    document.getElementById("icone").style = "transform: rotate(0deg);";
    icone.setAttribute("onclick","abrirnav(this)");
}

function abreindex(){
    window.location.href = "index.php";
}

const round = (num, places) => {
	if (!("" + num).includes("e")) {
		return +(Math.round(num + "e+" + places)  + "e-" + places);
	} else {
		let arr = ("" + num).split("e");
		let sig = ""
		if (+arr[1] + places > 0) {
			sig = "+";
		}

		return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + places)) + "e-" + places);
	}
}
