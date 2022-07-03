@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Surveys</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Survey Name
                                    </th>
                                    <th>
                                        Settings
                                    </th>
                                    <th>
                                        Questions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                    <tr>
                                        <td class="py-1">
                                            {{ $survey->name }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  class="btn btn-primary" href="{{route('survey.edit',(string)$survey->uuid)}}">
                                                    <i class="mdi mdi-wrench"></i>
                                                </a>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="ti-calendar"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="ti-time"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
