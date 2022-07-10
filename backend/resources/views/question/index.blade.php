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
                    @foreach ($questions as $question)
                        <x-dropdown-row :answers="$question->answers" :title="$question->question" :questionuuid="$question->uuid" />
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
                    $(this.nextElementSibling).slideToggle();
                });
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
    </script>
@endsection
