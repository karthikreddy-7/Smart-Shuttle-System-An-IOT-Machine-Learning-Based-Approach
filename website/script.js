function validateForm() {
	var username = document.forms["rechargeForm"]["username"].value;
	var amount = document.forms["rechargeForm"]["amount"].value;

	if (username == "") {
		alert("Please enter your username.");
		return false;
	}

	if (amount == "") {
		alert("Please enter the recharge amount.");
		return false;
	}

	if (isNaN(amount)) {
		alert("Please enter a valid amount.");
		return false;
	}
}
