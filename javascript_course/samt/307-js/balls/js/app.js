/**
 * @author Giulio Bosco (giuliobva@gmail.com)
 * @version x.y
 */

//var h = b.clientHeight;
var h = getClientHeight();
//var w = b.clientWidth;
var w = getClientWidth();

var ballH;
var ballW;

var mh;
var mw;

var ballsY;
var ballsX;
var ballsXDir;
var ballsYDir;

var usedBalls = new Array(1,1);
var firstBall = 16;
var lastBall = 1;

var clock;
var clockRate;

function start() {
	adaptBallsSize();
	
	ballsX = new Array(1,200);
	ballsY = new Array(1,700);
	ballsXDir = new Array(true,true);
	ballsYDir = new Array(true,true);
	
	for (i = 0; i < usedBalls.length; i++) {
		usedBalls[i] = null;
	}
	$('#b1').attr('src', selectBall());
	
	clockRate = 7;
	clock = setInterval(move, 1 * clockRate);
}

function adaptBallsSize() {
	ballH = $('#b0').height();
	ballW = $('#b0').width();
	
	mh = h - ballH;
	mw = w - ballW;
}

function move() {
	checkPositions();
	
	for (i = 0; i < ballsX.length; i++) {
		if (ballsXDir[i]) {ballsX[i]++;}
		else {ballsX[i]--;}
		
		if (ballsYDir[i]) {ballsY[i]++;}
		else {ballsY[i]--;}
		
		$('#b' + i)
			.css('left', ballsX[i] + 'px')
			.css('top', ballsY[i] + 'px');
	}
}

function checkPositions() {
	for (i = 0; i < ballsX.length; i++) {
		if (ballsX[i] >= mw) {
			
			ballsXDir[i] = false;
			ballsX[i]--;
			ballsX[i]--;
		} else if (ballsX[i] <= 0) {
			ballsXDir[i] = true;
			ballsX[i]++;
			ballsX[i]++;
		}
		if (ballsY[i] >= mh) {
			ballsYDir[i] = false;
			ballsY[i]--;
			ballsY[i]--;
		} else if (ballsY[i] <= 0) {
			ballsYDir[i] = true;
			
			ballsY[i]++;
			ballsY[i]++;
		}
	}
}

function selectBall() {
	
	for (i = 0; i < usedBalls.length; i++) {
		var s = getRandom(firstBall, lastBall);
		if (usedBalls != s) {
			return 'img/' + s + '.png';
		}
	}
}

function addBall() {
	/*if (ballsX.length == 2) {
		$('<img>').addClass('ball')
			.attr('id','b1')
			.attr('src',selectBall())
			.appendTo('body');
	}*/
	if($("#b1").length == 0) {
		$('<img>').addClass('ball')
			.attr('id','b1')
			.attr('src',selectBall())
			.appendTo('body');
	} else {
		var c = ballsX.length;
		
		for (j = 0; j < c; j++) {
			ballsX[ballsX.length] = getRandom(10, 1000);
			ballsY[ballsY.length] = getRandom(10, 500);
			ballsXDir[ballsXDir.length] = bitToBool(getRandom(0,1));
			ballsYDir[ballsYDir.length] = bitToBool(getRandom(0,1));
			$('<img>').addClass('ball')
				.attr('id', 'b' + (ballsX.length - 1))
				.attr('src', selectBall())
				.appendTo('body');
		}
	}
	
	
	$('.ball').css('width', $('#b0').width() / 2);
	
	clockRate /= 2;
	
	adaptBallsSize();
}