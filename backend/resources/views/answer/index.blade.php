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
                        <x-dropdown-row :answers="$question->answer" :title="$question->question" :questionuuid="$question->uuid" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

<script>
    document.querySelectorAll(".dropdown-row").forEach(row => {
        const titleContainer = row.querySelector(".title-container");
        titleContainer.addEventListener("click",function(e){
            $(this.nextElementSibling).slideToggle();
        });
    });
</script>

@endsection
