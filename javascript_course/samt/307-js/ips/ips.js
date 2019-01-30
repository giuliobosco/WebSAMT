function color() {
    var s = rgbToHEXString(red, green, blue);
    $("#color").text(s).css('color', s);
    $("#with-colors").css('color', '' + s);
    console.log($('#with-colors').attr('style'));
}

function rgbToHEXString(r, g, b) {
    var hex = "#";

    if (r.toString(16).length < 2){
        hex += "0";
    }
    hex += r.toString(16);
    if (g.toString(16).length < 2){
        hex += "0";
    }
    hex += g.toString(16);
    if (b.toString(16).length < 2){
        hex += "0";
    }
    hex += b.toString(16);

    return hex;
}

var red = 0;
var green = 0;
var blue = 0;

function addRed(x) {
    red = (red + x) % 255;
    color();
}

function addGreen(x) {
    green = (green + x) % 255;
    color();
}

function addBlue(x) {
    blue = (blue + x) % 255;
    color();
}

var colorIncrement = 5;

function changeIncrement() {
    colorIncrement = $("#increment").val();
}

function checkString() {
    var string = $("#s").val();
    for (i = 0; i < string.length; i++) {
        if (string.charAt(i) == '0' ||
            string.charAt(i) == '1' ||
            string.charAt(i) == '2' ||
            string.charAt(i) == '3' ||
            string.charAt(i) == '4' ||
            string.charAt(i) == '5' ||
            string.charAt(i) == '6' ||
            string.charAt(i) == '7' ||
            string.charAt(i) == '8' ||
            string.charAt(i) == '9') {
            string = "";
            $("#s").val(string);
            $("#text").css('display', 'none');
        }
    }
    if (string.length > 0) {
        $("#help").css('display', 'none');
        $("#text").css('display', 'block');
        $("#upper-case").text(string.toUpperCase());
        $("#no-spaces").text(string.toLowerCase().replace(/ /g,""));
        $("#with-colors").text(string);
        color();
    }else {
        $("#help").css('display', 'block');
	    $("#text").css('display', 'none');
    }
}