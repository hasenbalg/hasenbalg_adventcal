<?php

namespace HasenbalgOrg\HasenbalgAdventcal\Hooks;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\CacheService;

class ClearCacheOnSaveHook
{
    /**
     * hook that is called when an element shall get deleted
     *
     * @param string $table the table of the record
     * @param integer $id the ID of the record
     * @param array $record The accordant database record
     * @param boolean $recordWasDeleted can be set so that other hooks or
     * @param DataHandler $tcemainObj reference to the main tcemain object
     * @return   void
     */
    // function processCmdmap_postProcess($command, $table, $id, $value, &$dataHandler) {
    //     /* Does this trigger at all for the actions you need? */
    //     \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($command);
    //     die();
    //     if ($command == 'delete' ||
    //         $command == 'update' || 
    //         $command == 'move' || 
    //         $table == 'tx_yourext_domain_model_something') {
    //     }
    // }



    // public function processCmdmap_preProcess($command, $table, $id, $value, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
    //     \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($command);
    //     die();
    // }




    // public function processCmdmap_postProcess($command, $table, $id, $value, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
    //     \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($command);
    //     die();
    // }

    // public function processCmdmap_deleteAction($table, $id, $recordToDelete, $recordWasDeleted=NULL, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
    //     \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pObj);
    //     die();
    // }
    // public function processDatamap_afterAllOperations(\TYPO3\CMS\Core\DataHandling\DataHandler &$pObj)
    // {
    //     GeneralUtility::makeInstance(\TYPO3\CMS\Core\Cache\CacheManager::class)
    //         ->flushCaches();
    //     $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    //         \TYPO3\CMS\Core\Messaging\FlashMessage::class,
    //         'Flushed Caches, please reload the frontend',
    //         'Cache cleared!', // [optional] the header
    //         \TYPO3\CMS\Core\Messaging\FlashMessage::INFO, // [optional] the severity defaults to \TYPO3\CMS\Core\Messaging\FlashMessage::OK
    //         true // [optional] whether the message should be stored in the session or only in the \TYPO3\CMS\Core\Messaging\FlashMessageQueue object (default is false)
    //     );
    //     $flashMessageService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Messaging\FlashMessageService::class);
    //     $messageQueue = $flashMessageService->getMessageQueueByIdentifier();
    //     $messageQueue->addMessage($message);
    //     // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pObj);
    //     // die();
    // }
    public function processDatamap_postProcessFieldArray($status, $table, $id, array &$fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj)
    {
        if ($table == 'tx_hasenbalgadventcal_domain_model_calendar') {
            GeneralUtility::makeInstance(\TYPO3\CMS\Core\Cache\CacheManager::class)
                ->flushCaches();
            $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                \TYPO3\CMS\Core\Messaging\FlashMessage::class,
                'Flushed Caches, please reload the frontend',
                'Cache cleared!', // [optional] the header
                \TYPO3\CMS\Core\Messaging\FlashMessage::INFO, // [optional] the severity defaults to \TYPO3\CMS\Core\Messaging\FlashMessage::OK
                true // [optional] whether the message should be stored in the session or only in the \TYPO3\CMS\Core\Messaging\FlashMessageQueue object (default is false)
            );
            $flashMessageService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Messaging\FlashMessageService::class);
            $messageQueue = $flashMessageService->getMessageQueueByIdentifier();
            $messageQueue->addMessage($message);
        }
    }
    // public function processDatamap_afterDatabaseOperations($status, $table, $id, array $fieldArray, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
    //     \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pObj);
    //     die();
    // }






    // public function processDatamap_preProcessFieldArray(array &$fieldArray, $table, $id, \TYPO3\CMS\Core\DataHandling\DataHandler &$pObj) {
    //     \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pObj);
    //     die();
    // }
}
