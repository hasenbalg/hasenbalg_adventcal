<?php

namespace HasenbalgOrg\HasenbalgAdventcal\Validation\Validator;

use HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\DoorRepository;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;
// @todo gets not called yet
class DateUniqueValidator extends AbstractValidator
{
    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $objectManager;

    /**
     * @var DoorRepository
     */
    protected $doorRepository;



    protected function isValid($value)
    {
        $this->doorRepository = $this->objectManager->get(DoorRepository::class);
       

        if (!$this->doorRepository->findByDaynum($value)) {
            $this->addError('Date must be unique.', 12215639998798773);
            return false;
        }
        return true;
        
    }
}
