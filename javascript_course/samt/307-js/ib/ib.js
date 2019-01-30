function checkString() {
	var string = $("#text").val();

	if (string.length > 0 && isLetter(string)){
//		$("#check").attr('disabled', 'false').val("ciao");
		document.getElementById('check').disabled = false;
		//alert(string);
	}
}

function run() {
	var string = $("#text").val();

	if (string.length > 0 && isPalindrome(string)) {
		$("#palindrome").text(string).css('color','#0f0');
	}else {
		$("#palindrome").text(string).css('color','#f00');
	}

	$("#farfallino").html(farfallinatore(string));
}

function isPalindrome(string) {
	var is = true;

	for (i = 0; i <= string.length - 1; i++){
		if(string.charAt(i) != string.charAt(string.length - 1 - i)){
			return false;
			//i = string.length;
		}
	}

	return true;
}

function isLetter(s) {
	return s.match("^[a-zA-Z\(\)]+$");
}

function isVowel(c) {
	var charN = c.charCodeAt(0);

	if ((charN > 64 && charN < 91) || (charN > 96 && charN < 123)) {
		if (charN == 65 || charN == 69 || charN == 73 || charN == 79 || charN == 85 || charN == 97 || charN == 101 || charN == 105 || charN == 111 || charN == 117) {
			return true;
		}
		else {
			return false;
		}

	}
	else {
		return false;
	}
}

function farfallinatore(string) {
	var ret = "";
	for (var i = 0; i < string.length; i++) {    // caratteri
		var c = string.charAt(i);
		if (isVowel(c)) {
			ret = ret + c + "f<b>" + c + "</b>";
		}
		else {
			ret = ret + c;
		}
	}

	return ret;
}
