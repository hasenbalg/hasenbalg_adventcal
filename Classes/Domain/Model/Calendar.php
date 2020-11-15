<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Domain\Model;

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
 * Calendar
 */
class Calendar extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Background image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @validate NotEmpty
     * @cascade remove
     */
    protected $background = null;

    /**
     * Doors
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door>
     * @cascade remove
     */
    protected $doors = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->doors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the background
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $background
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Sets the background
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $background
     * @return void
     */
    public function setBackground(\TYPO3\CMS\Extbase\Domain\Model\FileReference $background)
    {
        $this->background = $background;
    }

    /**
     * Adds a Door
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door $door
     * @return void
     */
    public function addDoor(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door $door)
    {
        $this->doors->attach($door);
    }

    /**
     * Removes a Door
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door $doorToRemove The Door to be removed
     * @return void
     */
    public function removeDoor(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door $doorToRemove)
    {
        $this->doors->detach($doorToRemove);
    }

    /**
     * Returns the doors
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door> $doors
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * Sets the doors
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door> $doors
     * @return void
     */
    public function setDoors(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $doors)
    {
        $this->doors = $doors;
    }
}
