@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">{{ $survey->name }} Questions</h4>
                        <a href="{{ route('question.create', $survey->uuid) }}" class="btn btn-success">
                            + Create Question
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Question Name
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
                                @foreach ($questions as $question)
                                    <tr>
                                        <td class="py-1">
                                            {{ $question->question }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-primary" href="{{ route('question.edit', $question) }}">
                                                    <i class="mdi mdi-wrench"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            {{-- <a href="{{route("question.index",$survey->uuid)}}" class="btn btn-info">See questions</a> --}}
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
