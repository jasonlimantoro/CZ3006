<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
		<title>CZ3006 Assignment 2</title>
	</head>
	<body>
		<?php
      $data = [0, 0, 0];
      if ($file = fopen('order.txt', 'r')){
        // apple, banana, orange
        $i = 0;
        while(!feof($file)) {
          $numbers = [];
          $line = fgets($file);
          preg_match("/\d+/", $line, $numbers);
          $data[$i] = $numbers[0];
          $i++;
        }
        fclose($file);
      }
			$banana = $apple = $orange = $payment = $username = 0;
			$total = $totalAmount = 0;
			$submited = false;

			function clean($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $apple = intval(clean($_POST["apple"]));
				$banana = intval(clean($_POST["banana"]));
				$orange = intval(clean($_POST["orange"]));
				$totalAmount = intval($banana) + intval($apple) + intval($orange);
				$total = 69 * intval($apple) + 59 * intval($orange) + 39 * intval($banana);
				$payment = clean($_POST["payment"]);
				$username = clean($_POST["username"]);
				$submited = true;

				$file = fopen('order.txt', 'w') or die("Unable to open file!");
        $totalApple = $data[0] + $apple;
        $totalBanana = $data[1] + $banana;
        $totalOrange = $data[2] + $orange;
				$text = "Total number of apples: $totalApple\n";
				$text .= "Total number of bananas: $totalBanana\n";
				$text .= "Total number of oranges: $totalOrange";
				fwrite($file, $text);
				fclose($file);
			}
    ?>
    <div class="container web-container">
      <div class="grid-container">
        <div class="form-container">
          <h2>Place your order</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="mySubmit();" method='POST'>
            <div class="form-group">
              <label for="username">Username:</label>
              <input
                placeholder="Enter username"
                class="form-control"
                autocomplete="off"
                type="text"
                id="username"
                name="username"
              >
            </div>

            <div class="form-group">
              <label for="apple">Apple:</label>
              <div class="input-group">
                <input
                  placeholder="Enter amount"
                  class="form-control"
                  autocomplete="off"
                  required
                  name="apple"
                  onchange="computeTotal()"
                  id="apple"
                >
                <div class="input-group-append">
                  <div class="input-group-text">@69</div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="orange">Orange:</label>
              <div class="input-group">
                <input
                  placeholder="Enter amount"
                  class="form-control"
                  autocomplete="off"
                  required
                  name="orange"
                  onchange="computeTotal()"
                  id="orange"
                >
                <div class="input-group-append">
                  <div class="input-group-text">@59</div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="banana">Banana:</label>
              <div class="input-group">
                <input
                  placeholder="Enter amount"
                  class="form-control"
                  autocomplete="off"
                  required
                  name="banana"
                  id="banana"
                  onchange="computeTotal()"
                >
                <div class="input-group-append">
                  <div class="input-group-text">@39</div>
                </div>
              </div>
            </div>

            <label>Payment Options: </label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="payment" id="inlineRadio1" value="Visa">
              <label class="form-check-label" for="inlineRadio1">Visa</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="payment" id="inlineRadio2" value="MasterCard">
              <label class="form-check-label" for="inlineRadio2">MasterCard</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" required type="radio" name="payment" id="inlineRadio3" value="Discover">
              <label class="form-check-label" for="inlineRadio3">Discover</label>
            </div>

            <div class="form-group">
              <label for="total">Total (Cents):</label>
              <input class="form-control" type="text" name="total" id="total" readonly onfocus="blurTotal()" />
            </div>

            <button class="btn btn-primary btn-block" type="submit">Submit</button>
            <button class="btn btn-secondary btn-block" type="reset">Reset</button>
          </form>
        </div>
        <div class="tabel-container">
          <h2>Your Receipt</h2>
          <?php include('receipt.php'); ?>
        </div>
      </div>
    </div>
		<script src="./index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
