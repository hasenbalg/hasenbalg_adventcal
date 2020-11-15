<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Frank Hasenbalg <frank@hasenbalg.org>
 */
class CalendarControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \HasenbalgOrg\HasenbalgAdventcal\Controller\CalendarController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\HasenbalgOrg\HasenbalgAdventcal\Controller\CalendarController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCalendarToView()
    {
        $calendar = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('calendar', $calendar);

        $this->subject->showAction($calendar);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenCalendarToCalendarRepository()
    {
        $calendar = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar();

        $calendarRepository = $this->getMockBuilder(\HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\CalendarRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $calendarRepository->expects(self::once())->method('add')->with($calendar);
        $this->inject($this->subject, 'calendarRepository', $calendarRepository);

        $this->subject->createAction($calendar);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenCalendarToView()
    {
        $calendar = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('calendar', $calendar);

        $this->subject->editAction($calendar);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenCalendarInCalendarRepository()
    {
        $calendar = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar();

        $calendarRepository = $this->getMockBuilder(\HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\CalendarRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $calendarRepository->expects(self::once())->method('update')->with($calendar);
        $this->inject($this->subject, 'calendarRepository', $calendarRepository);

        $this->subject->updateAction($calendar);
    }
}
