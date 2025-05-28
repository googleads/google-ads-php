# Google Ads API PHP Client Library Code Examples

This directory contains a variety of code examples demonstrating how to use the Google Ads API PHP Client Library. The examples are organized into subdirectories based on the API functionality they illustrate (e.g., `BasicOperations`, `AccountManagement`, `Remarketing`).

## Running the Examples

Most examples are command-line scripts. To run them:

1.  Ensure you have [set up your OAuth2 credentials and configured your `google_ads_php.ini` file](https://github.com/googleads/google-ads-php#getting-started) as described in the main library documentation.
2.  Navigate into the specific example's directory or ensure it's in your PHP include path.
3.  Run the script from your terminal, e.g., `php examples/BasicOperations/GetCampaigns.php --customerId YOUR_CUSTOMER_ID`.
4.  Most examples require a `--customerId`. Some may require additional arguments, which are usually specified in the script's comments or via a `--help` option if implemented with `ArgumentParser`.

The `LaravelSampleApp` is a more complex web application example; see its specific [README.md](LaravelSampleApp/README.md) for instructions.

## Adapting Examples for Production Use (Optimization Best Practices)

The examples provided are primarily for instructional purposes and to demonstrate specific API calls. When adapting this code for a production environment, consider the following best practices for optimization, robustness, and maintainability:

*   **Configuration Management:**
    *   Move away from hardcoded placeholder IDs (e.g., `INSERT_CUSTOMER_ID_HERE`).
    *   Reliably load all necessary configuration (developer token, client ID/secret, refresh token, login customer ID) from the `google_ads_php.ini` file or use environment variables, a parameter store, or other secure configuration management tools. Do not embed sensitive credentials directly in your code.

*   **Efficient Data Retrieval (FieldMasks and GAQL):**
    *   When fetching resources using `GET` operations (e.g., getting a specific campaign), always use a `FieldMask` (via `FieldMasks::allSetFieldsOf()` for updates or by manually specifying fields for reads) to request only the fields you need. This reduces latency and API resource usage.
    *   For reporting and searching (GAQL queries), be specific in your `SELECT` clause to only retrieve necessary fields. Avoid `SELECT *`-like queries.

*   **Error Handling and Logging:**
    *   Implement comprehensive `try-catch` blocks around all API calls to handle `GoogleAdsException` (for API errors) and `ApiException` (for core transport errors).
    *   Log detailed error information, including the request ID (`$googleAdsException->getRequestId()`), to a production-quality logging system for easier debugging.
    *   Provide user-friendly error messages instead of raw API error details.
    *   Consider retry mechanisms for transient errors, especially rate limit exceeded errors (see below).

*   **Managing API Rate Limits:**
    *   Be aware of [API rate limits](https://developers.google.com/google-ads/api/docs/best-practices/rate-limits).
    *   Implement exponential backoff and retry strategies if you encounter rate limit errors.
    *   Design your application to stay within limits by optimizing API calls (e.g., using batch jobs where appropriate).

*   **Batch Processing:**
    *   For making multiple changes (e.g., adding many keywords, updating several ad groups), use batch operations (e.g., `MutateJobService` or by sending multiple operations in a single mutate request to services like `CampaignService`, `AdGroupService`, etc.) where available. This is generally more efficient than many individual requests.

*   **Security:**
    *   Store OAuth2 refresh tokens and other credentials securely (e.g., encrypted, in a secure vault).
    *   Follow the principle of least privilege for API access.
    *   Keep your client library updated to the latest version for security patches.

*   **Input Validation:**
    *   Thoroughly validate all inputs (e.g., from users or other systems) before sending them to the API to prevent errors and potential security issues.

*   **PHP Specifics:**
    *   For web applications or long-running processes, ensure your PHP environment is optimized (e.g., OPcache enabled and configured).
    *   Use modern PHP versions for better performance and features.
    *   Follow PSR coding standards for maintainable code.

*   **Laravel Specific (for `LaravelSampleApp` users):**
    *   In production, use Laravel's caching mechanisms: `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`.
    *   Configure a robust queue worker for any background tasks.
    *   Set `APP_ENV=production` and `APP_DEBUG=false` in your `.env` file.

By considering these points, you can build more robust, efficient, and maintainable applications using the Google Ads API. Refer to the official [Google Ads API Best Practices documentation](https://developers.google.com/google-ads/api/docs/best-practices/overview) for more comprehensive guidance.
