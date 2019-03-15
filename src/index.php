<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>CZ3006 Assignment 2</title>
	</head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
  </style>
	<body>
		<?php
			// define variables and set to empty values
			$banana = $apple = $orange = $payment = $username = "";
			$total = 0;
			$submited = false;

			function clean($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$banana = clean($_POST["banana"]);
				$apple = clean($_POST["apple"]);
				$orange = clean($_POST["orange"]);
				$total = 69 * intval($apple) + 59 * intval($orange) + 39 * intval($banana);
				$payment = clean($_POST["payment"]);
				$username = clean($_POST["username"]);
				$submited = true;

				$file = fopen('update.txt', 'w') or die("Unable to open file!");
				$text = "Total number of apples: $apple\n";
				$text .= "Total number of bananas: $banana\n";
				$text .= "Total number of oranges: $orange\n";
				fwrite($file, $text);
				fclose($file);
			}
    ?>
		<h1>Form</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="mySubmit();" method='POST'>
      <label for="username">Username</label>
      <input autocomplete="off" type="text" id="username" name="username">
      <br>
      
			<label for="apple">Apple</label>
			<input autocomplete="off" required name="apple" onchange="computeTotal()" id="apple"> @69
			<br>

			<label for="orange">Orange</label>
			<input autocomplete="off" required name="orange" onchange="computeTotal()" id="orange"> @59
			<br>


			<label for="banana">Banana</label>
			<input autocomplete="off" required name="banana" id="banana" onchange="computeTotal()"> @39
			<br>

      <label>Payment</label>
			<input type="radio" name="payment" value="Visa" />Visa
			<input type="radio" name="payment" value="MasterCard" />MasterCard
			<input type="radio" name="payment" value="Discover" />Discover

			<br />
			<label for="total">Total</label>
			<input type="text" name="total" onfocus="blurTotal()" />
			<br>
			<button type="submit">Submit</button>
		</form>

		<table>
      <tr>
        <th>Item</th>
        <th>Amount (cents)</th>
      </tr>
      <?php
      if ($submited) {
          echo "<p>Username: $username</p>";
          echo "<p>Payment method: $payment</p>";

          echo "<tr>";
          echo "<td>Apple</td>";
          echo "<td>$apple</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>Banana</td>";
          echo "<td>$banana</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>Orange</td>";
          echo "<td>$orange</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td><strong>Total</strong></td>";
          echo "<td><strong>$total</strong></td>";
          echo "</tr>";
      }
      ?>
		</table>

		<script src="./index.js"></script>
	</body>
</html>
