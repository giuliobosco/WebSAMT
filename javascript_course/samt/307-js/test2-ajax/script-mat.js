//The time zone of the current city.
var currentTimeZone = 0;
//The state of the clock, whether it has been created or not.
var createdClock = false;


//==================================== PARTE UNO =============================================

/**
 * The function createClock creates and places the clock at the top of the page
 */
function createClock() {

	//Create a paragraph that'll contain the time.
	var clockP = document.createElement("P");
	clockP.innerHTML = "show clock";
	clockP.setAttribute("id", "hideClockP");
	clockP.setAttribute("onclick", "clickedClock()");

	//Append the paragraph to the main div.
	$(".menu")[0].appendChild(clockP);

}

/**
 * The function updateTime updates the time at the top of the page.
 */
function updateTime() {

	if (createdClock) {

		var now = new Date();
		now.setHours(now.getHours() + currentTimeZone);

		var hh = now.getHours();
		var mm = now.getMinutes();

		if (hh < 10) {

			hh = "0" + hh;

		}

		if (mm < 10) {

			mm = "0" + mm;

		}

		var clock = "" + hh + ":" + mm;

		var clockP = $("#clockP");
		$("#clockP")[0].innerHTML = clock;

	}

}

/**
 * The function clickedClock removes and/or places the elements at the top of the page, such as the clock or the date.
 */
function clickedClock() {

	if ($("#hideClockP")[0].innerHTML == "show clock") {

		if ($("#dateP")[0] != undefined) {

			$("#clockSpan")[0].removeChild($("#dateP")[0]);

		}

		$("#clockSpan")[0].innerHTML = "";

		var hideClockP = $("#hideClockP")[0];
		hideClockP.innerHTML = "hide clock";

		var now = new Date();
		now.setHours(now.getHours() + currentTimeZone);
		var hh = now.getHours();
		var mm = now.getMinutes();

		if (hh < 10) {

			hh = "0" + hh;

		}

		if (mm < 10) {

			mm = "0" + mm;

		}

		var clock = "" + hh + ":" + mm;

		var clockP = document.createElement("P");
		clockP.innerHTML = clock;
		clockP.setAttribute("id", "clockP");
		$("#clockSpan")[0].appendChild(clockP);
		createdClock = true;

	} else {

		$("#clockSpan")[0].removeChild($("#clockP")[0]);

		var hideClockP = $("#hideClockP")[0];
		hideClockP.innerHTML = "show clock";

		var today = new Date();

		today.setHours(today.getHours() + currentTimeZone);
		var day = today.getDay() + 1;
		var dd = today.getDate();
		var mm = today.getMonth() + 1;
		var yyyy = today.getFullYear();

		if (dd < 10) {

			dd = "0" + dd;

		}

		switch(day) {

			case 1:
				day = "LunedÃ¬";
				break;

			case 2:
				day = "MartedÃ¬";
				break;

			case 3:
				day = "MercoledÃ¬";
				break;

			case 4:
				day = "GiovedÃ¬";
				break;

			case 5:
				day = "VenerdÃ¬";
				break;

			case 6:
				day = "Sabato";
				break;

			case 7:
				day = "Domenica";
				break;

		}

		switch(mm) {

			case 1:
				mm = "Gennaio";
				break;

			case 2:
				mm = "Febbraio";
				break;

			case 3:
				mm = "Marzo";
				break;

			case 4:
				mm = "Aprile";
				break;

			case 5:
				mm = "Maggio";
				break;

			case 6:
				mm = "Giugno";
				break;

			case 7:
				mm = "Luglio";
				break;

			case 8:
				mm = "Agosto";
				break;

			case 9:
				mm = "Settembre";
				break;

			case 10:
				mm = "Ottobre";
				break;

			case 11:
				mm = "Novembre";
				break;

			case 12:
				mm = "Dicembre";
				break;

		}

		var date = "" + day + ", " + dd + " " + mm + " " + yyyy;


		var dateP = document.createElement("P");
		dateP.innerHTML = date;
		dateP.setAttribute("id", "dateP");
		$("#clockSpan")[0].appendChild(dateP);
		createdClock = false;

	}

}

/**
 * Call the updateTime function every 500 ms.
 */
setInterval(updateTime, 500);



//==================================== PARTE DUE =============================================
//The current background of the main div.
var currentBG = "citybw.jpg";

const BERNBG = "bg_bern.png";
const DAMABG = "bg_damascus.jpg";
const SHANBG = "bg_shanghai.png";
const DUBABG = "bg_dubai.jpg";

const BERNINDEX = 3;
const DAMAINDEX = 0;
const SHANINDEX = 1;
const DUBAINDEX = 2;

/**
 * The function hoverBern changes the background of the main div with a picture of Bern.
 */
function hoverBern() {
	$("#main").css("background-image", "url("+ BERNBG + ")");
}

/**
 * The function hoverDamascus changes the background of the main div with a picture of Damascus.
 */
function hoverDamascus() {
	$("#main").css("background-image", "url("+ DAMABG + ")");
}

/**
 * The function hoverShanghai changes the background of the main div with a picture of Shanghai.
 */
function hoverShanghai() {
	$("#main").css("background-image", "url("+ SHANBG + ")");
}

/**
 * The function hoverDubaichanges the background of the main div with a picture of Dubai.
 */
function hoverDubai() {
	$("#main").css("background-image", "url("+ DUBABG + ")");
}

/**
 * The function resetBG changes the background of the main div with a picture of the last selected city.
 */
function resetBG() {
	$("#main").css("background-image", "url(" + currentBG + ")");;
}

/**
 * The function setBern changes the content of the main div and the left aside with content relative to Bern.
 */
function setCity(city) {

	switch(city) {

		case 0:
			var bg = DAMABG;
			var index = DAMAINDEX;
			currentTimeZone = 1;
			break;

		case 1:
			var bg = SHANBG;
			var index = SHANINDEX;
			currentTimeZone = 7;
			break;

		case 2:
			var bg = DUBABG;
			var index = DUBAINDEX;
			currentTimeZone = 2;
			break;

		case 3:
			var bg = BERNBG;
			var index = BERNINDEX;
			currentTimeZone = 0;
			break;

	}

	$("#main").css("background-image", "url(" + bg + ")");
	currentBG = bg;

	startXhttp(index);

	updateTime();
	if ($("#clockSpan").html() != "clock") {

		clickedClock();
		clickedClock();

	}

}

function startXhttp(index) {

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {

			readXml(this, index);

		}

	};

	xhttp.open("GET", "capital.xml", true);
	xhttp.send();

}

function readXml(xml, index) {


	var xmlDoc = xml.responseXML;

	var cityName = xmlDoc.getElementsByTagName("NAME")[index].childNodes[0].nodeValue
	var cityDesc = xmlDoc.getElementsByTagName("TOWN")[index].childNodes[0].nodeValue;

	var mainContent = "<h1>" + cityName + "</h1><p>" + cityDesc + "</p>";
	var area = xmlDoc.getElementsByTagName("AREA")[index].childNodes[0].nodeValue;
	var population = xmlDoc.getElementsByTagName("POPULATION")[index].childNodes[0].nodeValue;
	var etimology = xmlDoc.getElementsByTagName("ETYMOLOGY")[index].childNodes[0].nodeValue;

	writeToHTML(mainContent, area, population, etimology);

}

function writeToHTML(main, area, population, etimology) {

	$("#main").html(main);

	$("#what").html("Area");
	$("#whatP").html(area);

	$("#where").html("Population");
	$("#whereP").html(population);

	$("#how").html("Etimology");
	$("#howP").html(etimology);

}