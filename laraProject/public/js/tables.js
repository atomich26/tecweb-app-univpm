export { loadTable };

function loadTable() {
    if (typeof $('table.table') != 'undefined') {
        setBulkDeleteForm();
        setRowsSelectorsEvent();
        setDeleteBtn();
    } else
        console.log('Tabella non trovata!');
}

function enableBulkAction() {
    let selectedRows = document.querySelectorAll('input[type="checkbox"].selector:checked');
    let tbody = document.querySelector('.table tbody');
    
    if (selectedRows.length > 0) {
        tbody.classList.add('hide-actions');
        document.querySelector('#bulkActionBtn').style.display = "block";
    }
    else{
        document.querySelector('#bulkActionBtn').style.display = "none";
        tbody.classList.remove('hide-actions');
    }
}

function setRowsSelectorsEvent() {
    let rowsSelectors = document.querySelectorAll('input[type="checkbox"].selector');
    let selectAllToggle = document.querySelector('#selector-all');

    if (typeof rowsSelectors == 'undefined' && typeof selectAllToggle == 'undefined')
        return;
    
    selectAllToggle.onchange = (e) => {
        rowsSelectors.forEach(selector => {
            selector.checked = e.target.checked;
        });
        enableBulkAction();
    };

    rowsSelectors.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            enableBulkAction();
        });
    });
}

function setBulkDeleteForm() {
    let deleteForm = document.querySelector('form#delete-selected-form');
    let inputForm = document.querySelector('form#delete-selected-form input[name="items"]');
    
    if (typeof deleteForm == 'undefined' && typeof inputForm == 'undefined')
        return;
    
    deleteForm.onsubmit = () => {
        let checkedItems = [];      
        $('input[type="checkbox"].selector:checked').each(function(){
            checkedItems.push($(this).val());
        });

        if(!confirm(deleteForm.getAttribute('data-confirm').replace(':items', checkedItems.length)))
            return false;
        else
            inputForm.value = checkedItems;
    };
}

function setDeleteBtn() {  
    let deleteItemForms = document.querySelectorAll('form.destroy');
    
    deleteItemForms.forEach(form => {
        form.onsubmit = function () {
            let dataConfirm = form.querySelector('form.destroy button[type="submit"]').getAttribute('data-confirm');
            if (!confirm(dataConfirm))
            return false;
        }
    });
}