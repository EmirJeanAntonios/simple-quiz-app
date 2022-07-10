@extends('layouts.admin')


@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{route('survey.index')}}" class="btn btn-primary">
                <i class="mdi mdi-keyboard-backspace"></i>
            </a>
        </div>
    </div>
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
                    @foreach ($questions as $question)
                        <x-dropdown-row :answers="$question->answers" :title="$question->question" :question="$question" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        if (document.querySelector(".dropdown-row") != null) {
            document.querySelectorAll(".dropdown-row").forEach(row => {
                const titleContainer = row.querySelector(".title-container");
                titleContainer.addEventListener("click", function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                   

                    $(this.nextElementSibling).slideToggle();
                });
                const operationsContainer = row.querySelector(".operations")
                operationsContainer.addEventListener("click",function(e){
                    e.stopPropagation();
                })
            });

            $(".answers-table input[type='radio']").click(function(e){
                let answer = this.id;
                let question = this.name.split("isCorrect-")[1];

                $.ajax({
                    method:"POST",
                    url:"{{route('answer.changeIsCorrect')}}",
                    data:{
                        answer,
                        question,
                        "_token":"{{csrf_token()}}"
                    }
                }).done(function(response){
                    console.log(response)
                })
                


            });
        }


        $(".btn-danger.question-delete").click(function(e) {
            const questionuuid = this.dataset.questionuuid;
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
                        url: "/question/" + questionuuid,
                        data:{
                            "_token":"{{csrf_token()}}"
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Question has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location.reload();
                            })
                        }
                    })

                }
            })
        })
        $(".btn-danger.answer-delete").click(function(e) {
            const answeruuid = this.dataset.answeruuid;
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
                        url: "/answers/" + answeruuid,
                        data:{
                            "_token":"{{csrf_token()}}"
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Answer has been deleted.',
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
