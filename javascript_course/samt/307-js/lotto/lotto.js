var nums = [];
const maxNums = 5;
var stars = [];
const maxStars = 2;

var games = 50;

function selectNum(i) {
	if (nums.length < maxNums) {
		var checked = true;
		for (j = 0; j < nums.length && checked; j++) {
			for (k = 0; k < nums.length && checked; k++) {
				if (nums[j] == nums[k]) {
					checked = false;
				} else {
					checked = true;
				}
			}
			if (nums[j] == i) {
				checked = false;
			} else {
				checked = true;
			}
		}
		if (checked) {
			$('#bNum' + i).css('background-color', '#888');
			$('#yourNum' + nums.length)
				.removeClass('hide')
				.show()
				.val(i);
			nums[nums.length] = i;
		}
	}
}

function selectStar(i) {
	if (stars.length < maxStars) {
		var checked = true;
		for (j = 0; j < stars.length && checked; j++) {
			for (k = 0; k < stars.length && checked; k++) {
				if (nums[j] == nums[k]) {
					checked = false;
				} else {
					checked = true;
				}
			}
			if (stars[j] == i) {
				checked = false;
			} else {
				checked = true;
			}
		}
		if (checked) {
			$('#bStar' + i).css('background-color', '#888');
			$('#yourStar' + stars.length)
				.removeClass('hide')
				.show()
				.val(i);
			stars[stars.length] = i;
		}
	}
}

function play() {
	
	console.log("o");
	if (nums.length == maxNums && stars.length == maxStars) {
		for (i = 0; i < 50; i++) {
			
			$('<tr>')
				.attr('id','game'+i)
				.html(
					'<td>' + (i+1) + '</td>' +
					'<td><span id="game'+ i + 'N0"></span><span id="game'+ i + 'N1"></span><span id="game'+ i + 'N2"></span><span id="game'+ i + 'N3"></span><span id="game'+ i + 'N4"></span></td>' +
					'<td><span id="game'+ i + 'S0"></span><span id="game'+ i + 'S1"></span></td>' +
					'<td id="points' + i +'"></td>')
				.appendTo('#games');
			
			var rndNum = [];
			for (j = 0; j < maxNums; j++) {
				rndNum[j] = Math.floor((Math.random() * 50) + 1);
				if (nums[j] == rndNum[j]) {
					if (rndNum[j] < 10) {
						$('#game' + i + 'N' + j).html('<b style="color:green">' + rndNum[j] + '</b>&nbsp;&nbsp;&nbsp;');
					} else {
						$('#game' + i + 'N' + j).html('<b style="color:green">' + rndNum[j] + '</b>&nbsp;');
					}
				} else {
					if (rndNum[j] < 10) {
						$('#game' + i + 'N' + j).html(rndNum[j] + '&nbsp;&nbsp;&nbsp;');
					} else {
						$('#game' + i + 'N' + j).html(rndNum[j] + '&nbsp;');
					}
				}
			}
			var rndStar = [];
			for (j = 0; j <maxStars; j++) {
				rndStar[j] = Math.floor((Math.random() * 12) + 1);
				if (stars[j] == rndStar[j]) {
					if (rndStar[j] < 10) {
						$('#game' + i + 'S' + j).html('<b style="color:green">' + rndStar[j] + '</b>&nbsp;&nbsp;&nbsp;');
					} else {
						$('#game' + i + 'S' + j).html('<b style="color:green">' + rndStar[j] + '</b>&nbsp;');
					}
				} else {
					if (rndStar[j] < 10) {
						$('#game' + i + 'S' + j).html(rndStar[j] + '&nbsp;&nbsp;&nbsp;');
					} else {
						$('#game' + i + 'S' + j).html(rndStar[j] + '&nbsp;');
					}
				}
				
				
			}
			
			
		}
	} else {

	}
}