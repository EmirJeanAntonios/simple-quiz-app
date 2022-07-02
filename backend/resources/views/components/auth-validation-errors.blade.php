@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>


        <ul class="mt-3"
            style="color: #fff;background-color: red;list-style: none;    padding: 15px;
        border-radius: 10px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
