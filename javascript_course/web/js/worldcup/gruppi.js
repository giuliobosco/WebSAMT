/*
 * Copyright 2018 Giulio Bosco (giuliobva@gmail.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
/*
 * project: Worldcup
 * description: SAMT I2AA - Modulo 307 - Test 3
 *
 * author: Giulio Bosco (giuliobva@gmail.com)
 * version: 1.0
 * date: 15.50.2018
 *
 * file: app.js
 */

var groups = new Array(8);
for (i = 0; i < groups.length; i++) {
	groups[i] = new Array(4);
}
var group = 0;

function getValue(data,index,name) {
	return data[index].getElementsByTagName(name)[0].innerHTML;
}

function setTeam() {
	for (k = 0; k < groups[group].length; k++) {
		var name = groups[group][k][0];
		var logo = groups[group][k][1];
		var site = groups[group][k][2];
		
		var logoTag = '<img src="' + logo + '">';
		var nameTag = '<a target="_blank" href="' + site + '">' + name + '</a>';
		$('<div>')
			.html(logoTag + nameTag)
			.appendTo('#group-teams');
	}
}

function groupHead(data) {
	for (i = 0; i < groups.length; i++) {
		var name = getValue(data,i,'NAME');
		for (j = 0; j < groups[i].length; j++) {
			groups[i][j] = [
				data[i].getElementsByTagName('name')[j].innerHTML,
				data[i].getElementsByTagName('logo')[j].innerHTML,
				data[i].getElementsByTagName('site')[j].innerHTML
			];
		}
		
		
		$('<span>')
			.html('<input type="radio" name="group" value="'+i+'" onclick="selGroup(this)">'+name+' ')
			.appendTo('#group-head');
	}
	setTeam(groups);
}

function dataSplitter(data) {
	$('#group-head').empty().html('<h1>Group</h1>');
	$('#group-teams').empty();
	var group = $(data).find('group');
	//var stadium = $(data).find('stadium');
	
	groupHead(group);
	//stadiumHead(stadium);
}

function getGroups() {
	$.ajax({
		type: 'GET',
		url: 'worldcup.xml',
		dataType: 'xml',
		success: function (data) {
			dataSplitter(data);
		}
	});
}

var stadiums = new Array(8);
for (i = 0; i < stadiums.length; i++) {
	stadiums[i] = new Array(4);
}
var stadium = 0;

function setStadium() {
	for (k = 0; k < stadiums[stadium].length; k++) {
		var t1 = stadiums[stadium][k][0];
		var t2 = stadiums[stadium][k][1];
		var g = stadiums[stadium][k][2];
		
		var text = '<p>' + t1 + ' vs ' + t2 + ' GR ' + g + '</p>';
		$('<div>')
			.html(text)
			.appendTo('#stadium-match');
	}
}

function stadiumsHead(data) {
	for (i = 0; i < stadiums.length; i++) {
		//var name = data[stadium].getElementsByTagName('NAME')[0].innerHTML;
		var name = getValue(data,stadium,'NAME');
		var capacity = getValue(data,stadium,'capacity');
		var image = getValue(data, stadium , 'image');
		for (j = 0; j < stadiums[i].length; j++) {
			stadiums[i][j] = [
				data[i].getElementsByTagName('team1')[j].innerHTML,
				data[i].getElementsByTagName('team2')[j].innerHTML,
				data[i].getElementsByTagName('group')[j].innerHTML
			];
		}
		$('<option>')
			.attr('value',i)
			.attr('onclick','selStadium(this)')
			.text(name)
			.appendTo('#stadium-sel');
		$('#stadium-name').text(name);
		$('#stadium-cap').text(capacity);
		$('#stadium-img').attr('src',image);
	}
	setStadium();
}

function stadiumSplitter(data) {
	$('#stadium-name').empty();
	$('#stadium-sel').empty();
	$('#stadium-match').empty();
	var stadium = $(data).find('city');
	
	stadiumsHead(stadium);
}

function getStadiums() {
	$.ajax({
		type: 'GET',
		url: 'stadiums.xml',
		dataType: 'xml',
		success: function (data) {
			stadiumSplitter(data);
		}
	});
}



$(document).ready(
	function () {
		getGroups();
		getStadiums();
		
		var w = $('.stadium').first().width() / 100 * 9;
		$('.stadium').css('font-size', w + 'px');
		
		w = $('.group').first().width() / 100 * 7;
		$('.group').css('font-size', w + 'px');
		
	}
);