@extends('layouts.forms', ['title' => 'Modifica FAQ'])

@section('content')
    @include('forms.modify-faq')
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
				console.error( 'Oops, something went wrong!' );
				console.error( error );
			} );

            ClassicEditor.create( document.querySelector( 'textarea#risposta' ), {
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
				console.error( 'Oops, something went wrong!' );
				console.error( error );
			} );
</script>
@endsection