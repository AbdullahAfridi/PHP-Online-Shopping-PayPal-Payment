<?php
//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'Insert_PayPal_Email'; //Business Email
?>
    <img src="images/<?php echo $row['image']; ?>"/>
    Name: <?php echo $row['name']; ?>
    Price: <?php echo $row['price']; ?>
    <form action="<?php echo $paypalURL; ?>" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="WP Database Backup">
        <input type="hidden" name="item_number" value="12345">
        <input type="hidden" name="amount" value="22">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs : replace with your site url -->
        <input type='hidden' name='cancel_return' value='http://walkeprashant.in/cancel.php'>
        <input type='hidden' name='return' value='http://walkeprashant.in/success.php'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="button_url" alt="PayPal - The safer, easier way to pay online">
        
    </form>