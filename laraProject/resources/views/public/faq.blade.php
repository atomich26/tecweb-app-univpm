@extends('layouts.public', ['title' => 'FAQ', 'headerPage' => true])

@php
    $imgCover = 'faq_cover.jpg';
    $description = 'Per qualsiasi informazioni su Electrohm o su un nostro prodotto consulta le Frequently Asked Questions per soddisfare ogni tuo bisogno.'
@endphp

@section('content')
    <div class="container" style="min-height: 300px">
        @if($faqs->total() > 0)
            <ul class="faq">   
                @foreach ($faqs as $faq)
                    <li>
                        <h2 class="question">{!! $faq->domanda !!}
                            <div class="plus-minus-toggle collapsed"></div>
                        </h2>
                        <div class="answer">{!! $faq->risposta !!}</div>        
                    </li>
                @endforeach
            </ul>
        @else
            @include('layouts-parts.empty-content')
        @endif
    </div>

    @if($faqs->hasPages())
        <div class="container">
            <div class="faq-paginator flex-v-center">
                <h4 style="color:white">Disponibili {{ $faqs->total() }} faq</h4>
                {{ $faqs->links() }}
            </div>
        </div>
    @endif
@endsection

@section('js-scripts')
    <script> 
        window.onload = () => { 
            $('.faq li .question').click(function () {
                $(this).find('.plus-minus-toggle').toggleClass('collapsed');
                $(this).parent().toggleClass('active');
            });
        };
    </script>
@endsection
