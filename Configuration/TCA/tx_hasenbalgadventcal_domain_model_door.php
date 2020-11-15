<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door',
        'label' => 'daynum',
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
        'searchFields' => 'daynum,isbigger,posx,posy,content_element',
        'iconfile' => 'EXT:hasenbalg_adventcal/Resources/Public/Icons/tx_hasenbalgadventcal_domain_model_door.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, daynum, isbigger, posx, posy, content_element',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, daynum, isbigger, posx, posy, content_element, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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


        'daynum' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.date',
            'config' => [
                'dbType' => 'int',
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['1', '1'],
                    ['2', '2'],
                    ['3', '3'],
                    ['4', '4'],
                    ['5', '5'],
                    ['6', '6'],
                    ['7', '7'],
                    ['8', '8'],
                    ['9', '9'],
                    ['10', '10'],
                    ['11', '11'],
                    ['12', '12'],
                    ['13', '13'],
                    ['14', '14'],
                    ['15', '15'],
                    ['16', '16'],
                    ['17', '17'],
                    ['18', '18'],
                    ['19', '19'],
                    ['20', '20'],
                    ['21', '21'],
                    ['22', '22'],
                    ['23', '23'],
                    ['24', '24'],
                ],
                'size' => 1,
                'eval' => 'required,unique',
                'default' => null,
            ],
        ],
        'isbigger' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.isbigger',
            'config' => [
                'type' => 'check',
                'items' => [
                    [ 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.isbigger.enabled', '1' ],
                ],
            ]
        ],
        'posx' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.posx',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            ]
        ],
        'posy' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang_db.xlf:tx_hasenbalgadventcal_domain_model_door.posy',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            ]
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
                'eval' => 'required',
            ],
        ],

        'calendar' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
