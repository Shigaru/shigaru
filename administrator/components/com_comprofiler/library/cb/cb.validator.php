<?php
/**
* @version $Id: cb.validator.php 1543 2011-07-28 22:48:03Z beat $
* @package Community Builder
* @subpackage cb.validator.php
* @author Beat and various
* @copyright (C) 2004-2011 Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

// no direct access
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

/**
* Form validation support class
* @since 1.4 RC BUT experimentally only: this will become dynamic instead of static
*/
class cbValidator {
	static $methods = array();
	static $rules = null;
	static function addMethod( $name, $jsFunction ) {
		self::$methods[$name]	=	$jsFunction;
	}
	static function addRule( $rule ) {
		self::$rules	.=	$rule;
	}
	static function renderGenericJs( ) {
		cbimport( 'language.cbteamplugins' );
?>
jQuery.extend(jQuery.validator.messages, {
		required: "<?php echo addslashes( CBTxt::T("This field is required.") ); ?>",
		remote: "<?php echo addslashes( CBTxt::T("Please fix this field.") ); ?>",
		email: "<?php echo addslashes( CBTxt::T("Please enter a valid email address.") ); ?>",
		url: "<?php echo addslashes( CBTxt::T("Please enter a valid URL.") ); ?>",
		date: "<?php echo addslashes( CBTxt::T("Please enter a valid date.") ); ?>",
		dateISO: "<?php echo addslashes( CBTxt::T("Please enter a valid date (ISO).") ); ?>",
		number: "<?php echo addslashes( CBTxt::T("Please enter a valid number.") ); ?>",
		digits: "<?php echo addslashes( CBTxt::T("Please enter only digits.") ); ?>",
		creditcard: "<?php echo addslashes( CBTxt::T("Please enter a valid credit card number.") ); ?>",
		equalTo: "<?php echo addslashes( CBTxt::T("Please enter the same value again.") ); ?>",
		accept: "<?php echo addslashes( CBTxt::T("Please enter a value with a valid extension.") ); ?>",
		maxlength: jQuery.validator.format("<?php echo addslashes( CBTxt::T("Please enter no more than {0} characters.") ); ?>"),
		minlength: jQuery.validator.format("<?php echo addslashes( CBTxt::T("Please enter at least {0} characters.") ); ?>"),
		rangelength: jQuery.validator.format("<?php echo addslashes( CBTxt::T("Please enter a value between {0} and {1} characters long.") ); ?>"),
		range: jQuery.validator.format("<?php echo addslashes( CBTxt::T("Please enter a value between {0} and {1}.") ); ?>"),
		max: jQuery.validator.format("<?php echo addslashes( CBTxt::T("Please enter a value less than or equal to {0}.") ); ?>"),
		min: jQuery.validator.format("<?php echo addslashes( CBTxt::T("Please enter a value greater than or equal to {0}.") ); ?>")
});

{
	var firstInvalidFieldFound	=	0;

	jQuery('#cbcheckedadminForm').validate( {
		ignoreTitle : true,
		errorClass: 'cb_result_warning',
		// debug: true,
		cbIsOnKeyUp: false,
		highlight: function( element, errorClass ) {
			jQuery( element ).parents('.fieldCell').parent().addClass( 'cbValidationError' );		// tables
			jQuery( element ).parents('.cb_field,.cb_form_line').addClass( 'cbValidationError' );	// divs
			jQuery( element ).addClass( 'cbValidationError' + jQuery(element).attr('type') );
			jQuery( element ).parents('.tab-page').addClass('cbValidationErrorTab')
			.each( function() {
				jQuery(this).siblings('.tab-row')
				.find('h2:nth-child(' + jQuery(this).index() + ')')
				.addClass('cbValidationErrorTabTip');
			})
			.filter(':not(:visible)').each( function() {
				if ( ! firstInvalidFieldFound++ ) {
					showCBTab( jQuery(this).attr('id').substr(5) );
				}
			});;
		},
		unhighlight: function( element, errorClass ) {
			if ( this.errorList.length == 0 ) {
				firstInvalidFieldFound = 0;
			}
			jQuery( element ).parents('.fieldCell').parent().removeClass( 'cbValidationError' );		// tables
			jQuery( element ).parents('.cb_field,.cb_form_line').removeClass( 'cbValidationError' );	// divs
			jQuery( element ).removeClass( 'cbValidationError' + jQuery(element).attr('type') );
			jQuery( element ).parents('.tab-page')
			.each( function() {
				if ( jQuery(this).find('.cbValidationError').size() == 0 ) {
					jQuery(this).removeClass('cbValidationErrorTab')
					.siblings('.tab-row')
					.find('h2:nth-child(' + jQuery(this).index() + ')')
					.removeClass('cbValidationErrorTabTip');
				}
			});
		},
		errorElement: 'div',
		
		errorPlacement: function(error, element) {
			var promptTopPosition, promptleftPosition, marginTopSize;
			var element = jQuery(element);
			var fieldWidth = element.width();
			var promptHeight = 25;
			var offset = element.position();
			jQuery("input[name=cb_sex]").parent().parent().append('<div id="sexmessage"></div>');
			promptTopPosition = offset.top;
			promptleftPosition = offset.left;
			promptleftPosition += fieldWidth;
			promptTopPosition += -promptHeight -2;
			element.closest('.fieldCell, .cb_field').append( error[0] ).children('.cb_result_warning').click(function(){
				jQuery(this).fadeOut();
				});		// .fieldCell : tables, .cb_field : div
			error.css('position', 'absolute');
			error.css('cursor', 'pointer');
            error.css('left', promptleftPosition);
            error.css('top', promptTopPosition);
		},
		onkeyup: function(element) {
			if ( element.name in this.submitted || element == this.lastElement ) {
				// avoid remotejhtml rule onkeyup
				this.cbIsOnKeyUp = true;
				this.element(element);
				this.cbIsOnKeyUp = false;
			}
<?php
/*
		},
		showErrors: function(errorMap, errorList) {
			var messages;
			for ( var i = 0; errorList[i]; i++ ) {
				messages += errorList[i].message + "\n";
			}
			this.defaultShowErrors();
			alert( messages );
		},
        rules: { 
            username: { 
                required: true, 
                minlength: 3 //, 
                // remote: "users.php" 
            },
            password: { 
                required: true, 
                minlength: 6 
            }, 
            password_confirm: { 
                required: true, 
                minlength: 6, 
                equalTo: "#password" 
            }, 
            email: { 
                required: true, 
                email: true //, 
     			//remote: "emails.php" 
            }
        },
*/
/*
        messages: { 
        	username: { 
                required: "Please enter a username", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                remote: jQuery.format("{0} is already in use") 
            },
            password: { 
                required: "Please provide a password", 
                rangelength: jQuery.format("Enter at least {0} characters") 
            }, 
            password_confirm: { 
                required: "Please repeat your password", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                equalTo: "Enter the same password as above" 
            },
            email: { 
                required: "Please enter a valid email address", 
                minlength: "Please enter a valid email address" //,
                // remote: jQuery.format("{0} is already in use") 
            }
*/
?>
        }
	} );
	jQuery('#cbcheckedadminForm input:checkbox,#cbcheckedadminForm input:radio').click( function() {
		jQuery('#cbcheckedadminForm').validate().element( jQuery(this) );
	} );
}
var sexRadios = jQuery("input[name=cb_sex]");
jQuery.validator.addMethod("sexTexts", function(value, element) {
    if(jQuery(sexRadios[2]).attr('checked')){
			jQuery('#sexmessage').html('Come on, be serious now, select your sex ;-)');
			return false;
		}else{
			jQuery('#sexmessage').html('Congratulations on deciding!');
			return true;
			}
},'We appreciate your efforts, but this is not the best place for that...');
sexRadios.rules("add", {
 sexTexts: true
});
<?php
		echo implode( "\n", self::$methods ) . "\n";
		echo self::$rules;
	}
}
?>
