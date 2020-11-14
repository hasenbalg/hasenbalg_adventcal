<?php

namespace HasenbalgOrg\HasenbalgAdventcal\Domain\Validator;

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

        if (!$this->doorRepository->findByDate($value)) {
            return;
        }
        $this->addError('Date must be unique .', 12215639998798773);
    }
}
