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
<div class="card">
    <div class="card-header">
        Pause a campaign of the specified customer ID
    </div>
    <div class="card-body">
        <form action="{{ url('pause-campaign') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="customerId" class="col-sm-2 col-form-label">Customer ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="customerId" name="customerId"
                           aria-describedby="customerIdHelp"
                           placeholder="Enter your customer ID" required>
                    <small id="customerIdHelp" class="form-text text-muted">The ID of the
                        customer account to pause the campaign from, e.g., 1234567890.
                    </small>
                </div>
            </div>
            <div class="form-group row">
                <label for="campaignId" class="col-sm-2 col-form-label">Campaign ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="campaignId" name="campaignId"
                           aria-describedby="campaignIdHelp"
                           placeholder="Enter your campaign ID" required>
                    <small id="campaignIdHelp" class="form-text text-muted">The ID of the
                        campaign to pause, e.g., 1234567890.
                    </small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Pause Campaign</button>
                </div>
            </div>
        </form>
    </div>
</div>
