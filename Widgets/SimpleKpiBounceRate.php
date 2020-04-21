<?php

namespace Piwik\Plugins\SimpleKpi\Widgets;

use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

class SimpleKpiBounceRate extends Widget
{

    /**
     * Configure the widget
     *
     * @param WidgetConfig $config
     */
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('Simple KPI');

        $config->setName('General_ColumnBounceRate');
    }


    /**
     * Render the widget
     *
     * @return string
     */
    public function render()
    {
        $result = \Piwik\API\Request::processRequest('API.get', ['format' => 'PHP']);

        return $this->renderTemplate('widget', ['value' => $result['bounce_rate']]);
    }

}