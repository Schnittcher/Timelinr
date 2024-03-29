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

class ModuleTimelinr extends Module
{
  protected $strTemplate = 'mod_ModuleTimelinr';



	protected function compile()
	{	

		$Historie = $this->Database->prepare("SELECT * FROM tl_timelinr_timelineDaten WHERE NOT invisible = 1 AND pid =? ORDER BY jahr DESC")->execute($this->timeline);
	    while ($Historie->next())
  {
		$arrHistorie[] = array
    (
      'jahr' => $Historie->jahr,
      'bezeichnung' => $Historie->bezeichnung
    );
	  $this->Template->Historie = $arrHistorie;
	}
	}


}
?>