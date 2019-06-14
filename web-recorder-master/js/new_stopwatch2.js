var	clsStopwatch2 = function() {
		// Private vars
		var	startAt2	= 0;	// Time of last start / resume. (0 if not running)
		var	lapTime2	= 0;	// Time on the clock when last stopped in milliseconds
		var stopTime;	// stop time checking
		// var regExp; 
		// var exc_$time2.innerHTML;
		// var exc_stopTime;

		var	now2	= function() {
				return (new Date()).getTime(); 
			}; 
 
		// Public methods
		// Start or resume
		this.start2 = function() {
				startAt2	= startAt2 ? startAt2 : now2();
			};

		// Stop or pause
		this.stop2 = function() {
				// If running, update elapsed time otherwise keep it
				lapTime2	= startAt2 ? lapTime2 + now2() - startAt2 : lapTime2;
				startAt2	= 0; // Paused
			};

		// Reset
		this.reset2 = function() {
				lapTime2 = startAt2 = 0;
			};

		// Duration
		this.time2 = function() {
				return lapTime2 + (startAt2 ? now2() - startAt2 : 0); 
			};
	};

var x2 = new clsStopwatch2();
var $time2;
var clocktimer2;

function pad2(num2, size2) {
	var s2 = "0000" + num2;
	return s2.substr(s2.length - size2);
}

function formatTime2(time2) {
	var h2 = m2 = s2 = ms2 = 0;
	var newTime2 = '';

	h2 = Math.floor( time2 / (60 * 60 * 1000) );
	time2 = time2 % (60 * 60 * 1000);
	m2 = Math.floor( time2 / (60 * 1000) );
	time2 = time2 % (60 * 1000);
	s2 = Math.floor( time2 / 1000 );
	ms2 = time2 % 1000;

	/*newTime = pad(h, 2) + ':' + pad(m, 2) + ':' + pad(s, 2) + ':' + pad(ms, 3);*/
	newTime2 = pad2(m2, 2) + ':' + pad2(s2, 2) + ':' + pad2(ms2, 2);
	return newTime2;
}

function show2() {
	$time2 = document.getElementById('time2');
	update2();
}

function update2() {
	//stop2();
	
	$time2.innerHTML = formatTime2(x2.time2());
	if($time2.innerHTML == stopTime){
		stop2();
	}



	//alret("exc:"+xc_$time2.innerHTML+","+exc_stopTime);

	
	var time_box = $time2.innerHTML;
	//alert("stop_time:"+stopTime);
	//alert("update_stop time:"+stopTime);
	//var time2_innerHTML = String($time2.innerHTML).substing()
	

	 // var regExp = ":";
	 // var exc_$time2_innerHTML = time_box.replace(regExp,"");// 이놈 이랑 밑에놈 있으면 재생 타이머 안돌아감
	 // var exc_stopTime = stopTime.replace(regExp,"");//
	 //alret("exc:"+exc_$time2_innerHTML+","+exc_stopTime);

	// if(parseInt(exc_$time2.innerHTML) >= parseInt(exc_stopTime)){
	// 	stop2();
	// }
	// if($time2.innerHTML == stopTime){
	// 	stop2();
	// }

	//alert("$time2.innerHTML:"+$time2.innerHTML);
	
}

function start2() {
	//alert("reset2_time:"+stopTime);
	clocktimer2 = setInterval("update2()", 1);
	x2.start2();
	
	//return $time2.innerHTML;
	//alert("stop time:"+stopTime);
}

function stop2() {
	x2.stop2();
	clearInterval(clocktimer2);
	//alert("stop time:"+$time.innerHTML);
	//alert("테스트 텍스트"+test_text);
}

function reset2(time) {
	// regExp = :;
	// exc_$time2.innerHTML = time_box.replace(regExp,"");
	// exc_stopTime = stopTime.replace(regExp,"");


	stopTime = time;
	stop2();
	x2.reset2();
	update2();
}
