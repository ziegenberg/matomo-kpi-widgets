<?php

namespace Piwik\Plugins\KPIWidgets\Widgets;

use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

class KPIWidgetsAverageTimeGeneration extends Widget
{

    /**
     * Configure the widget
     *
     * @param WidgetConfig $config
     */
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('KPI Widgets');

        $config->setName('General_ColumnAverageGenerationTime');

    }


    /**
     * Render the widget
     *
     * @return string
     */
    public function render()
    {
        $result = json_decode(\Piwik\API\Request::processRequest('API.get', ['format' => 'json']));

        $value = gmdate('i \m\i\n s\s', $result->avg_time_on_site);

        return $this->renderTemplate('widget', ['value' => $value]);
    }
}