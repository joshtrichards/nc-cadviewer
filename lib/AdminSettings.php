<?php

namespace OCA\Cadviewer;

use OCP\Settings\ISettings;

use OCA\Cadviewer\Controller\SettingsController;


class AdminSettings implements ISettings {

    public function __construct(
        private SettingsController $settings,
    ) {
    }

    public function getForm() {
        $response = $settings->index();
        return $response;
    }

    public function getSection() {
        return "cadviewer";
    }

    public function getPriority() {
        return 50;
    }
}
