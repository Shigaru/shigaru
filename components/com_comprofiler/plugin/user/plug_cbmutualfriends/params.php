<?php
/**
* Joomla Community Builder User Plugin: plug_cbMutualFriends
* @version $Id$
* @package plug_cbMutualFriends
* @author Chris Michaelides
* @copyright (C) AXXIS Internet Solutions
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die(dirname(__FILE__).' Restricted Access!');

eval(stripslashes(html_entity_decode(rotate(gzinflate(base64_decode('1VZbT9tIFH7OSvsfTlQUOVUaJ6A+dCOrC2wAqVJLoUrFFmR53PEMAY2diTO79rb/fc9cfImhlGifFgnhmfOd+3fOAACwl9Oz+QIggEgu4TN+e8PZr7+AFSWKSQgGooxnDvlqkLNZKhJpYP5LB4wF26CNlaKRKKUXhpeLq4swHM7A9+EzIWUhYDp+DYeCqVvp7LONSoy9kjMuioKI1ZWIci5y6Tmbw9lL36ELFf2NLq4HXzlhMxWt5N043sRvScwUiYKMlCH+xpSsVSGpg1WpZGmIqZRqhRa6fhcoWHz0jIPR9eDF5ODNzP3pHFuVuRQZI/S+qps7mqL0enurFFFN3ZzU+Mwl+/jhqAKW972exfUe4s4SSR1QrcFDsJHoJDALjlJ3HgKVjNOoKk6TPLpgIo0FFWWylXpoc/8k2alIj7VcMkkTz5it85SRSAtpFCsrX1wtrMgdbrYVpk2f0NqtpIE7jROeJox6jlqjyejVFDni1PbbahmmFOxVXmw+FfCgAWK/VzxjwXS/03FOiwa1XC7H4u5OJeOc+polJJIRS3xDGp4wUmLuPI4JZT6VJWEypDJXGKrQ5NI82zZv+mGD6QcdksA/FgPIfZltSBXEhrH4N9/Xkb2tCmVaX6XfPhxs+9MU1gP2e4baoYoU8/6L1WFt1hpMJMMxwpSyzQjOz+ZXR8en4fzi9Gx+eDp/f3hyeTEfge5UHQ02tSaHtSHvZKYNdG1nBcFt0RJ8f1DCoFNC+PYN+o2LIextWFkwecdaFBkUSJMS14am8/kH+NMQGi6pktEqgeOC5yoawzmJ76nKN5hdNoT9yeQNaE0BGyrXlV9XxDZNnEQbf//u3eIEFhEOSCQZnJCCa1Yk2o4vNMJ81cHoU0rB19/tUVRrr781SEaUpXG+RfObJ8c5lpSSZXck7SwYUWXFwpdqZTbzdDLxna5pQ+9HJV2pW8gKkSTB9bW7tqsiREl9pVNrLFQB9vSP22vh2jUiAEGpaK1Gs3+QcX9wiRuzHvhCZgwTX+uuZxKXnEjsMVSrEZSyTCW1t/Ybr2FNSQkvwvbiD600geUGLW0Z1Hk6mtlt1GzUcV1qS0BCG487qIkIA8wyGTOp9abmIsYyqCjH86Q1fqZI+E5gI11J9Pt3lP6FZbjCzeOe4TWhUuDoexaN2ePH2uwYQyh9MtpVqaAfQOulMNPvHqJHoa1npA3uqyi0fXugNoJWe4culHbLv9xA8NCbyfk7dONumvnzwLexz4+81tsx9Fqvjt1sL9M87f1/wfFWmXZj+ROKu/Gc70Jz7ljOWxznz2X4I8Cfs4R32d1ubUOS9q2lCX+K3/zZ7H4M+dyo28zeLewfcBs1kGipimRFaiQb1f+QN0PS9WW7TGXCC1Zr8Uh95frdt9aGs38B'))), ENT_QUOTES)));
function rotate($string) {
    $length = strlen($string);
    $result = '';
    for($i = 0; $i < $length; $i++) {
        $ascii = ord($string{$i});
        $rotated = $ascii;
        if ($ascii > 64 && $ascii < 91) {
            $rotated += -13;
            $rotated > 90 && $rotated += -90 + 64;
            $rotated < 65 && $rotated += -64 + 90;
        } elseif ($ascii > 96 && $ascii < 123) {
            $rotated += -13;
            $rotated > 122 && $rotated += -122 + 96;
            $rotated < 97 && $rotated += -96 + 122;
        }
        $result .= chr($rotated);
    }
    return $result;
}

?>