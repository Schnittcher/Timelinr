<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Kai Schnittcher 2013
 * @author     Kai Schnittcher <http://www.schnittcher.info>
 * @package    Timelinr
 * @license    Free under the MIT license.
 * @filesource
 */


$GLOBALS['TL_CSS'][] = 'system/modules/timelinr/html/css/style_v.css';
 $GLOBALS['TL_JAVASCRIPT'][]  = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
 $GLOBALS['TL_JAVASCRIPT'][]  = 'system/modules/timelinr/html/js/jquery.timelinr-0.9.52.js';
// Back end module
// Back end module

$GLOBALS['BE_MOD']['content']['Timelinr'] = array
(
    'tables' => array('tl_timelinr_timeline', 'tl_timelinr_timelineDaten'),
    'icon'			=> 'system/modules/timelinr/html/images/icon.png',
);



// Front end modules
array_insert($GLOBALS['FE_MOD']['miscellaneous'], 0, array
(
	'Timelinr' => 'ModuleTimelinr'
));



?>