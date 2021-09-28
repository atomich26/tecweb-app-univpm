@extends('layouts.admin', ['title' => 'Gestisci utenti'])

@section('content')
    {{ $table }}
@endsection

@section('js-scripts')
<script>
    window.onload = initTable();
    var selectors = document.querySelectorAll('input[type="checkbox"].selector');
    let tbody = document.querySelector('.table tbody');

    selectors.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            let selectedItems = document.querySelectorAll('input[type="checkbox"].selector:checked').length;

            if(selectedItems >= 2){
                document.querySelector('input#delete-selected').style.display = "block";
                tbody.classList.add('hide-actions');
            }
            else{
                document.querySelector('input#delete-selected').style.display = "none";
                tbody.classList.remove('hide-actions');
            }
        });
    });
  
function initTable() {
    var deleteForm = document.querySelector('form#delete-selected');
    var usersId = document.querySelector('form#delete-selected input[name="items"]');

    deleteForm.onsubmit = () => {
        var checkValues = [];      
        $('input[type="checkbox"].selector:checked').each(function(){
            checkValues.push($(this).val());
        });

        if(checkValues.length < 2){
            alert('Seleziona almeno 2 elementi!');
            return false;
        }
        else if(!confirm('Sei sicuro di voler eliminare ' + checkValues.length + " elementi?"))
            return false;
        else
            usersId.value = checkValues;
        
    };
}
var deleteItemForm = document.querySelectorAll('form.destroy');

deleteItemForm.forEach(form => {
    form.onsubmit = function() {
    let deleteItemConfirm = form.querySelector('form.destroy button[type="submit"]').getAttribute('data-confirm');
    
    if(!confirm(deleteItemConfirm))
        return false;
}
});
</script>
@endsection