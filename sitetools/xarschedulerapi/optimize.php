<?php
/*
 * File: $Id:
 *
 * Optimize the database using the scheduler module
 *
 * @package Xaraya eXtensible Management System
 * @copyright (C) 2003 by the Xaraya Development Team.
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @link http://www.xaraya.com
 *
 * @subpackage SiteTools module
 * @author jojodee <jojodee@xaraya.com>
*/
/**
 * optimize the database (executed by the scheduler module)
 * 
 * @author jojodee <http://xaraya.athomeandabout.com >
 * @access private
 */
function sitetools_schedulerapi_optimize($args)
{
    extract($args);

    // DO LATER: get some configuration info here if necessary
    // for now lets just use current database
    if (empty($dbname)){
        $dbconn =& xarDBGetConn();
            $dbname= xarDBGetName();
    }

    //   It may return true (or some logging text) if it succeeds, and null if it fails
    //   return
     $tabledata=xarModAPIFunc('sitetools','admin','optimizedb',
                      array('dbname' => $dbname));

       $total_gain= $tabledata['total_gain'];
       $total_gain = round ($total_gain,3);
       //Add this new optimization record to the database
       return xarModAPIFunc('sitetools',
                              'admin',
                              'create',
                              array('totalgain' => $total_gain));
                              
    return true;
}

?>
