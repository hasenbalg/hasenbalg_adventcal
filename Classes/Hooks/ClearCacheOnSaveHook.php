<?php

namespace HasenbalgOrg\HasenbalgAdventcal\Hooks;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\CacheService;

class ClearCacheOnSaveHook
{

    public function processDatamap_postProcessFieldArray($status, $table, $id, array &$fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj)
    {
        if ($table == 'tx_hasenbalgadventcal_domain_model_calendar') {
            try {
                // get pages containing the plugin and flush the cache
                $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
                $ttContentRepository = $objectManager->get(\HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\TtContentRepository::class);
                $pagesWithCalPlugin = $ttContentRepository->getPidsWithListType('hasenbalgadventcal_piadventcal');



                GeneralUtility::makeInstance(\TYPO3\CMS\Core\Cache\CacheManager::class)->flushCachesInGroupByTags('pages', $pagesWithCalPlugin);
                $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                    \TYPO3\CMS\Core\Messaging\FlashMessage::class,
                    \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang.xlf:cache.description', 'hasenbalgadventcal') . implode(', ', $pagesWithCalPlugin),
                    \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang.xlf:cache', 'hasenbalgadventcal'),
                    \TYPO3\CMS\Core\Messaging\FlashMessage::INFO, // [optional] the severity defaults to \TYPO3\CMS\Core\Messaging\FlashMessage::OK
                    true // [optional] whether the message should be stored in the session or only in the \TYPO3\CMS\Core\Messaging\FlashMessageQueue object (default is false)
                );
            } catch (\Throwable $th) {
                // tt_content gets not mapped correctly in 8.7.31. to hell with the cache 
                GeneralUtility::makeInstance(\TYPO3\CMS\Core\Cache\CacheManager::class)
                    ->flushCaches();
                $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                    \TYPO3\CMS\Core\Messaging\FlashMessage::class,
                    \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang.xlf:cache.full.description', 'hasenbalgadventcal'),
                    \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:hasenbalg_adventcal/Resources/Private/Language/locallang.xlf:cache.full', 'hasenbalgadventcal'),
                    \TYPO3\CMS\Core\Messaging\FlashMessage::INFO, // [optional] the severity defaults to \TYPO3\CMS\Core\Messaging\FlashMessage::OK
                    true // [optional] whether the message should be stored in the session or only in the \TYPO3\CMS\Core\Messaging\FlashMessageQueue object (default is false)
                );
            }
            $flashMessageService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Messaging\FlashMessageService::class);
            $messageQueue = $flashMessageService->getMessageQueueByIdentifier();
            $messageQueue->addMessage($message);
        }
    }
}
