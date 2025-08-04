<?php

declare(strict_types=1);

namespace OCA\Cadviewer\AppInfo;

use OCA\Cadviewer\Listeners\CSPListener;
use OCA\Cadviewer\Listeners\LoadScriptsListener;
use OCA\Cadviewer\AppConfig;
use OCA\Files\Event\LoadAdditionalScriptsEvent;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\Security\CSP\AddContentSecurityPolicyEvent;

/**
 * Class Application
 *
 * @package OCA\Cadviewer\AppInfo
 */
class Application extends App implements IBootstrap {
    public const APP_NAME = 'cadviewer';

    /**
     * Application configuration
     *
     * @var AppConfig
     */
    public AppConfig $appConfig;
    
    /**
     * Application constructor.
     *
     * @param array $urlParams
     */    
    public function __construct(array $urlParams = []) {
        parent::__construct(self::APP_NAME, $urlParams);
        
        $this->appConfig = new AppConfig(self::APP_NAME);
    }

    public function register(IRegistrationContext $context): void {
		$context->registerEventListener(AddContentSecurityPolicyEvent::class, CSPListener::class);
		$context->registerEventListener(LoadAdditionalScriptsEvent::class, LoadScriptsListener::class);
    }

    public function boot(IBootContext $context): void {
        // ...
    }
}
