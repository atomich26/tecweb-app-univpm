@extends('layouts.public', ['title' => 'Centri assistenza', 'headerPage' => true])

@php
    $imgCover = 'centri_cover.jpg';
    $description = 'Puoi contare su una fitta rete di centri d\'assistenza certificati Electrohm Professional pronti per ogni tuo problema.'
@endphp

@section('content')
<div class="container" style="min-height: 300px">
    <div class="centri-title flex-v-center" style="justify-content: space-between">
        <div>
            @php
                if($selected != null)
                    $sentence = "Centri assistenza a ${selected}";
                else
                    $sentence = "Tutti i centri assistenza";
            @endphp
            <h2 class="widget-title">{{ $sentence }}</h2>
        </div>
            <div class="flex-v-center">
                @if(count($città) > 1)
                    {!! Form::label('città', 'Filtra per città: ') !!}
                    {{ Form::select('città', $città, $selected, ['placeholder' => 'Seleziona...', 'id' => 'place-select', 'data-url' => route('centri-assistenza')]) }}
                    @if($selected != null)
                        <a href="{{ route('centri-assistenza') }}" class="cancel-search button"><i class="bi bi-x-circle"></i> Annulla ricerca</a>
                    @endif
                @endif
            </div>
    </div>

   @if($centri->total() > 0)
        <ul class="accordion">   
            @foreach ($centri as $centro)
                <li>
                    <h2 class="title">{!! $centro->ragione_sociale . " - " . $centro->città  !!}
                        <div class="plus-minus-toggle collapsed"></div>
                    </h2>
                    <div class="content">
                        <h4 class="centro-info"><i class="bi bi-envelope-fill"></i> Email: <span>{!! link_to('emailto:' . $centro->email, $centro->email, true) !!}</span></h4>
                        <h4 class="centro-info"><i class="bi bi-telephone-fill"></i> Telefono: <span>{!! link_to('tel:' . $centro->telefono, $centro->telefono, true) !!}</span></h4>
                        <h4 class="centro-info"><i class="bi bi-globe"></i> Sito web: <span>{!! link_to($centro->sito_web, $centro->sito_web, true) !!}</span></h4>
                        <h4 class="centro-info"><i class="bi bi-geo-alt-fill"></i> Luogo: <span>{{ $centro->via  . ", " . $centro->città . " " . $centro->cap}}</span></h4>
                        <br>
                        <h4>{{ $centro->descrizione ?? 'Nessuna descrizione'}}</h4>
                    </div>        
                </li>
           @endforeach
        </ul>
    @else
        @include('layouts-parts.empty-content')
    @endif
</div>

    @if($centri->hasPages())
        <div class="container">
            <div class="item-paginator flex-v-center">
                <h4 style="color:white">Disponibili {{ $centri->total() }} centri assistenza</h4>
                {{ $centri->links() }}
            </div>
        </div>
    @endif
@endsection

@section('js-scripts')
    <script> 
        window.onload = () => { 
            let selectBox = document.querySelector('select#place-select');
            let cancelSearchBtn = document.querySelector('a.cancel-search.button');

            $('.accordion li .title').click(function (event) {
                $(this).find('.plus-minus-toggle').toggleClass('collapsed');
                $(this).parent().toggleClass('active');
            });

            selectBox.onchange = (event) => {
                if(event.target.value != ''){
                    window.location.assign(event.target.getAttribute('data-url') + "?place=" + event.target.value);
                    cancelSearchBtn.style.display = "block";
                }
            };

            if(cancelSearchBtn == null) return;
            
            cancelSearchBtn.onclick = (event) => {
                window.location.assign(selectBox.getAttribute('data-url'));
            };
        };
    </script>
@endsection