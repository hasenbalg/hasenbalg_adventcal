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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $calendars = $this->calendarRepository->findAll();
        $this->view->assign('calendars', $calendars);
    }


    public function initializeShowAction()
    {
        // echo "<pre>";
        // var_dump($this->request-arguments);
        // die();
    }
    /**
     * action show
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar
     * @return void
     */
    public function showAction(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar)
    {
        $this->view->assign('calendar', $calendar);
    }
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

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $newCalendar
     * @return void
     */
    public function createAction(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $newCalendar)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calendarRepository->add($newCalendar);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar
     * @ignorevalidation $calendar
     * @return void
     */
    public function editAction(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar)
    {
        $this->view->assign('calendar', $calendar);
    }

    /**
     * action update
     *
     * @param \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar
     * @return void
     */
    public function updateAction(\HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar $calendar)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calendarRepository->update($calendar);
        $this->redirect('list');
    }
}
