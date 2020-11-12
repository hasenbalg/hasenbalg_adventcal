<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Frank Hasenbalg <frank@hasenbalg.org>
 */
class DoorControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \HasenbalgOrg\HasenbalgAdventcal\Controller\DoorController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\HasenbalgOrg\HasenbalgAdventcal\Controller\DoorController::class)
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
    public function listActionFetchesAllDoorsFromRepositoryAndAssignsThemToView()
    {

        $allDoors = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $doorRepository = $this->getMockBuilder(\HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\DoorRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $doorRepository->expects(self::once())->method('findAll')->will(self::returnValue($allDoors));
        $this->inject($this->subject, 'doorRepository', $doorRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('doors', $allDoors);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDoorToView()
    {
        $door = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('door', $door);

        $this->subject->showAction($door);
    }
}
