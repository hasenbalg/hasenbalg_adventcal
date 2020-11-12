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
 * Door
 */
class Door extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * The day of the door.
     *
     * @var \DateTime
     * @validate NotEmpty
     */
    protected $date = null;

    /**
     * @var \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\TtContent
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $contentElement;

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the contentElement
     *
     * @return \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\TtContent $contentElement
     */
    public function getContentElement()
    {
        return $this->contentElement;
    }

    /**
     * Sets the contentElement
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\TtContent $contentElement
     * @return void
     */
    public function setContentElement(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\TtContent $contentElement)
    {
        $this->contentElement = $contentElement;
    }
}
