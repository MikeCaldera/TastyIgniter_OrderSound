<!DOCTYPE html>
<html>
<head>
	<title>My Orders Page</title>
	<style>
		#oldest-order {
			font-size: 2em;
			color: red;
		}
	</style>
	<link href="/themes/tastyigniter-orange/assets/css/app.css" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
<body>
	<div class="row-fluid">
		{!! $this->renderList() !!}
	</div>
	<audio id="order-received" src="/app/admin/views/orders/order_received.mp3"></audio>
	<audio id="order-delayed" src="/app/admin/views/orders/LateAlert.mp3"></audio>
	<audio id="order-wrong-price" src="/app/admin/views/orders/price_is_wrong.mp3"></audio>
	<div style="text-align: center; margin-bottom: -5rem; padding-top: 1.5rem;">
		<h2>Auto refresh in <span id="countdown"></span> seconds</h2>
	</div>
	<script type="text/JavaScript">
		// Function to refresh the page automatically every 30 seconds
		function timedRefresh(timeoutPeriod) {
			var timer = setInterval(function() {
				if (timeoutPeriod > 0) {
					timeoutPeriod -= 1;
					document.getElementById("countdown").innerHTML = timeoutPeriod;
				} else {
					clearInterval(timer);
					location.reload();
				};
			}, 1000);
		}
		timedRefresh(30);

		// Function to play a sound
		function playSound(sound) {
			var audio = document.getElementById(sound);
			if (audio.paused) {
				audio.play();
			}
		}

		// Function to calculate the difference in minutes between the current time and an order time
		function timeDiff(orderTime) {
    		var now = new Date().getTime(); // Get current time in milliseconds
    		var orderTimestamp = new Date(orderTime).getTime(); // Convert orderTime to milliseconds
    		var diffMillisec = now - orderTimestamp; // Calculate the difference in milliseconds
    		return (diffMillisec / (1000 * 60)); // Convert to minutes and return
		}

		// Function to check for new orders and play notification sounds if necessary
		function checkNewOrders() {
  			var statusEls = document.getElementsByClassName("list-col-name-status-name");
  			var timeEls = document.getElementsByClassName("list-col-name-order-time");

  			for (var i = 0; i < statusEls.length; i++) {
    		if (statusEls[i].innerText.trim() === "Received - Step 1") {
      	playSound("order-received");
      		break;
    	} else if (statusEls[i].innerText.trim() === "Pending - Step 2" && timeDiff(timeEls[i].innerText) > 2) {
      	playSound("order-delayed");
      		break;
    	} else if (statusEls[i].innerText.trim() === "Preparation - Step 3" && timeDiff(timeEls[i].innerText) > 5) {
      	playSound("order-wrong-price");
      		break;
    }
  }
}

		// Check for new orders every 5 seconds
		setInterval(checkNewOrders, 5000);

</script>
</body>
</html>
