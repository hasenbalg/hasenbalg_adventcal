<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'HasenbalgOrg.HasenbalgAdventcal',
            'Piadventcal',
            [
                'Calendar' => 'index'
            ],
            // non-cacheable actions
            [
                'Door' => '',
                'Calendar' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    piadventcal {
                        iconIdentifier = hasenbalg_adventcal-plugin-piadventcal
                        title = LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalg_adventcal_piadventcal.name
                        description = LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalg_adventcal_piadventcal.description
                        tt_content_defValues {
                            CType = list
                            list_type = hasenbalgadventcal_piadventcal
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'hasenbalg_adventcal-plugin-piadventcal',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:hasenbalg_adventcal/Resources/Public/Icons/user_plugin_piadventcal.svg']
			);
		
    }
);
