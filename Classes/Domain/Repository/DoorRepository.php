<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Domain\Repository;

/***
 *
 * This file is part of the "Advent Calendar" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Frank Hasenbalg <frank@hasenbalg.org>, hasenbalg.org
 *
 ***/

/**
 * The repository for Doors
 */
class DoorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];
}
