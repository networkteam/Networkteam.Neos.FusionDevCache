<?php
namespace Networkteam\Neos\FusionDevCache;

use Neos\Flow\Cache\CacheManager;
use Neos\Flow\Core\Bootstrap;
use Neos\Flow\Monitor\FileMonitor;
use Neos\Flow\Package\Package as BasePackage;

class Package extends BasePackage
{

    public function boot(Bootstrap $bootstrap)
    {
        $dispatcher = $bootstrap->getSignalSlotDispatcher();

        $dispatcher->connect(FileMonitor::class, 'filesHaveChanged',
            function ($fileMonitorIdentifier, array $changedFiles) use ($bootstrap) {
                if ($fileMonitorIdentifier === 'Fusion_Files') {
                    $cacheManager = $bootstrap->getObjectManager()->get(CacheManager::class);
                    $cacheManager->getCache('Neos_Neos_Fusion')->flush();
                }
            }
        );
    }
}
