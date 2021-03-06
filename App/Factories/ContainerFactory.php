<?php
namespace App\Factories;

use DI\ContainerBuilder;
use DI\FactoryInterface;

class ContainerFactory {

    public function __invoke()
    {
        $builder = new ContainerBuilder();
        if (PRODUCTION) {
            $builder->enableDefinitionCache();
            $builder->enableCompilation('tmp');
            $builder->writeProxiesToFile(true, 'tmp/proxies');
        }

        $files = require 'config/__.php';
        foreach ($files as $file) {
            $builder->addDefinitions($file);
        }
        return $builder->build();
    }

}
