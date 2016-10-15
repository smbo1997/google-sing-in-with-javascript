
<!DOCTYPE html>
<html>
	<head>
		<script src="jquery.min.js"></script>
		<meta name="google-signin-client_id" content="Client_Id.apps.googleusercontent.com">
		<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
	</head>
	<body>
		<div class="g-signin2" data-width="308" data-height="34"  data-longtitle="true" data-theme="dark" onclick="google_login()" data-theme="dark"></div>
	</body>
</html>

	<script>
	function google_login() {
 			gapi.client.load('plus', 'v1', function () {
				var request = gapi.client.plus.people.get({
					'userId': 'me'
				});
				//Display the user details
				request.execute(function (resp) {
					$.ajax({
						url: 'url.php',
						type: 'POST',
						data: {
							id: resp.id, 
							email: resp.emails[0].value, 
							name: resp.name.givenName, 
							lastname: resp.name.familyName
						},
						success: function (data) {
							var jsonData = $.parseJSON(data);
							if (jsonData.userid.length > 0) {
							  //Display the user details
							}
						}
					});
				});
			});
}
	</script>