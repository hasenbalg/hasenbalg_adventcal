<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'HasenbalgOrg.HasenbalgAdventcal',
            'Piadventcal',
            'Advent Calendar'
        );
        # register hook to clear the cache after saving the calendar
        // $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['ClearCacheOnSaveHook'][] = 'HasenbalgOrg\\HasenbalgAdventcal\\Hooks\\ClearCacheOnSaveHook';
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['hasenbalgadventcal'] = 'HasenbalgOrg\\HasenbalgAdventcal\\Hooks\\ClearCacheOnSaveHook';
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['hasenbalgadventcal'] = 'HasenbalgOrg\\HasenbalgAdventcal\\Hooks\\ClearCacheOnSaveHook';


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('hasenbalg_adventcal', 'Configuration/TypoScript', 'Advent Calendar');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hasenbalgadventcal_domain_model_door', 'EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_csh_tx_hasenbalgadventcal_domain_model_door.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hasenbalgadventcal_domain_model_door');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_hasenbalgadventcal_domain_model_calendar', 'EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_csh_tx_hasenbalgadventcal_domain_model_calendar.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_hasenbalgadventcal_domain_model_calendar');




        // If BE view - User logged in at BE
        if (TYPO3_MODE === 'BE' || TYPO3_MODE === 'FE' && isset($GLOBALS['BE_USER'])) {
            // add CSS and JS in TYPO3-BE
            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess'][]
                = \HasenbalgOrg\HasenbalgAdventcal\Hooks\BackendControllerHook::class . '->addCss';

            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess'][]
                = \HasenbalgOrg\HasenbalgAdventcal\Hooks\BackendControllerHook::class . '->addJavaScript';
        }
    }
);
