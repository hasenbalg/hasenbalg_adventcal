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
 * CalendarController
 */
class CalendarController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * calendarRepository
     *
     * @var \HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\CalendarRepository
     * @inject
     */
    protected $calendarRepository = null;

 
    /**
     * action index
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar
     * @return void
     */
    public function indexAction()
    {
        $calendarId = $this->settings['calendar'];
        $calendar = $this->calendarRepository->findByUid($calendarId);
        $this->view->assign('calendar', $calendar);
    }
}
