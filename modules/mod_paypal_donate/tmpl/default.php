<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="tax" value="0">
<input type="hidden" name="bn" value="PP-DonationsBF">
<input type="image" src="/shigaru/templates/rhuk_milkyway/images/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
</form>
