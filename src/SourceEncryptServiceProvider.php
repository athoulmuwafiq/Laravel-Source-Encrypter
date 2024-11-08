<?php

/**
 * Laravel Source Encrypter.
 *
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 *
 * @author      Siavash Bamshadnia
 * @link        https://github.com/SiavashBamshadnia/Laravel-Source-Encrypter
 *
 * @author      Peter Kazakov
 * @link        https://github.com/kazak71/Laravel-Source-Encrypter 
 *
 * @author      Yacine REZGUI
 * @link        https://github.com/rezgui/Laravel-Source-Encrypter
 */

namespace rezgui\LaravelSourceEncrypter;

use Illuminate\Support\ServiceProvider;

class SourceEncryptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register hard-delete-expired artisan command
        $this->commands([
            SourceEncryptCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config file
        $configPath = __DIR__.'/../config/source-encrypter.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('source-encrypter.php');
        } else {
            $publishPath = base_path('config/source-encrypter.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }
}
