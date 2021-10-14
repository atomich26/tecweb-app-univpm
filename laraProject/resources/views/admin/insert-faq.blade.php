@extends('layouts.forms', ['title' => 'Inserisci nuova FAQ'])

@section('content')
    @if(session('message'))
        <h4 class="alert-message {{ session('alertType') ?? '' }}">{{ __(session('message')) ?? '' }}</h4>
    @endif

    @include('forms.insert-faq')

    <a href = "{{route('faq.view')}}"> Torna alla Tabella FAQ</a>
@endsection

@section('js-scripts')
<script>
    ClassicEditor.create( document.querySelector( 'textarea#domanda' ), {
			toolbar: {
				items: [
					'bold',
					'italic',
					'|',
					'undo',
					'redo',
				]
			},
			language: 'it',
			licenseKey: '',
			} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Si è verificato un errore!' );
				console.error( error );
			} );

	ClassicEditor.create( document.querySelector( 'textarea#risposta' ), {
		toolbar: {
			items: [
				'heading',
				'|',
				'bold',
				'italic',
				'fontSize',
				'fontBackgroundColor',
				'fontColor',
				'link',
				'alignment',
				'bulletedList',
				'numberedList',
				'|',
				'outdent',
				'indent',
				'|',
				'undo',
				'redo',
				'findAndReplace',
				'horizontalLine'
			]
		},
		language: 'it',
		licenseKey: '',
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( error => {
		console.error( 'Si è verificato un errore' );
		console.error( error );
	} );
</script>

@endsection
