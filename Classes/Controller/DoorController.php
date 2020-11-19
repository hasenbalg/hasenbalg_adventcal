<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Controller;

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
 * DoorController
 */
class DoorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * doorRepository
     *
     * @var \HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\DoorRepository
     * @inject
     */
    protected $doorRepository = null;

}
