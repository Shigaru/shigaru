<?php
/**
* @copyright � 2009 joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

if ( ! defined( '_CB_MOD_CB_ADMINNAV_VERSION' ) ) { define( '_CB_MOD_CB_ADMINNAV_VERSION', '1.2.1,1.1' ); }

global $_CB_framework, $mainframe;

if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	if ( ! file_exists( JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php' ) ) {
		echo 'CB not installed!';
		return;
	}

	include_once( JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php' );
} else {
	if ( ! file_exists( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' ) ) {
		echo 'CB not installed!';
		return;
	}

	include_once( $mainframe->getCfg( 'absolute_path' ) . '/administrator/components/com_comprofiler/plugin.foundation.php' );
}

cbimport( 'cb.html' );
cbimport( 'cb.database' );

if ( ! class_exists( 'cbAdminMenu' ) ) {
	class cbAdminMenu {
		var	$params		=	null;
		var	$display	=	null;
		var	$disabled	=	null;

		function cbAdminMenu( $params ) {
			$this->params		=	$params;
			$this->display		=	$params->get( 'cb_adminnav_display', 1 );

			if ( checkJversion() >= 1 ) {
				$this->disabled	=	JRequest::getInt( 'hidemainmenu' );
			} else {
				$this->disabled	=	cbGetParam( $_REQUEST, 'hidemainmenu', 0 );
			}
		}

		function getDisplay() {
			$return		=	null;

			if ( $this->display == 1 ) {
				$return	.=	$this->getTab();
			} elseif ( $this->display == 2 ) {
				$return	.=	$this->getMenu();
			}

			return $return;
		}

		function getTab() {
			$menus				=	$this->getMenus();
			$return				=	null;

			if ( $menus ) {
				$return			=	'<table class="adminlist">';

				foreach ( $menus as $menu ) {
					if ( isset( $menu['menu'] ) ) {
						$items	=	$menu['menu'];
					} else {
						$items	=	array();
					}

					if ( isset( $menu['component'] ) ) {
						$return	.=	$this->getTabItems( $menu['component'], $items );
					}
				}

				$return			.=		'<thead>'
								.			'<tr>'
								.				'<th class="title">&nbsp;</th>'
								.			'</tr>'
								.		'</thead>'
								.	'</table>';
			}

			return $return;
		}

		function getTabItems( $component, $items ) {
			$return			=	'<thead>'
							.		'<tr>'
							.			'<th class="title"><a href="' . trim( $component['link'] ) . '">' . CBTxt::T( trim( $component['title'] ) ) . '</a></th>'
							.		'</tr>'
							.	'</thead>';

			if ( $items ) {
				$return		.=	'<tbody>'
							.		'<tr>'
							.			'<td>'
							.				'<table class="adminlist">';

				foreach ( $items as $title => $link ) {
					$return	.=					'<tr>'
							.						'<td>'
							.							'<ul style="margin: 0px; padding: 0px 0px 0px 20px;">'
							.								'<li><a href="' . trim( $link ) . '">' . CBTxt::T( trim( $title ) ) . '</a></li>'
							.							'</ul>'
							.						'</td>'
							.					'</tr>';
				}

				$return		.=				'</table>'
							.			'</td>'
							.		'</tr>'
							.	'</tbody>';
			}

			return $return;
		}

		function getMenu() {
			global $_CB_framework;

			$live_site				=	str_replace( '/administrator', '', $_CB_framework->getCfg( 'live_site' ) );
			$return					=	null;

			if ( checkJversion() == 2 ) {
				$css				=	'/administrator/modules/mod_cb_adminnav/mod_cb_adminnavj16.css';
			} elseif ( checkJversion() == 1 ) {
				$css				=	'/administrator/modules/mod_cb_adminnav/mod_cb_adminnavj15.css';
			} else {
				$css				=	'/administrator/modules/mod_cb_adminnavj10.css';
			}

			if ( file_exists( $_CB_framework->getCfg( 'absolute_path' ) . $css ) ) {
				$_CB_framework->document->addHeadStyleSheet( $live_site . $css );

				$menus				=	$this->getMenus();

				if ( $menus ) {
					$return			=	'<div>'
									.		'<ul id="cb_menu"' . ( $this->disabled ? ' class="disabled"' : null ) . '>';

					foreach ( $menus as $menu ) {
						if ( isset( $menu['menu'] ) ) {
							$items	=	$menu['menu'];
						} else {
							$items	=	array();
						}

						if ( isset( $menu['menu_width'] ) ) {
							$width	=	$menu['menu_width'];
						} else {
							$width	=	140;
						}

						if ( isset( $menu['menu_icons'] ) ) {
							$icons	=	$menu['menu_icons'];
						} else {
							$icons	=	null;
						}

						if ( isset( $menu['menu_css'] ) ) {
							$css	=	$menu['menu_css'];
						} else {
							$css	=	null;
						}

						if ( isset( $menu['component'] ) ) {
							$return	.=	$this->getMenuItems( $menu['component'], $items, $width, $icons, $css );
						}
					}

					$return			.=		'</ul>'
									.	'</div>';
				}
			}

			return $return;
		}

		function getMenuItems( $component, $items = array(), $width = 140, $icons = null, $css = null ) {
			global $_CB_framework;

			$return					=	null;

			if ( ! $this->disabled ) {
				if ( $css && file_exists( $css ) ) {
					$_CB_framework->document->addHeadStyleSheet( $css );
				}

				$style				=	( $width ? ' style="width:' . (int) $width . 'px;"' : null );
				$return				=	'<li class="cb_node">'
									.		'<a href="' . trim( $component['link'] ) . '">' . CBTxt::T( trim( $component['title'] ) ) . '</a>';

				if ( $items ) {
					$return			.=		'<ul' . $style . '>';
					$item_id		=	1;

					foreach ( $items as $title => $link ) {
						$class		=	( $icons ? ' class="icon-' . trim( $icons ) . '-' . $item_id . '"' : null );

						$return		.=			'<li' . $style . '>'
									.				'<a href="' . trim( $link ) . '"' . $class . '>' . CBTxt::T( trim( $title ) ) . '</a>'
									.			'</li>';

						$item_id	+=	1;
					}

					$return			.=		'</ul>';
				}

				$return				.=	'</li>';
			} else {
				$return				=	'<li class="disabled">'
									.		'<a>' . CBTxt::T( trim( $component['title'] ) ) . '</a>'
									.	'</li>';
			}

			return $return;
		}

		function getCBGJ() {
			global $_CB_framework, $_CB_database;

			$return							=	array();

			if ( file_exists( $_CB_framework->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/user/plug_cbgroupjive' ) ) {
				$query						=	'SELECT ' . $_CB_database->NameQuote( 'id' )
											.	"\n FROM " . $_CB_database->NameQuote( '#__comprofiler_plugin' )
											.	"\n WHERE " . $_CB_database->NameQuote( 'element' )	. ' = ' . $_CB_database->Quote( 'cbgroupjive' );
				$_CB_database->setQuery( $query, 0, 1 );
				$plugin_id					=	$_CB_database->loadResult();

				if ( $plugin_id ) {
					$return['component']	=	array(	'title' => 'GroupJive', 'link' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id ) );
					$return['menu']			=	array(	'Categories' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=categories' ),
														'Groups' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=groups' ),
														'Users' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=users' ),
														'Invites' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=invites' ),
														'Configuration' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=config' ),
														'Tools' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=tools' ),
														'Integrations' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=integrations' )
													);
					$return['menu_icons']	=	'cbgj';
					$return['menu_width']	=	100;
				}
			}

			return $return;
		}

		function getCBSubs() {
			global $_CB_framework, $_CB_database;

			$return										=	array();

			if ( file_exists( $_CB_framework->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/user/plug_cbpaidsubscriptions' ) ) {
				$query									=	'SELECT ' . $_CB_database->NameQuote( 'id' )
														.	"\n FROM " . $_CB_database->NameQuote( '#__comprofiler_plugin' )
														.	"\n WHERE " . $_CB_database->NameQuote( 'element' )	. ' = ' . $_CB_database->Quote( 'cbpaidsubscriptions' );
				$_CB_database->setQuery( $query, 0, 1 );
				$plugin_id								=	$_CB_database->loadResult();

				if ( $plugin_id ) {
					$return['component']				=	array(	'title' => 'Paid Subscriptions', 'link' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id ) );
					$return['menu']						=	array(	'Settings' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showparams' ),
																	'Payment Gateways' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=gateways' ),
																	'Plans' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=plans' ),
																	'Subscriptions' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=subscriptions' ),
																	'Baskets' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=paymentbaskets' ),
																	'Payments' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=payments' ),
																	'Notifications' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=notifications' ),
																	'Currencies' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=currencies' ),
																	'Statistics' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showstats' ),
																	'Merchandise' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=merchandises' ),
																	'Donations' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=donations' ),
																	'Import' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=import' ),
																	'History Logs' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtable&table=history' )
																);
					$return['menu_icons']				=	'cbsubs';

					if ( file_exists( $_CB_framework->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/user/plug_cbpaidsubscriptions/plugin/cbsubstax' ) ) {
						$return['menu']['Tax Settings']	=	$_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=editPlugin&cid=' . $plugin_id . '&action=showtaxsettings' );
					}
				}
			}

			return $return;
		}

		function getCB() {
			global $_CB_framework;

			$return						=	array();

			if ( file_exists( $_CB_framework->getCfg( 'absolute_path' ) . '/components/com_comprofiler' ) ) {
				$return['component']	=	array(	'title' => 'Community Builder', 'link' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler' ) );
				$return['menu']			=	array(	'User Management' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=showusers' ),
													'Tab Management' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=showTab' ),
													'Field Management' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=showField' ),
													'List Management' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=showLists' ),
													'Plugin Management' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=showPlugins' ),
													'Tools' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=tools' ),
													'Configuration' => $_CB_framework->backendUrl( 'index.php?option=com_comprofiler&task=showconfig' )
												);
				$return['menu_icons']	=	'cb';
			}

			return $return;
		}

		function getMenus() {
			$show_cb		=	$this->params->get( 'cb_adminnav_cb', 1 );
			$show_cbsubs	=	$this->params->get( 'cb_adminnav_cbsubs', 1 );
			$show_cbgj		=	$this->params->get( 'cb_adminnav_cbgj', 1 );
			$show_plugins	=	$this->params->get( 'cb_adminnav_plugins', 0 );
			$menus			=	array();

			if ( $show_cb ) {
				$menus[]	=	$this->getCB();
			}

			if ( $show_cbsubs ) {
				$menus[]	=	$this->getCBSubs();
			}

			if ( $show_cbgj ) {
				$menus[]	=	$this->getCBGJ();
			}

			if ( $show_plugins ) {
				global $_PLUGINS;

				$_PLUGINS->loadPluginGroup( 'user' );

				$variables	=	array( $this->params, $this->display, $this->disabled );
				$plugins	=	array_filter( $_PLUGINS->trigger( 'onCBAdminNav', $variables ) );

				$menus		=	array_merge( $menus, $plugins );
			}

			return $menus;
		}
	}
}

$cbAdminMenu	=	new cbAdminMenu( $params );

echo $cbAdminMenu->getDisplay();
?>