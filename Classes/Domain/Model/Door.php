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
     * make bigger door
     *
     * @var bool
     */
    protected $isbigger = false;

    /**
     * mumber day of the month
     *
     * @var int
     * @validate NotEmpty, \HasenbalgOrg\HasenbalgAdventcal\Validation\Validator\DateUniqueValidator
     */
    protected $daynum = null;

    /**
     * vertical position in %
     *
     * @var float
     * @validate NotEmpty
     */
    protected $posx = 0.0;

    /**
     * horizontal position in %
     *
     * @var float
     * @validate NotEmpty
     */
    protected $posy = 0.0;

    /**
     * @var \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\TtContent
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     * @validate NotEmpty
     */
    protected $contentElement = null;


    /**
     * Returns the daynum
     *
     * @return int $daynum
     */
    public function getDaynum()
    {
        return $this->daynum;
    }

    /**
     * Sets the daynum
     *
     * @param int $daynum
     * @return void
     */
    public function setDaynum(int $daynum)
    {
        $this->daynum = $daynum;
    }

    /**
     * Returns the isbigger
     *
     * @return bool $isbigger
     */
    public function getIsbigger()
    {
        return $this->isbigger;
    }

    /**
     * Sets the isbigger
     *
     * @param bool $isbigger
     * @return void
     */
    public function setisbigger(bool $isbigger)
    {
        $this->isbigger = $isbigger;
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

    /**
     * Returns the posx
     *
     * @return float $posx
     */
    public function getPosx()
    {
        return $this->posx;
    }

    /**
     * Sets the posx
     *
     * @param float $posx
     * @return void
     */
    public function setPosx($posx)
    {
        $this->posx = $posx;
    }

    /**
     * Returns the posy
     *
     * @return float $posy
     */
    public function getPosy()
    {
        return $this->posy;
    }

    /**
     * Sets the posy
     *
     * @param float $posy
     * @return void
     */
    public function setPosy($posy)
    {
        $this->posy = $posy;
    }
}
