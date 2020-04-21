<?php

/**
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace App\Providers;

use Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind some classes related to the Google Ads API client library for
        $this->app->bind(
            'Google\Ads\GoogleAds\Lib\V3\GoogleAdsClientBuilder',
            function () {
                return new GoogleAdsClientBuilder();
            }
        );
        $this->app->bind(
            'Google\Auth\FetchAuthTokenInterface',
            function () {
                // Generate a refreshable OAuth2 credential for authentication
                // from the config file.
                return (new OAuth2TokenBuilder())->fromFile(
                    config('app.google_ads_php_path')
                )->build();
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
