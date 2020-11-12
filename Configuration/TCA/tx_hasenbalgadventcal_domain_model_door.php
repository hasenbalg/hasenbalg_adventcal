<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door',
        'label' => 'date',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'date,content_element',
        'iconfile' => 'EXT:hasenbalg_adventcal/Resources/Public/Icons/tx_hasenbalgadventcal_domain_model_door.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, date, content_element',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, date, content_element, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_hasenbalgadventcal_domain_model_door',
                'foreign_table_where' => 'AND tx_hasenbalgadventcal_domain_model_door.pid=###CURRENT_PID### AND tx_hasenbalgadventcal_domain_model_door.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.date',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date,required',
                'default' => null,
            ],
        ],
        'content_element' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.content_element',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'minitems' => 1,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],

        // 'content_elements' => [
        //     'exclude' => true,
        //     'label' => $ll . 'tx_news_domain_model_news.content_elements',
        //     'config' => [
        //         'type' => 'inline',
        //         'allowed' => 'tt_content',
        //         'foreign_table' => 'tt_content',
        //         'foreign_sortby' => 'sorting',
        //         'foreign_field' => 'tx_news_related_news',
        //         'minitems' => 0,
        //         'maxitems' => 99,
        //         'appearance' => [
        //             'useXclassedVersion' => $configuration->getContentElementPreview(),
        //             'collapseAll' => true,
        //             'expandSingle' => true,
        //             'levelLinksPosition' => 'bottom',
        //             'useSortable' => true,
        //             'showPossibleLocalizationRecords' => true,
        //             'showRemovedLocalizationRecords' => true,
        //             'showAllLocalizationLink' => true,
        //             'showSynchronizationLink' => true,
        //             'enabledControls' => [
        //                 'info' => false,
        //             ]
        //         ],
        //         'behaviour' => [
        //             'allowLanguageSynchronization' => true,
        //         ],
        //     ]
        // ],

    ],
];
