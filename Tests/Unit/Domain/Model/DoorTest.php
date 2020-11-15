<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Frank Hasenbalg <frank@hasenbalg.org>
 */
class DoorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPosxReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPosx()
        );
    }

    /**
     * @test
     */
    public function setPosxForFloatSetsPosx()
    {
        $this->subject->setPosx(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'posx',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getPosyReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPosy()
        );
    }

    /**
     * @test
     */
    public function setPosyForFloatSetsPosy()
    {
        $this->subject->setPosy(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'posy',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getContentElementReturnsInitialValueFor()
    {
    }

    /**
     * @test
     */
    public function setContentElementForSetsContentElement()
    {
    }
}
