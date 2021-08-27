@php
    $listItems = explode('•', $string);
@endphp

@isset($listItems)
    <ul style="padding-left: 20px">
        @if($listItems[0] != null && empty($listItems))
            @foreach ($listItems as $item)
                <li style="margin:10px 0"><p>{{ $item }}</p></li>
            @endforeach
        @else
            <h4>{{ __('Nessun contenuto disponibile') }}</h4>
        @endif
    </ul>
@endisset

@empty($listItems)
    <h4>{{ __('Nessun contenuto disponibile') }}</h4>
@endempty
