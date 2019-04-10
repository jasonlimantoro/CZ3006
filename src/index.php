<?php include('layouts/base.php') ?>
<?php startblock('breadrumb') ?>
  <li class="breadcrumb-item active"><a href="/">Home</a></li>
<?php endblock() ?>
<?php startblock('content') ?>

<div class="form-container">
  <h2>Place your order</h2>
  <form action="receipt.php" onsubmit="mySubmit();" method='POST'>
    <div data-error="form"></div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input
        placeholder="Enter username"
        class="form-control"
        autocomplete="off"
        required
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
        <div class="invalid-feedback" data-error="apple"></div>
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
        <div class="invalid-feedback" data-error="banana"></div>
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
        <div class="invalid-feedback" data-error="orange"></div>
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
      <input class="form-control" type="text" name="total" id="total" readonly onfocus="blurTotal()"/>
    </div>

    <button class="btn btn-primary btn-block" type="submit">Submit</button>
    <button class="btn btn-secondary btn-block" type="reset">Reset</button>
  </form>
</div>
<?php endblock() ?>
