# Google Ads Client Library for PHP - Migration examples

This folder contains code examples that illustrate how to migrate from the AdWords API to the
Google Ads API in a step-by-step manner. The following code examples are provided.

## CampaignManagement

This folder contains a code example that shows how to create a Google Ads Search campaign. 
The code example does the following operations:

  - Create a budget
  - Create a campaign
  - Create an ad group
  - Create text ads
  - Create keywords

The code example starts with CreateCompleteCampaignAdWordsApiOnly.php that shows the whole
functionality developed in AdWords API. CreateCompleteCampaignBothApisPhase1.php through
CreateCompleteCampaignBothApisPhase4.php shows how to migrate functionality
incrementally from the AdWords API to the Google Ads API. CreateCompleteCampaignGoogleAdsApiOnly.php
shows the code example fully transformed into using the Google Ads API.

## Running the examples

To execute the examples, run `composer install` in this directory, then open `RunExample.php`,
fill in the required authentication credentials and parameters, then uncomment the example you
want to run and run `php RunExample.php` from the command line.