<?php
session_start();
ob_start();
$active='Billing Details';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Billing Details : Expert Bells</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="css/cart.css">
    <?php include('header.php'); ?>
    <section class="Home grey lighten-4 pt20px">
        <div class="breadcrumb-main">
            <div class="breadcrumb-bg">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <a href="index.php" class="breadcrumb">Home</a>
                            <a href="cart.php" class="breadcrumb">Cart</a>
                            <a href="#" class="breadcrumb">Billing Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="CartBlock">
                        <h3 class="h5 mcolor1 mt0 fw-500">Add Billing Details</h3>
                        <div class="CartBox">
                            <div class="CartCall">
                                <form class="ShippingP" action="shipping-details.php" method="post">
                                    <div class="row">
                                        <!-- <div class="col s12">
                                            <div class="input-field"><input type="text" name="fname" id="fname" class="inputtext" required><label for="fname" class="inputlabel">Company's Name</label></div>
                                        </div> -->
                                        <div class="col s12">
                                            <div class="input-field"><input type="text" name="fname" id="fname" class="inputtext" required><label for="fname" class="inputlabel">Full Name</label></div>
                                        </div>
                                        <div class="col s12 l6">
                                            <div class="input-field"><input type="number" name="contactno" id="contactno1" class="inputtext" maxlength="10" oninput="maxLengthCheck(this)" required><label for="contactno1" class="inputlabel d-none">Contact Number</label></div>
                                        </div>
                                        <div class="col s12 l6">
                                            <div class="input-field"><input type="email" name="email" id="email" class="inputtext" required><label for="email" class="inputlabel">Email ID</label></div>
                                        </div>
                                        <div class="col s12 l6">
                                            <div class="input-field"><input type="text" name="bmane" id="bmane" class="inputtext" required><label for="bmane" class="inputlabel">Business Name</label></div>
                                        </div>
                                        <div class="col s12 l6">
                                            <div class="input-field"><input type="text" name="gstno" id="gstno" class="inputtext" required><label for="gstno" class="inputlabel">GST Number</label></div>
                                        </div>
                                        <div class="col s12">
                                            <div class="input-field"><textarea class="materialize-textarea" name="Address" id="address"></textarea><label for="address" class="inputlabel">Address</label></div>
                                        </div>
                                        <div class="col s12 l6">
                                            <div class="input-field"><input type="text" name="city" id="city" class="inputtext" required><label for="city" class="inputlabel">City/ District/ Town</label></div>
                                        </div>
                                        <div class="col s12 l6">
                                            <div class="input-field">
                                                <select>
                                                    <option value="" disabled selected>Choose your State</option>
                                                    <option value="1">State 1</option>
                                                    <option value="2">State 2</option>
                                                    <option value="3">State 3</option>
                                                </select>
                                                <label>State</label>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <p><label class="check"><input type="checkbox" class="filled-in" checked="checked"><span>Same as Bill Address <a href="#" class="mcolor">Add Bill Address</a></span></label></p>
                                        </div>
                                        <div class="col s12"><button type="submit" class="btn btn-main1 right">Save and Deliver here</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="CartCall">
                                <div>
                                    <!-- <div class="TopSteps">
                                        <span class="active"><span>Cart</span></span>
                                        <span class="active"><span>Billing Details</span></span>
                                        <span><span>Payment</span></span>
                                    </div> -->
                                    <ul class="track" data-track-steps="3">
                                        <li class="done tooltipped" data-position="bottom" data-tooltip="My Cart">
                                            <span>Cart</span>
                                        </li>
                                        <li class="done tooltipped" data-position="bottom" data-tooltip="Billing Details">
                                            <span>Billing Details</span>
                                        </li>
                                        <li class="tooltipped" data-position="bottom" data-tooltip="Payment">
                                            <span>Payment</span>
                                        </li>
                                    </ul>
                                    <h4 class="h6">Price Details</h4>
                                    <div class="PriceDetails">
                                        <div><span>Total</span><span><i class="icofont-rupee"></i> 999</span></div>
                                        <div><span>Discount</span><span>-<i class="icofont-rupee"></i> 70</span></div>
                                        <div><span>IGST</span><span><i class="icofont-rupee"></i> 26</span></div>
                                        <div><span>Coupon Discount</span><span class="green-text"><i class="icofont-rupee"></i> 69</span></div>
                                        <!-- <div><span>Delivery</span><span><i class="icofont-rupee"></i> 80</span></div> -->
                                        <!-- <div><span class="FreeDel">Free Delivery</span><span>For order above <i class="icofont-rupee"></i>5000</span></div> -->
                                        <div><span class="FreeDel"></span><span></span></div>
                                    </div>
                                    <div class="PriceTotal">
                                        <div><span>Order Total</span><span><i class="icofont-rupee"></i> 1299</span></div>
                                    </div>
                                    <a href="shipping-details.php" class="btn btn-main">Place Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('footer.php'); ?>
    <script type="text/javascript">
        function maxLengthCheck(object) {
            if (object.value.length > object.maxLength)
              object.value = object.value.slice(0, object.maxLength)
        }
    </script>