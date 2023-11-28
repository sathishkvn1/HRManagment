function clearInputFieldsAndTextareas() {
    $('input[type="text"], input[type="number"], input[type="password"], textarea').val('');
}

function uncheckAllCheckboxes() {
    $('input[type="checkbox"]').prop('checked', false);
}