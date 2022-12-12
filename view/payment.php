<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css"> 
</head>

<body>
    <?php
        session_start();
      require_once("../Controllers/cart_controller.php");
      if (isset($_SESSION['customer_id'])){
          $cid = $_SESSION['customer_id'];
          $carts = view_cart_controller($cid);
          $checkOutAmt = cart_value_controller($cid);
      }else 
      {
            header("location: ../login/login.php");
      }

    ?>

    <div class="container" style="padding-top: 100px">
      <div class="row">
        <div class="col-sm-9">
          <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="color: #E9967A;">Product Image</th>
                  <th scope="col" style="color: #E9967A;">Product</th>
                  <th scope="col" style="color: #E9967A;">Price</th>
                  <th scope="col" style="color: #E9967A;">Quantity</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($carts as $cartItem){
                  ?>

                  <tr>
                  <th><img src="../images/product_images/<?php echo $cartItem['product_image'] ?>" width="80" height="60"></th>
                  <td scope="row" ><?= $cartItem['product_title'] ?></td>
                  
                  <td >Ghc <?= $cartItem['product_price'] ?></td>
                    <td >
                        <?= $cartItem['qty'] ?>

                    </td>
                </tr>

                  <?php } ?>

              </tbody>
            </table>
        </div>
        <div class="col-sm-3 bg-light" style="padding: 40px 10px ">
          <h5 style="padding-bottom: 10px;">Cart Summary</h5>
          <table class="table">
  <thead>

  </thead>
  <tbody>
    <tr>

      <td >Sub-Total</td>
      <td >Ghc <?= $checkOutAmt['Result'] ?></td>

    </tr>

    <tr>

      <td >Total</td>
      <td >Ghc <span id="amt"><?= $checkOutAmt['Result'] ?></span></td>


    </tr>

  </tbody>

<!--location input -->
 
    <!-- <input type="text" placeholder="Delivery Location" class="form-control my-3 p-4" required="required" name="dloc" id="dloc">
      -->

</table>

    <center>
    <p >Pay with Paystack</p>
    </center>
    <div>
      <input type="hidden" id="email" value="<?= $_SESSION['customer_email'] ?>" >
      <button class="btn btn-success btn-lg btn-block" onclick="payWithPaystack()" style="border-radius: 100px; font-size: 15px; font-weight: bold; padding: 8px 30px;">Paystack</button>
    </div>

        </div>

      </div>
    </div>
    <?php
    if(isset($_GET['status'])){
        if($_GET['status'] == 'failed'){
            ?>
      <script>alert("Payment Cancelled Or Failed")</script>
      <?php
        }
    }
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AdwJ2WFjcmjcYWiOfkV7GXNpK3b6poFL3LHUZC_H4cA-f2RjLQDVCeCVDniCeoiFlhPwrDqi4KVRNz8P&disable-funding=credit,card"></script>
    <script src="../js/payment.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script>
        function payWithPaystack() {
          let handler = PaystackPop.setup({
            key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd',
            email: $('#email').val(),
            //location: $('#dloc').val(),
            currency: "GHS",
            amount: $('#amt').html() * 100, 
            onClose: function(){
              alert('Window closed.');
            },
            callback: function(response){
              let message = 'Payment complete! Reference: ' + response.reference;
              window.location.href = "../Actions/process_payment.php?status=completed";
              console.log(response.reference); 
            }
          });
          handler.openIframe();
        }
    </script>
  </body>
</html>
