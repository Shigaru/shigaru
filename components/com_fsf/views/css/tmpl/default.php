<?php
/**
* @Copyright Freestyle Joomla (C) 2010
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*     
* This file is part of Freestyle Support Portal
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
?>
<?php


ob_end_clean();
header('Content-type: text/css');
header("Expires: Sat, 26 Jul 2020 05:00:00 GMT");?>
/* ------------- */
/* General stuff */
/* ------------- */

/* Clear div */
div.fsf_clear {
	clear: both;
}

div.fsf_spacer 
{
    padding-top: 5px;
    padding-bottom: 5px;
}


/* --------- */
/* FAQ Stuff */
/* --------- */

/* Tooltip stuff */
.fsf_custom_tip-tip {
    width: 600px;	
    border: 1px solid #000;
    padding: 6px;
	background-color: <?php echo fsf_Settings::get('css_hl'); ?>;
}
 
.fsf_custom_tip-title {
	display: none;
}
 
.fsf_custom_tip-text {	
}
 
.fsf_custom_tip-top {
}
 
.fsf_custom_tip-bottom {	
}


/* -------------- */
/* FAQ Categories */
/* -------------- */

/* list of categories container */
div.fsf_faq_catlist {

}

/* category container */
div.faq_category {
	clear:left;
	border-top: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
}

/* category title */
div.faq_category_head {
	font-size: 120%;
}
div.faq_category_head a.fsf_highlight
{
	display: block;
	padding: 6px 2px 6px 2px;
}
div.faq_category_head a.fsf_highlight:hover {
	background-color: <?php echo fsf_Settings::get('css_hl'); ?>;
}

/* description text in a cetegory */
div.faq_category_desc {

}

/* image within a category */
div.faq_category_image {
	padding-right: 9px;
	padding-bottom: 2px;
	float:left;
}

/* ------------------------ */
/* FAQ Category list module */
/* ------------------------ */

/* category container */
div.faq_mod_category {
	clear:left;
	border-top: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	padding: 3px;
}

/* category title */
div.faq_mod_category_head {
	font-size: 110%;
	padding-top: 4px;
	padding-bottom: 4px;
}

/* image within a category */
div.faq_mod_category_image {
	padding-right: 9px;
	padding-bottom: 2px;
	float:left;
}

/* empty footer div at end of a category */
div.faq_category_footer {
	clear:left;
	border-top: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
}

/* when multiple colums of categories listed, normal column style */
td.fsf_faq_cat_col {
	border-left: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
}

/* when multiple colums of categories listed, style for the 1st column*/
td.fsf_faq_cat_col_first {

}

/* list of faqs when listing within multiple categories */
div.faq_category_faqlist {
	clear:both;
	padding-left: 70px;
}

/* -------- */
/* FAQ FAqs */
/* -------- */

/* list of faqs container */
div.fsf_faqs {
	clear:both;
	padding-left: 70px;
}

/* FAQ container */
div.fsf_faq {	
	/*padding-top: 4px;
	padding-bottom: 4px;*/
	
	border-top-style: solid;
	border-top-color: <?php echo fsf_Settings::get('css_bo'); ?>;
	border-top-width: 1px;	
}

/* FAQs all on one page wrapper */
div.fsf_faq_inline {
	margin-top:10px;
}

/* List of questions with no answers, row highlight */
div.fsf_faq a.fsf_highlight
{
	display: block;
	padding: 6px 2px 6px 2px;
}
div.fsf_faq a.fsf_highlight:hover {
	background-color: <?php echo fsf_Settings::get('css_hl'); ?>;
}

/* Standard question text */
div.fsf_faq_question {
	font-size: 120%;
}

/* Standard FAQ answer */
div.fsf_faq_answer {
	padding-bottom: 4px;
	border-bottom-style: solid;
	border-bottom-color: <?php echo fsf_Settings::get('css_bo'); ?>;
	border-bottom-width: 1px;
	padding-left: 10px;	
	/*font-size: 120%;*/
}

/* Answer when shown within a tooltip */
div.fsf_faq_answer_tip {
	padding-left: 10px;	
}

/* Answer when only single answer on a page */
div.fsf_faq_answer_single {
	padding-left: 10px;	
}

/* Bordering around the popup windows content */
div.fsf_popup_gap {
	padding-top: 10px;
	padding-left: 10px;
	padding-right: 10px;
	overflow: hidden;
}

/* click for more.. text when in tooltip */
div.fsf_faq_more {
	text-align: right;
}

/* --------------------- */
/* Pagination formatting */
/* --------------------- */

.fsf_list-footer {
	position:relative;
}

.fsf_counter {
	float:left;
	position:absolute;
	width:140px;
	display:inline;
	left:0px;
	top:0px;
}

.fsf_limit {
	float:right;
	display:inline;
}

.fsf_pagination {
	padding-left:100px;
	padding-right:100px;
	margin-left: auto;
	margin-right: auto;
	width:auto;
	text-align:center;
}

/* ----------------- */
/* fsf Table styling */
/* ----------------- */
table.fsf_table {
	border-top: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	border-left: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	margin:0px;
	padding:0px;
}
table.fsf_table th {
	border-bottom: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	border-right: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	background-color: #f0f0ff;
	padding: 3px 8px 3px 8px;
	text-align: right;
}
table.fsf_table td {
	border-bottom: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	border-right: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	padding: 3px 8px 3px 8px;
}
table.fsf_table td.noright {
	border-bottom: 1px solid <?php echo fsf_Settings::get('css_bo'); ?>;
	border-right: none;
	padding: 3px 8px 3px 8px;
}

<?php exit; ?>