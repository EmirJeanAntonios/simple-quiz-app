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
                                                <a class="btn btn-primary"
                                                    href="{{ route('survey.edit', (string) $survey->uuid) }}">
                                                    <i class="mdi mdi-wrench"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger"
                                                    data-surveyuuid="{{ $survey->uuid }}">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('question.index', $survey->uuid) }}"
                                                class="btn btn-info">See
                                                questions</a>
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


@section('script')
    <script>
        $(".btn-danger").click(function(e) {
            const surveyuuid = this.dataset.surveyuuid;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "delete",
                        url: "/survey/" + surveyuuid,
                        data:{
                            "_token":"{{csrf_token()}}"
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Survey has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location.reload();
                            })
                        }
                    })

                }
            })
        })
    </script>
@endsection
