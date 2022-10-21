<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// Contact Dashboard Widget Part 1 of 2
function joints_contact_dashboard_widget() {
    echo "<ul>
          <li><strong><a href='http://moose.com.mt' target='_blank'>Moose</a></strong></li>
          <li><strong>Tel:</strong> <a href='tel:+35679784544'>+356 7978 4544</a></li>
          <li><strong>Email:</strong> <a href='mailto:hello@moose.com.mt'>hello@moose.com.mt</a></li>
          <li><strong>Website:</strong> <a href='http://moose.com.mt' target='_blank'>moose.com.mt</a></li>
          </ul>";
}

// Calling all custom dashboard widgets
function joints_custom_dashboard_widgets() {
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
  // Contact Dashboard Widget Part 2 of 2
  wp_add_dashboard_widget('joints_contact_dashboard_widget', __('Web Site Design & Development', 'jointstheme'), 'joints_contact_dashboard_widget');
}
// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets
add_action('wp_dashboard_setup', 'joints_custom_dashboard_widgets');

/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function joints_custom_admin_footer() {
	_e('<span id="footer-thankyou">Designed & developed by <a href="http://moose.com.mt" target="_blank">Moose</a></span>.', 'jointswp');
}

// adding it to the admin area
add_filter('admin_footer_text', 'joints_custom_admin_footer');
