<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Frank Hasenbalg <frank@hasenbalg.org>
 */
class CalendarTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Calendar();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBackgroundReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getBackground()
        );
    }

    /**
     * @test
     */
    public function setBackgroundForFileReferenceSetsBackground()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setBackground($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'background',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDoorsReturnsInitialValueForDoor()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDoors()
        );
    }

    /**
     * @test
     */
    public function setDoorsForObjectStorageContainingDoorSetsDoors()
    {
        $door = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door();
        $objectStorageHoldingExactlyOneDoors = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDoors->attach($door);
        $this->subject->setDoors($objectStorageHoldingExactlyOneDoors);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDoors,
            'doors',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addDoorToObjectStorageHoldingDoors()
    {
        $door = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door();
        $doorsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $doorsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($door));
        $this->inject($this->subject, 'doors', $doorsObjectStorageMock);

        $this->subject->addDoor($door);
    }

    /**
     * @test
     */
    public function removeDoorFromObjectStorageHoldingDoors()
    {
        $door = new \HasenbalgOrg\HasenbalgAdventcal\Domain\Model\Door();
        $doorsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $doorsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($door));
        $this->inject($this->subject, 'doors', $doorsObjectStorageMock);

        $this->subject->removeDoor($door);
    }
}
