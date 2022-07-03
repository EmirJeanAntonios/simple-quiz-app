@extends('layouts.admin')


@section('content')
    <x-info-message />

    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Survey</h4>

                    <form class="forms-sample" method="POST" action="{{ route('survey.update',(string)$survey->uuid) }}">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                placeholder="Survey Name" required value="{{$survey->name}}">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
