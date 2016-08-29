<?php

namespace Hesto\MultiAuth\Commands;

use Hesto\Core\Commands\AppendContentCommand;
use Symfony\Component\Console\Input\InputOption;


class InstallSettingsCommand extends AppendContentCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'multi-auth:settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install settings in files';

    /**
     * Get the destination path.
     *
     * @return string
     */
    public function getSettings()
    {
        return [
            'guard' => [
                'path' => '/config/auth.php',
                'search' => "'guards' => [",
                'put' => __DIR__ . '/../stubs/config/guards.stub',
                'prefix' => false,
            ],
            'provider' => [
                'path' => '/config/auth.php',
                'search' => "'providers' => [",
                'put' => __DIR__ . '/../stubs/config/providers.stub',
                'prefix' => false,
            ],
            'kernel' => [
                'path' => '/app/Http/Kernel.php',
                'search' => 'protected $routeMiddleware = [',
                'put' => __DIR__ . '/../stubs/Middleware/Kernel.stub',
                'prefix' => false,
            ],
            'map_register' => [
                'path' => '/app/Providers/RouteServiceProvider.php',
                'search' => '$this->mapWebRoutes();' . '\r',
                'put' => __DIR__ . '/../stubs/routes/map-register.stub',
                'prefix' => false,
            ],
            'map_method' => [
                'path' => '/app/Providers/RouteServiceProvider.php',
                'search' => "    /**\n" . '     * Define the "web" routes for the application.',
                'put' => __DIR__ . '/../stubs/routes/map-method.stub',
                'prefix' => true,
            ],
            'web' => [
                'path' => '/routes/web.php',
                'search' => "    /**\n" . '     * Define the "web" routes for the application.',
                'append' => __DIR__ . '/../stubs/routes/web.stub',
                'prefix' => true,
            ],
        ];
    }
}
