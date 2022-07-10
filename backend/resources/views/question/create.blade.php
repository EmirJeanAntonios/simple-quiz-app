@extends('layouts.admin')


@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('question.index',$question->survey) }}" class="btn btn-primary">
                <i class="mdi mdi-keyboard-backspace"></i>
            </a>
        </div>
    </div>
    <x-info-message />

    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">



            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Question</h4>

                    <form class="forms-sample" method="POST" action="{{ route('question.store', $surveyuuid) }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="question" required class="form-control" id="exampleInputUsername1"
                                placeholder="Question">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
