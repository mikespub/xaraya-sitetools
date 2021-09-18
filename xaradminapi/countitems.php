<?php
/**
 * @package Xaraya eXtensible Management System
 * @copyright (C) 2005 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @link http://www.xaraya.com
 *
 * @subpackage Sitetools
 * @author Jo Dalle Nogare <jojodee@xaraya.com>
 */

/*
 * @returns integer
 * @return number of items held by this module
 * @raise DATABASE_ERROR
*/
function sitetools_adminapi_countitems()
{
    // Get database setup
    $dbconn = xarDB::getConn();
    $xartable = xarDB::getTables();

    $sitetoolstable = $xartable['sitetools'];

    $query = "SELECT COUNT(1)
            FROM $sitetoolstable";
    $result = &$dbconn->Execute($query);
    // Check for an error with the database code, adodb has already raised
    // the exception so we just return
    if (!$result) {
        return;
    }
    // Obtain the number of items
    [$numitems] = $result->fields;
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();
    // Return the number of items
    return $numitems;
}
