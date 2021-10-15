@extends('layouts.forms', ['title' => 'Inserisci nuova FAQ'])

@section('content')
    @include('forms.insert-faq')
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
				'bold',
				'italic',
				'fontSize',
				'fontBackgroundColor',
				'fontColor',
				'link',
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
