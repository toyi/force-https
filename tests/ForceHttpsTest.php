<?php

namespace Toyi\ForceHttps\Tests;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;
use Toyi\ForceHttps\ForceHttps;
use Toyi\ForceHttps\ServiceProvider;

class ForceHttpsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        app()->register(ServiceProvider::class);
        app('router')->aliasMiddleware('force-https', ForceHttps::class);
    }

    public function test_unsecure_request_is_redirected()
    {
        Route::get('unsecure', function () {
            return response(200);
        })->middleware('force-https')->name('unsecure');
        $response = $this->get(route('unsecure'));
        $response->assertRedirect();
    }

    public function test_secure_request_is_not_redirected()
    {
        Route::group(['https'], function () {
            Route::get('secure', function () {
                return response(200);
            })->middleware('force-https')->name('secure');
        });

        $response = $this->get(route('secure'));
        $response->assertSuccessful();
    }

    public function test_unsecure_request_is_not_redirected_with_force_https_set_to_false_in_config()
    {
        Config::set('force-https.force-https', false);
        Route::get('unsecure', function () {
            return response(200);
        })->middleware('force-https')->name('unsecure');
        $response = $this->get(route('unsecure'));
        $response->assertSuccessful();
    }
}
