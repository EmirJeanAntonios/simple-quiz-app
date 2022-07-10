@props(['answers' => [], 'title' => '', 'question'])


<div class="dropdown-row py-3">
    <div class="title-container d-flex justify-content-between" style="cursor: pointer">
        <div class="title">
            <h3>{{ $title }}</h3>
        </div>
        <div class="operations">
            <div class="btn-group">
                <a href="{{ route('question.edit', $question) }}" class="btn btn-primary">
                    <i class="mdi mdi-wrench"></i>
                </a>
                <button type="button" class="btn btn-danger question-delete" data-questionuuid="{{ $question->uuid }}">
                    <i class="mdi mdi-delete"></i>
                </button>
            </div>
        </div>
        <div class="dropdown-button">
            <i class="mdi mdi-arrow-down-drop-circle-outline" style="font-size: 1.3rem"></i>
        </div>
    </div>

    <div class="entities-container" style="display: none">
        <div class="options-bar">
            <div class="d-flex gap-4 mb-2 mt-2 justify-content-end">
                <a href="{{ route('answer.create', $question->uuid) }}" class="btn btn-success"
                    rel="noopener noreferrer">Create Answer +</a>
            </div>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>
                        Answer
                    </th>
                    <th>
                        Settings
                    </th>
                    <th>
                        Is Correct Answer?
                    </th>
                </tr>
            </thead>
            <tbody class="answers-table">
                @foreach ($answers as $answer)
                    @if ($answer->isActive)
                        <tr>
                            <td class="py-1">
                                {{ $answer->answer }}
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary" href="{{ route('answers.edit', $answer) }}">
                                        <i class="mdi mdi-wrench"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger answer-delete"
                                        data-answeruuid="{{ $answer->uuid }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <input type="radio" @if ($answer->isCorrect) checked @endif
                                    name="isCorrect-{{ $question->uuid }}" id="{{ $answer->uuid }}"
                                    value="{{ $answer->isCorrect }}">
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</div>
