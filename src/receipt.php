<?php include('index.php') ?>
<?php
$filename = 'order.txt';
$data = [0, 0, 0];
if (file_exists($filename)) {
  // apple, banana, orange
  $file = fopen($filename, 'r');
  $i = 0;
  while (!feof($file)) {
    $numbers = [];
    $line = fgets($file);
    if (!$line)
      break;
    preg_match("/\d+/", $line, $numbers);
    $data[$i] = $numbers[0];
    $i++;
  }
  fclose($file);
} else {
  $file = fopen($filename, 'w');
  fclose($file);
}

$banana = $apple = $orange = $total = $totalAmount = 0;
$username = $payment = '';

function clean($data)
{
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

  $file = fopen($filename, 'w') or die("Unable to open file!");
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

<?php startblock('title') ?>
  <?= $username ?> Receipt
<?php endblock() ?>

<?php startblock('breadrumb') ?>
  <?php superblock() ?>
  <li class="breadcrumb-item">Receipt</li>
<?php endblock() ?>

<?php startblock('content') ?>
  <div class="tabel-container">
    <h2>Your Receipt</h2>
    <p>Username: <?= $username ?></p>
    <p>Payment method: <?= $payment ?></p>
    <table class='table table-hover'>
      <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Item</th>
        <th scope='col'>Amount</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <th scope='row'>1</th>
        <td>Apple</td>
        <td><?= $apple ?></td>
      </tr>
      <tr>
        <th scope='row'>2</th>
        <td>Banana</td>
        <td><?= $banana ?></td>
      </tr>
      <tr>
        <th scope='row'>3</th>
        <td>Orange</td>
        <td><?= $orange ?></td>
      </tr>
      </tbody>

      <tfoot>
      <tr>
        <th scope='row' colspan='2'>Total</th>
        <th><?= $totalAmount ?></th>
      </tr>
      <tr>
        <th scope='row' colspan='2'>Total Price (Cents)</th>
        <th><?= $total ?></th>
      </tr>
      </tfoot>
  </div>
<?php endblock() ?>
