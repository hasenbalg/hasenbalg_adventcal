<?php
defined('TYPO3_MODE') or die();

/***************
 * Plugin
 */
// \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
//     'hasenbalg_adventcal',
//     'Pi1',
//     'LLL:EXT:news/Resources/Private/Language/locallang_be.xlf:pi1_title'
// );

// $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['news_pi1'] = 'recursive,select_key,pages';
// $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['news_pi1'] = 'pi_flexform';
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
//     'news_pi1',
//     'FILE:EXT:news/Configuration/FlexForms/flexform_news.xml'
// );

// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_news_domain_model_news');

foreach (['crdate', 'tstamp'] as $fakeField) {
    if (!isset($GLOBALS['TCA']['tt_content']['columns'][$fakeField])) {
        $GLOBALS['TCA']['tt_content']['columns'][$fakeField] = [
            'label' => $fakeField,
            'config' => [
                'type' => 'passthrough',
            ]
        ];
    }
}
//flexform
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['hasenbalgadventcal_piadventcal'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'hasenbalgadventcal_piadventcal',
    // Flexform configuration schema file
    'FILE:EXT:hasenbalg_adventcal/Configuration/FlexForms/Registration.xml'
);
