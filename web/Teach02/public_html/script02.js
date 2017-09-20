function clickFunction() {
	alert("Clicked!");
}

function colorSwitch() {
	var color = "divColor";
        var divID = "DIV1";
        var div = document.getElementById(divID);
	var userInput = document.getElementById(color);

	var color = userInput.value;
	div.style.backgroundColor = color;
}
