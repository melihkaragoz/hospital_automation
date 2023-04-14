function new_appointment(username) {
	document.getElementsByClassName("index-main")[0].style.display = "none";
	document.getElementsByClassName("index-new-app")[0].style.display = "block";
	document.getElementsByClassName("back")[0].style.display = "block";
}


function get_appointments(username) {
	document.getElementsByClassName("index-main")[0].style.display = "none";
	document.getElementsByClassName("index-new-app")[0].style.display = "none";
	document.getElementsByClassName("index-my-apps")[0].style.display = "block";
	document.getElementsByClassName("back")[0].style.display = "block";
}

function go_back() {
	document.getElementsByClassName("index-main")[0].style.display = "block";
	document.getElementsByClassName("index-new-app")[0].style.display = "none";
	document.getElementsByClassName("index-my-apps")[0].style.display = "none";
	document.getElementsByClassName("back")[0].style.display = "none";
}
