<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        Blueprint::macro('nullableUid', function (string $name = 'account') {
            $this->string("{$name}_uid", 34)->nullable();
        });

        Blueprint::macro('uid', function (string $name = 'account') {
            $this->string("{$name}_uid", 17)->index();
        });

        Blueprint::macro('uidMorphs', function (string $name) {
            $this->string("{$name}_uid", 34);
            $this->string("{$name}_type");
        });

        Blueprint::macro('nullableUidMorphs', function (string $name) {
            $this->string("{$name}_uid", 34)->nullable();
            $this->string("{$name}_type")->nullable();
        });

        Blueprint::macro('portalId', function () {
            $this->foreignId('portal_instance_id')->constrained('portal_instances')->onDelete('cascade');
        });
    }
}
