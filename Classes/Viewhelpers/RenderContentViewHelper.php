<?php

namespace HasenbalgOrg\HasenbalgAdventcal\ViewHelpers;

// thanks to https://www.andrerinas.de/tutorials/typo3-viewhelper-zum-rendern-von-tt-content-anhand-der-uid.html

class RenderContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    // output html since TYPO3 8LTS
    protected $escapeOutput = false;
  
    /**
     * Parse content element
     *
     * @param  int     UID des Content Element
     * @return   string  Geparstes Content Element
     */
    public function render($uid) {
      $conf = array( // config
        'tables' => 'tt_content',
        'source' => $uid,
        'dontCheckPid' => 1
      );
      return $this->objectManager->get('TYPO3\CMS\Frontend\ContentObject\RecordsContentObject')->render($conf);
    }
  }