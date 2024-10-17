<!--
  Copyright 2020 Google LLC

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->
<div class="card mt-3">
    <div class="card-header">
        Show a report for the specified customer ID using <a
                href="https://developers.google.com/google-ads/api/docs/query/overview"
                target="_blank">GAQL.</a>
    </div>
    <div class="card-body">
        <div class="alert alert-info" role="alert">
            All reports return the first 100 results retrieved <em>without</em>
            <a href="https://developers.google.com/google-ads/api/docs/reporting/zero-impressions">zero-impression</a>
            for the sake of brevity.
        </div>
        <form action="{{ url('show-report') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="customerId" class="col-sm-2 col-form-label">Customer ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="customerId" name="customerId"
                           aria-describedby="customerIdHelp"
                           placeholder="Enter your customer ID" required>
                    <small id="customerIdHelp" class="form-text text-muted">The ID of the
                        customer account to show the report for, e.g., 1234567890.
                    </small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="reportType" class="col-form-label">Type
                        <small id="reportTypeHelp" class="form-text text-muted">See all types
                            <a href="https://developers.google.com/google-ads/api/fields/v18/overview" target="_blank">here</a>.
                        </small>
                    </label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" id="reportType" name="reportType">
                        <option selected>campaign</option>
                        <option>customer</option>
                    </select>
                    <small id="reportTypeExplanation" class="form-text text-muted">Some fields
                        specific to the specified type will also be selected. For example,
                        <code>campaign.id</code> and
                        <code>campaign.status</code> will be selected when <code>
                            <a href="https://developers.google.com/google-ads/api/fields/v18/campaign"
                                    target="_blank">campaign</a>
                        </code> is specified.
                    </small>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-sm-2 col-form-label pt-0">
                        <a href="https://developers.google.com/google-ads/api/fields/v18/metrics"
                           target="_blank">Metric fields</a> to be retrieved:
                    </legend>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="impressions" name="impressions" value="metrics.impressions"
                                   checked>
                            <label class="form-check-label" for="impressions"><code>metrics.impressions</code></label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="clicks" name="clicks" value="metrics.clicks"
                                   checked>
                            <label class="form-check-label" for="clicks"><code>metrics.clicks</code></label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="ctr" name="ctr" value="metrics.ctr"
                                   checked>
                            <label class="form-check-label" for="ctr"><code>metrics.ctr</code></label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="reportRange" class="col-sm-2 col-form-label">Report date range</label>
                <div class="col-sm-2">
                    <select class="form-control" id="reportRange" name="reportRange">
                        <option selected>YESTERDAY</option>
                        <option>LAST_7_DAYS</option>
                        <option>LAST_WEEK_MON_SUN</option>
                        <option>LAST_MONTH</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="entriesPerPage" class="col-sm-2 col-form-label">Number of rows per page</label>
                <div class="col-sm-2">
                    <select class="form-control" id="entriesPerPage" name="entriesPerPage">
                        <option selected>20</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Show Report</button>
                </div>
            </div>
        </form>
    </div>
</div>
