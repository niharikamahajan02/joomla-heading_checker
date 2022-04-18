


<?php
// no direct access
defined( '_JEXEC' ) or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Language\Text;

/**
 * Skipto plugin to add accessible keyboard navigation to the site and administrator templates.
 *
 * @since  4.1
 */

class PlgSystemShortcut extends CMSPlugin
{

    protected $app;
    protected $_basePath = 'media/plg_system_heading';
    public function onBeforeCompileHead()
    {
        if ($this->app->isClient('administrator'))
        {
            $wa = $this->app->getDocument()->getWebAssetManager();

            if (!$wa->assetExists('script', 'heading'))
            {
                $wa->registerScript('heading', $this->_basePath . '/js/heading.js', [], ['defer' => true]);
            }
            $wa->useScript('heading');
            return true;
        }
        return true;
    }
}