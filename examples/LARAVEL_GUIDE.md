# Integrating the Google Ads PHP SDK into Laravel

This guide provides clean, standard code patterns for integrating the official Google Ads PHP SDK into a modern Laravel application (Laravel 10, 11, and above).

## 1. Installation

Install the Google Ads PHP SDK via Composer:

```bash
composer require googleads/google-ads-php
```

## 2. Configuration & Environment Variables

Add your Google Ads credentials to your `.env` file:

```dotenv
GOOGLE_ADS_DEVELOPER_TOKEN="your-developer-token"
GOOGLE_ADS_CLIENT_ID="your-oauth2-client-id"
GOOGLE_ADS_CLIENT_SECRET="your-oauth2-client-secret"
GOOGLE_ADS_REFRESH_TOKEN="your-oauth2-refresh-token"
GOOGLE_ADS_LOGIN_CUSTOMER_ID="1234567890" # Optional: MCC Manager Account ID without hyphens
```

Create a dedicated configuration file at `config/google_ads.php`:

```php
<?php

return [
    'developer_token' => env('GOOGLE_ADS_DEVELOPER_TOKEN'),
    'client_id' => env('GOOGLE_ADS_CLIENT_ID'),
    'client_secret' => env('GOOGLE_ADS_CLIENT_SECRET'),
    'refresh_token' => env('GOOGLE_ADS_REFRESH_TOKEN'),
    'login_customer_id' => env('GOOGLE_ADS_LOGIN_CUSTOMER_ID'),
];
```

## 3. Service Provider Implementation

Register the `GoogleAdsClient` as a singleton in `app/Providers/GoogleAdsServiceProvider.php`:

```php
<?php

namespace App\Providers;

use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Illuminate\Support\ServiceProvider;

class GoogleAdsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(GoogleAdsClient::class, function ($app) {
            $oAuth2Credential = (new OAuth2TokenBuilder())
                ->withClientId(config('google_ads.client_id'))
                ->withClientSecret(config('google_ads.client_secret'))
                ->withRefreshToken(config('google_ads.refresh_token'))
                ->build();

            $builder = (new GoogleAdsClientBuilder())
                ->withOAuth2Credential($oAuth2Credential)
                ->withDeveloperToken(config('google_ads.developer_token'));

            if ($loginCustomerId = config('google_ads.login_customer_id')) {
                $builder->withLoginCustomerId((int) $loginCustomerId);
            }

            return $builder->build();
        });
    }
}
```

Note for Laravel 11+: Register your provider in `bootstrap/providers.php`:

```php
return [
    App\Providers\AppServiceProvider::class,
    App\Providers\GoogleAdsServiceProvider::class,
];
```

## 4. Sample Controller

Here is a focused controller demonstrating dependency injection of `GoogleAdsClient` to run a Google Ads Query Language (GAQL) search:

```php
<?php

namespace App\Http\Controllers;

use Google\Ads\GoogleAds\Lib\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V17\GoogleAdsServerException;
use Google\Ads\GoogleAds\V17\Services\SearchGoogleAdsStreamRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GoogleAdsCampaignController extends Controller
{
    public function __construct(
        private GoogleAdsClient $googleAdsClient
    ) {}

    /**
     * Retrieve active campaigns for a given customer ID.
     */
    public function index(Request $request, string $customerId): JsonResponse
    {
        // Strip hyphens from customer ID if present
        $cleanCustomerId = str_replace('-', '', $customerId);

        $googleAdsServiceClient = $this->googleAdsClient->getGoogleAdsServiceClient();

        $query = 'SELECT campaign.id, campaign.name, campaign.status ' .
                 'FROM campaign ' .
                 'WHERE campaign.status = "ENABLED" ' .
                 'ORDER BY campaign.id';

        $requestStream = new SearchGoogleAdsStreamRequest([
            'customer_id' => $cleanCustomerId,
            'query' => $query,
        ]);

        try {
            $stream = $googleAdsServiceClient->searchStream($requestStream);
            $campaigns = [];

            foreach ($stream->iterateAllElements() as $googleAdsRow) {
                $campaign = $googleAdsRow->getCampaign();
                $campaigns[] = [
                    'id' => $campaign->getId(),
                    'name' => $campaign->getName(),
                    'status' => $campaign->getStatus(),
                ];
            }

            return response()->json([
                'status' => 'success',
                'data' => $campaigns,
            ]);
        } catch (GoogleAdsServerException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'errors' => array_map(fn($err) => $err->getMessage(), iterator_to_array($e->getGoogleAdsFailure()->getErrors())),
            ], 500);
        }
    }
}
```
