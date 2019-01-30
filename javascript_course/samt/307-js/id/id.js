var mybudget = 50;
var tableBudget = 50;
var myGamebudget = 0;

var myPoints = 50;
var tablePoints = 50;

function setup() {
    var d = new Date("2000-01-01");
    setMyBudget(mybudget);
    changeMyBet(0)
}

function changeMyBet(bet) {
    $('#myBet').val(bet);
    myGamebudget = parseInt(bet);
    setMyBudget(myGamebudget);
}

function setMyBudget() {
    $('.mybudget').html(mybudget + "&dollar;");
    $(".table-budget").html(tableBudget + "&dollar;");

    $(function () {

        var $quote = $(".mybudget");

        var $numWords = $quote.text().length;

        if (($numWords >= 1) && ($numWords < 4)) {
            $quote.css("font-size", "118px");
        } else if (($numWords >= 4) && ($numWords < 5)) {
            $quote.css("font-size", "96px");
        } else if (($numWords >= 5) && ($numWords < 6)) {
            $quote.css("font-size", "70px");
        } else if (($numWords >= 6) && ($numWords < 7)) {
            $quote.css("font-size", "58px");
        } else if (($numWords >= 7) && ($numWords < 8)) {
            $quote.css("font-size", "48px");
        } else if (($numWords >= 8) && ($numWords < 9)) {
            $quote.css("font-size", "40px");
        } else if (($numWords >= 9) && ($numWords < 10)) {
            $quote.css("font-size", "36px");
        } else if (($numWords >= 10) && ($numWords < 11)) {
            $quote.css("font-size", "32px");
        } else {
            $quote.css("font-size", "30px");
        }
    });
}

function setPoints() {
    $('#u-score').text(myPoints);
    $('#t-score').text(tablePoints);
}

function gameLess() {
    var p1 = getRandomInt(1,6);
    var p2 = getRandomInt(1,6);
    var t1 = getRandomInt(1,6);
    var t2 = getRandomInt(1,6);

    var p = p1 + p2;
    var t = t1 + t2;

    if (p > t) {
        myPoints += 10;
    } else if (p < t) {
        tablePoints += 10;
    } else {
        gameLess();
    }

    setPoints();
}

function game() {
    var p1 = getRandomInt(1,6);
    var p2 = getRandomInt(1,6);
    var t1 = getRandomInt(1,6);
    var t2 = getRandomInt(1,6);

    var p = p1 + p2;
    var t = t1 + t2;

    if (p > t) {
        tableBudget -= myGamebudget;
        mybudget += myGamebudget;

        myPoints += 10;
    } else if (p < t) {
        tableBudget += myGamebudget;
        mybudget -= myGamebudget;

        tablePoints += 10;
    } else game();

    setPoints();
    setMyBudget();

    $('#myRange').attr('max', mybudget);

    if (tableBudget <= 0) {
        $('#u-win').css('display', 'block').css('opacity', '1');
    } else if (mybudget <= 0) {
        $('#t-win').css('display', 'block').css('opacity', '1');
    }
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function playAgainTable() {
    mybudget = 50;
    tableBudget = 60;
    tablePoints += 10;

    setMyBudget();

    $('#t-win').css('display','none').css('opacity','0');
}

function playAgainMy() {
    mybudget = 60;
    tableBudget = 50;
    myPoints += 10;

    setMyBudget();

    $("#u-win").hide().css('opacity', '0');
}

function check() {
    var dString = $('#tday').val();
    if (isValidDate(dString)) {

        var playerDate = new Date(dString);

        var today = new Date();
        var m = today.getMonth()+1;
        var d = today.getDay();
        var y = today.getFullYear()-18;

        var todayLess18 = new Date(y,m,d);

        if(todayLess18 >= playerDate) {
            $('#asker').css('opacity', '0');
            setTimeout(function(){
                $('#asker').css('display','none');
                }, 3000);
        } else {
            $('.money').hide();
            $('.table-budget-box').hide();
            $('#go').attr('onclick','gameLess()');

            $('#asker').css('opacity', '0');
            setTimeout(function(){
                $('#asker').css('display','none');
            }, 3000);
        }
    } else  {
        $('#wrong-date').html('<b>This date is not valid.</b><br>Date example: 1970-01-01');
        //alert("This date is not valid.\nDate example: 1970-01-01");
    }
}

function isValidDate(dateString) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if(!dateString.match(regEx)) return false;  // Invalid format
    var d = new Date(dateString);
    if(!d.getTime() && d.getTime() !== 0) return false; // Invalid date
    return d.toISOString().slice(0,10) === dateString;
}

