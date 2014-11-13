<!-- Test PHP Script -->
<html> <!-- Start out with normal HTML style tags -->
	<head>
		<title>Test</title>
	</head>
	<body>
	</p>Testing PHP</p>
	<!-- Begin parsing as PHP -->
	<?php /* This tag starts PHP code */
		//PHP uses C-style comments
		function test_func() { // Defines a function called test_func
			echo "<p>Should output 42</p>\n";
			/* Echo causes the argument to be output to the HTML,
			So the above line will appear in the HTML source */
			$num = 42; // PHP variables begin with $ and are dynamically-typed
						//Sorry Jamie :(
			echo "<p>$num</p>\n";
		}
		test_func();
	?> <!-- Close the php tag -->
	<p>End Test</p>
	</body>
</html>