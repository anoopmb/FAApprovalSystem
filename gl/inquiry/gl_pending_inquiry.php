<?php
/**
 * Created by PhpStorm.
 * User: MB
 * Date: 19-05-2018
 * Time: 09:57 AM
 */

$page_security = 'SA_GLAPPROVE';
$path_to_root = "../..";
include_once($path_to_root . "/includes/session.inc");

include($path_to_root . "/includes/db_pager.inc");

include_once($path_to_root . "/admin/db/fiscalyears_db.inc");
include_once($path_to_root . "/includes/date_functions.inc");
include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/includes/data_checks.inc");

include_once($path_to_root . "/gl/includes/gl_db.inc");

$js = '';
set_focus('account');
if ($SysPrefs->use_popup_windows)
    $js .= get_js_open_window(800, 500);
if (user_use_date_picker())
    $js .= get_js_date_picker();

page(_($help_context = "Approval Pending GL Entries"), false, false, '', $js);












end_page();