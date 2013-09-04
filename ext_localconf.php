<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

if (version_compare(TYPO3_branch, '6.0', '<')) {

	Tx_Extbase_Utility_Extension::configurePlugin(
		$_EXTKEY,
		'Pi1',
		array(
			'Default' => 'index',
		),
		array()
	);

} else {

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::configurePlugin(
		$_EXTKEY,
		'Pi1',
		array(
			'Default' => 'index',
		),
		array()
	);
}
?>