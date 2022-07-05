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
                                                <button type="button" class="btn btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route("question.index",$survey->uuid)}}" class="btn btn-info">See questions</a>
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
