<?php
if ($submited) {
    echo "
      <p>Username: $username</p>
      <p>Payment method: $payment</p>
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
            <td>$apple</td>
          </tr>
          <tr>
            <th scope='row'>2</th> 
            <td>Banana</td>
            <td>$banana</td>
          </tr>
          <tr>
            <th scope='row'>2</th> 
            <td>Orange</td>
            <td>$orange</td>
          </tr>
         </tbody>
         
         <tfoot>
          <tr>
            <th scope='row' colspan='2'>Total</th>
            <th>$totalAmount</th>
          </tr>
          <tr>
            <th scope='row' colspan='2'>Total Price (Cents)</th>
            <th>$total</th>
          </tr>
         </tfoot>
      ";
} else {
    echo "<p class='text-mute'>No submitted data</p>";
}
