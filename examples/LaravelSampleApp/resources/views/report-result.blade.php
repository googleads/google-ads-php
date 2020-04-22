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
    @include('includes.result-back')
    <div class="container-fluid mt-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                @foreach ($selectedFields as $field)
                    <th scope="col">{{ $field }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @forelse ($paginatedResults as $index => $row)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    @foreach ($selectedFields as $field)
                        <td>{{
                            $row[explode(".", $field)[0]][explode(".",$field)[1]] ?? 'N/A' }}</td>
                    @endforeach
                </tr>
            @empty
                <tr class="text-center"><td colspan="{{ count($selectedFields) + 1 }}">
                        <strong>No data for this query.</strong></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{ $paginatedResults->links() }}
    @include('includes.result-back')
@stop
