<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'HasenbalgOrg.HasenbalgAdventcal',
            'Piadventcal',
            'Advent Calendar'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('hasenbalg_adventcal', 'Configuration/TypoScript', 'Advent Calendar');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hasenbalgadventcal_domain_model_door', 'EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_csh_tx_hasenbalgadventcal_domain_model_door.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hasenbalgadventcal_domain_model_door');

    }
);
