<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013, Arno Dudek <webmaster@adgrafik.at>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Plugin 'Grid Element' for the 'gridelements' extension.
 *
 * @author	Arno Dudek <webmaster@adgrafik.at>
 * @package	TYPO3
 * @subpackage	tx_gridelements
 */
class Tx_AdxSocialshareprivacy_Controller_DefaultController extends \Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * The main method of the PlugIn
	 *
	 * @return string
	 */
	public function indexAction() {

		$contentObject = $this->configurationManager->getContentObject();

		if (isset($this->settings['flexform'])) {
			$this->mergeFlexformValuesWithContentObjectData($contentObject, $this->settings['flexform']);
		}

		$typoScriptSetup = Tx_Extbase_Utility_TypoScript::convertPlainArrayToTypoScriptArray($this->settings['setup']);

		$content = $contentObject->cObjGetSingle($this->settings['setup']['_typoScriptNodeValue'], $typoScriptSetup);

		return $content;
	}

	/**
	 * Converts $this->cObj->data['pi_flexform'] from XML string to flexForm array.
	 *
	 * @param array $flexform
	 * @return void
	 */
	protected function mergeFlexformValuesWithContentObjectData($contentObject, array $flexform, $fieldNamePrefix = 'tx_adxsocialshareprivacy') {
		foreach ($flexform as $key => $value) {
			$fieldName = $fieldNamePrefix . '_' . $key;
			if (is_array($value)) {
				$this->mergeFlexformValuesWithContentObjectData($contentObject, $value, $fieldName);
			} else {
				$contentObject->data[$fieldName] = $value;
			}
		}
	}
}

?>