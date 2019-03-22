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
				$totalAmount = intval($banana) + intval($apple) + intval($orange);
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
    <div class="container web-container">
      <div class="grid-container">
        <div class="form-container">
          <h1>Form</h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="mySubmit();" method='POST'>
            <div class="form-group">
              <label for="username">Username</label>
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
              <label for="apple">Apple</label>
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
              <label for="orange">Orange</label>
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
              <label for="banana">Banana</label>
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

            <label>Payment Options</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="Visa">
              <label class="form-check-label" for="inlineRadio1">Visa</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="MasterCard">
              <label class="form-check-label" for="inlineRadio2">MasterCard</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="Discover">
              <label class="form-check-label" for="inlineRadio3">Discover</label>
            </div>

            <div class="form-group">
              <label for="total">Total</label>
              <input class="form-control" type="text" name="total" id="total" readonly onfocus="blurTotal()" />
            </div>

            <button class="btn btn-primary btn-block" type="submit">Submit</button>
          </form>
        </div>
        <div class="tabel-container">
          <h1>Submitted Data</h1>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
              <?php
              if ($submited) {
                  echo "<p>Username: $username</p>";
                  echo "<p>Payment method: $payment</p>";

                  echo "<tbody>";
                  echo "<tr>";
                  echo "<th scope='row'>1</th>";
                  echo "<td>Apple</td>";
                  echo "<td>$apple</td>";
                  echo "</tr>";

                  echo "<tr>";
                  echo "<th scope='row'>2</th>";
                  echo "<td>Banana</td>";
                  echo "<td>$banana</td>";
                  echo "</tr>";

                  echo "<tr>";
                  echo "<th scope='row'>3</th>";
                  echo "<td>Orange</td>";
                  echo "<td>$orange</td>";
                  echo "</tr>";

                  echo "</tbody>";

                  echo "<tfoot>";
                  echo "<tr>";
                  echo "<td colspan='2'><strong>Total</strong></td>";
                  echo "<td><strong>$totalAmount</strong></td>";
                  echo "</tr>";
                  echo "</tfoot>";
              } else {
                echo "<p class='text-mute'>No submitted data</p>";
              }
              ?>
          </table>
        </div>
      </div>
    </div>
		<script src="./index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
