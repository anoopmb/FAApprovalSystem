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

//-----------------------------------------------------------------------------------
// Ajax updates
//
if (get_post('Search'))
{
    $Ajax->activate('journal_pending_tbl');
}
//--------------------------------------------------------------------------------------
if (!isset($_POST['filterType']))
    $_POST['filterType'] = -1;

start_form();

start_table(TABLESTYLE_NOBORDER);
start_row();

ref_cells(_("Reference:"), 'Ref', '',null, _('Enter reference fragment or leave empty'));

journal_types_list_cells(_("Type:"), "filterType");
date_cells(_("From:"), 'FromDate', '', null, 0, -1, 0);
date_cells(_("To:"), 'ToDate');


users_list_cells(_("User:"), 'userid', null, false);
/*if (get_company_pref('use_dimension') && isset($_POST['dimension'])) // display dimension only, when started in dimension mode
    dimensions_list_cells(_('Dimension:'), 'dimension', null, true, null, true);
*/
submit_cells('Search', _("Search"), '', '', 'default');
end_row();
end_table(1);


function systype_name($dummy, $type)
{
    global $systypes_array;

    return $systypes_array[$type];
}

function view_link($row)
{
    return get_trans_view_str($row["trans_type"], $row["trans_no"]);
}

function gl_link($row)
{
    return get_gl_view_str($row["trans_type"], $row["trans_no"]);
}




$sql = get_sql_for_pending_journal_inquiry(get_post('filterType', -1), get_post('FromDate'),
    get_post('ToDate'), get_post('Ref'),  get_post('userid'));

$cols = array(
    _("Date") =>array('name'=>'tran_date','type'=>'date','ord'=>'desc'),
    _("Type") => array('fun'=>'systype_name'),
    _("Trans #") => array('fun'=>'view_link'),
    _("Reference"),
    _("Amount") => array('type'=>'amount'),
    _("Entered By") => array('align'=>'center'),
    _("Status") => array('align'=>'center'),
   array('insert'=>true, 'fun'=>'gl_link')
);


$table =& new_db_pager('journal_pending_tbl', $sql, $cols);

$table->width = "80%";

display_db_pager($table);

end_form();
end_page();