<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SqlColumnAnalyzer;

class SqlAnalyzerServiceProvider extends ServiceProvider
{
  
    public function register(): void
    {
        $this->app->singleton(SqlColumnAnalyzer::class, function ($app) {
            return new SqlColumnAnalyzer();
        });
    }

    public function boot(): void
    {
        //
    }
}
