<?php

namespace HasenbalgOrg\HasenbalgAdventcal\Validator;

use HasenbalgOrg\HasenbalgAdventcal\Domain\Repository\DoorRepository;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

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
        echo 'huhu';
        var_dump($this->doorRepository->findByDate($value));
        die();
        if(is_null($value)){
            $this->addError('Date must be set.', 12215639898798773);
            return false;
        }

        if (!$this->doorRepository->findByDaynum($value)) {
            $this->addError('Date must be unique.', 12215639998798773);
            return false;
        }
        return true;
        
    }
}
