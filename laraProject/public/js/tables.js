export { loadTable };

function loadTable() {
    if (typeof $('table.table') != 'undefined') {
        setBulkDeleteForm();
        setRowsSelectorsEvent();
        setDeleteBtn();
    } else
        console.log('Tabella non trovata!');
}

function setRowsSelectorsEvent() {
    let table = $('table.table');
    let rowsSelectors = document.querySelectorAll('input[type="checkbox"].selector');
    let selectAllToggle = document.querySelector('#selector-all');

    if (rowsSelectors.length < 1 || typeof selectAllToggle == 'undefined')
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

    
    function enableBulkAction() {
        const isCheckedInputs = (item) => { return item.checked == true };
        const isAllChecked = Array.from(rowsSelectors).every(isCheckedInputs);

        if (isAllChecked) {
            table.addClass('hide-actions');
            selectAllToggle.indeterminate = !isAllChecked;
            selectAllToggle.checked = isAllChecked;
            return;
        }

        const isSomeChecked = Array.from(rowsSelectors).some(isCheckedInputs);
        
        if (isSomeChecked) {
            table.addClass('hide-actions');
            selectAllToggle.indeterminate = isSomeChecked;
        }
        else {
            table.removeClass('hide-actions');
            selectAllToggle.checked = isSomeChecked;
            selectAllToggle.indeterminate = isSomeChecked;
        }
    }
}

function setBulkDeleteForm() {
    let deleteForm = document.querySelector('form#delete-selected-form');
    let inputForm = document.querySelector('form#delete-selected-form input[name="items"]');
    
    if (deleteForm == null || inputForm == null)
        return;
    
    deleteForm.onsubmit = () => {
        let checkedItems = [];      
        let checkboxs = document.querySelectorAll('input[type="checkbox"].selector:checked');

        if (checkboxs.length < 1)
            return;
        
       checkboxs.forEach(item => {
            checkedItems.push(item.value);
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