<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';

if (version_compare(TYPO3_branch, '6.1', '<')) {
	t3lib_div::loadTCA('tt_content');
}

$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

if (version_compare(TYPO3_branch, '6.0', '<')) {

	Tx_Extbase_Utility_Extension::registerPlugin(
		$_EXTKEY,
		'Pi1',
		'LLL:EXT:adx_socialshareprivacy/Resources/Private/Language/locallang_db.xml:tt_content.list_type'
	);

	t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'ad: Social Share Privacy');
	t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/DS.xml');

} else {

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,
		'Pi1',
		'LLL:EXT:adx_socialshareprivacy/Resources/Private/Language/locallang_db.xml:tt_content.list_type'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Social Share Privacy');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/DS.xml');

}

?>
