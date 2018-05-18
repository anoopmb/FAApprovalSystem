<?php
/**********************************************************************
    Copyright (C) FrontAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL, 
	as published by the Free Software Foundation, either version 3 
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/

class membtech_patch extends fa_patch {
	var $previous = '2.4.1';		// applicable database version
	var $version = '2.4.2';	// version installed
	var $description;
	var $sql = 'membtech_approval.sql';
	var $preconf = true;
	var	$max_upgrade_time = 900;	// table recoding is really long process
	
	function __construct() {
		parent::__construct();
        $this->description = _('MembTech Gl Transaction Approval Integration');
	}
	
    /*
	    Shows parameters to be selected before upgrade (if any)
	*/
    function show_params($comp)
	{
        display_note(_('This is a Modification from Membtech.com'));

        br();
    }

	/*
	    Fetches selected upgrade parameters.
    */
	function prepare()
    {
		return true;
	}

	//
	//	Install procedure. All additional changes 
	//	not included in sql file should go here.
	//
	function install($company, $force=false)
	{
		global $db_version, $db_connections;

		$pref = $db_connections[$company]['tbpref'];

        return true;
	}

	//
	// optional procedure done after upgrade fail, before backup is restored
	//
	function post_fail($company)
	{
		$pref = $this->companies[$company]['tbpref'];
        display_error("Update Failed");
	}


}

$install = new membtech_patch;
