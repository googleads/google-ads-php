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
@extends('layouts.default')
@section('content')
    <h2>Result</h2>
    <form>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Campaign ID</label>
            <div class="col-sm-4">
                <input readonly type="text" class="form-control" value="{{ $campaign['id'] }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Campaign Name</label>
            <div class="col-sm-4">
                <input readonly type="text" class="form-control" value="{{ $campaign['name'] }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Campaign Status</label>
            <div class="col-sm-4">
                <input readonly type="text" class="form-control" value="{{ $campaign['status'] }}">
            </div>
        </div>
    </form>

    @include('includes.result-back')
@stop
