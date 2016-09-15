		var together = new Date();
		together.setFullYear(2015,1,-25-1);//最后一页的时间 年,月,
		together.setHours(0);
		together.setMinutes(0);
		together.setSeconds(0);
		together.setMilliseconds(0);
	      timeElapse(together);
			setInterval(function () {
				timeElapse(together);
			}, 500);
			
			
			
//		┈━═☆版权所有 Qq:1243894999