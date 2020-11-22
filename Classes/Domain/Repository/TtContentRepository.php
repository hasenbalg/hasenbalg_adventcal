<?php

namespace HasenbalgOrg\HasenbalgAdventcal\Domain\Repository;

/**
 * The repository for Doors
 */
class TtContentRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function initializeObject()
    {
        // get the current settings
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        // change the default setting, whether the storage page ID is ignored by the plugins (FALSE) or not (TRUE - default setting)
        $querySettings->setRespectStoragePage(FALSE);
        // store the new setting(s)
        $this->setDefaultQuerySettings($querySettings);
    }
    /**
     * Find Pids by ListType
     *
     * @param string $listType
     * @return  string array
     */
    public function getPidsWithListType($listType)
    {
        $query = $this->createQuery();
        $query->matching($query->equals('list_type', $listType));
        $ces = $query->execute();

        $pids = [];
        foreach ($ces as $ce) {
            $pid = $ce->getPid();
            if (is_null($pids[$pid])) {

                // demanded format in cache manager is something like 'pageId_0'
                array_push($pids, 'pageId_' . $pid);
            }
        }
        return $pids;
    }
}
