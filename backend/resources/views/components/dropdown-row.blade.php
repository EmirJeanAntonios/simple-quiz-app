@props(['answers' => [], 'title' => '','questionuuid' => ''])


<div class="dropdown-row py-3">
    <div class="title-container d-flex justify-content-between" style="cursor: pointer">
        <div class="title">
            <h3>{{ $title }}</h3>
        </div>
        <div class="dropdown-button">
            <i class="mdi mdi-arrow-down-drop-circle-outline" style="font-size: 1.3rem"></i>
        </div>
    </div>
  
    <div class="entities-container" style="display: none">
        <div class="options-bar">
            <div class="d-flex gap-4 mb-2 mt-2 justify-content-end">
                <a href="{{route('answer.create',$questionuuid)}}" class="btn btn-success" rel="noopener noreferrer">Create Answer +</a>
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
            <tbody>
                @foreach ($answers as $answer)
                    <tr>
                        <td class="py-1">
                            {{ $answer->answer }}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary" href="{{ route('answers.edit', $answer) }}">
                                    <i class="mdi mdi-wrench"></i>
                                </a>
                                <button type="button" class="btn btn-danger">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </div>
                        </td>
                        <td>
                            <input type="radio" name="isCorrect-{{$questionuuid}}" id="" value="{{$answer->isCorrect}}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

