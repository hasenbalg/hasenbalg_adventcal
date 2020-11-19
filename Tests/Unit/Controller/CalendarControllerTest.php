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

}
