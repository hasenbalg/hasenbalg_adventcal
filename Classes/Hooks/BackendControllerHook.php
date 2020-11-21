<?php
namespace HasenbalgOrg\HasenbalgAdventcal\Hooks;

// use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

use TYPO3\CMS\Backend\Controller\BackendController;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This class adds Filelist related JavaScript to the backend
 */
class BackendControllerHook {

    protected $extensionname;

    public function __construct() {
        $this->extensionname =  "hasenbalg_adventcal";
    }

    /**
     * Adds Css
     *
     * @param array $configuration
     * @param BackendController $backendController
     */
    public function addCss(array $configuration, BackendController $backendController) {
        $path = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($this->extensionname);

        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addCssFile($path . '/Resources/Public/Css/be_adventcal.css');
    }

    /**
     * Adds JavaScript
     *
     * @param array $configuration
     * @param BackendController $backendController
     */
    public function addJavaScript(array $configuration, BackendController $backendController) {
        $path = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($this->extensionname);

        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        // Script müsste dann unter Resources/Public/JavaScript/Backend/Bemain.js liegen.
        $pageRenderer->loadRequireJsModule('/typo3conf/ext/hasenbalg_adventcal/Resources/Public/Js/be_adcentcal.js');
    }
}