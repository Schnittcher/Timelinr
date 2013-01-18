<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Kai Schnittcher 2013
 * @author     Kai Schnittcher <http://www.schnittcher.info>
 * @package    Timelinr
 * @license    Free under the MIT license.
 * @filesource
 */

 
/**
 * Table tl_cds
 */
$GLOBALS['TL_DCA']['tl_timelinr_timelineDaten'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
    	'ptable'				      => 'tl_timelinr_timeline',

	),
		
	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('jahr'),
			'flag'                    => 1,
			'headerFields'            => array('bezeichnung'),
			'panelLayout'             => 'search,limit',
			'child_record_callback'   =>  array('tl_timelinr_timelineDaten', 'listJahre')

		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
			'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
            ),

            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            ),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_timelinr_timelineDaten', 'toggleIcon')
			)
        )
	
	),
	
	// Palettes
	'palettes' => array
	(
		'default'                     => 'jahr;bezeichnung'
	),
	
	// Fields
	'fields' => array
	(
        'jahr' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['jahr'],
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('mandatory'=>true, 'maxlength'=>40, 'tl_class'=>'w50')
        ),
        'bezeichnung' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_timelinr_timelineDaten']['bezeichnung'],
            'inputType'               => 'textarea',
            'search'                  => true,
            'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'maxlength'=>999, 'tl_class'=>'w50')
        )
	)
);

/**
 * Class tl_timelinr_timelineDaten
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  
 * @author     
 * @package    
 */
class tl_timelinr_timelineDaten extends Backend {

	
	/**
	 * Return the "toggle visibility" button
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
			$this->redirect($this->getReferer());
		}

		$href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row['invisible'];

		if ($row['invisible'])
		{
			$icon = 'invisible.gif';
		}		

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}


	/**
	 * Toggle the visibility of an element
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
    	// Update the database
		$this->Database->prepare("UPDATE tl_timelinr_timelineDaten SET tstamp=". time() .", invisible='" . ($blnVisible ? '' : 1) . "' WHERE id=?")
					   ->execute($intId);

		
	}

	/**
	 * List Jahre
	 */
	public function listJahre($arrRow)
	{
			return '<div class="limit_height block">
			<strong>'. $arrRow['jahr'] .'</strong></div>';
	}
}


?>