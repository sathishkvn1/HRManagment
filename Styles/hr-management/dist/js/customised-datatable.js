function customizeDataTable(tableId) {
  var filterInput = $('#' + tableId + '_filter input');

  // Create a custom filter container
  var customFilterDiv = document.createElement('div');
  customFilterDiv.className = 'parent_filter';

  // Create a Font Awesome search icon
  var searchIcon = document.createElement('i');
  searchIcon.className = 'fas fa-search';

  // Add the search icon and the search input to the custom filter container
  customFilterDiv.appendChild(searchIcon);
  customFilterDiv.appendChild(filterInput[0]);

  // Add the custom filter container above the filter container
  $('#' + tableId + '_filter').before(customFilterDiv);

  // Set a placeholder for the search input
  filterInput.attr('placeholder', 'Search...');
}


// $(document).on("click", ".add_new_button", function() {
//   $("#flag_id").val("0");
//   var data_table_id = $(this).attr("data-value");
 
//   // $("#" + data_table_id + "_modal").modal("show");
//   var modalId = "#" + data_table_id + "_modal";
//   $(modalId).modal("show");

//   // Clear text fields
//   $(modalId + ' input[type="text"]').val('');
//   // Reset select2 dropdowns
//   $(modalId + ' select').each(function() {
     
//     if ($(this).hasClass('select2')) {
//         $(this).val('').trigger('change');
//     }
// });


 
//     // $("#flag_id").val('0');
// });

// $(document).on("click", ".customise_filter_button", function() {
//   // Show the associated modal
//   $("#flag_id").val('0');
//   var data_table_id = $(this).attr("data-value");
//   $("#" + data_table_id + "_filter_modal").modal("show");
// });


 




// Create a function to display toasts
function showToast(icon, title, timer = 1000) {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: timer,
    customClass: {
      container: icon === 'success' ? 'custom-success-toast' : 'custom-error-toast' // Apply custom classes
    }
  });

  Toast.fire({
    icon: icon,
    title: title
  });
}
$( document ).ready(function() {
  $('.brq-payroll .select2').select2();
  $('.data-table-modal').on('hidden.bs.modal', function (e) {
    const modal = $(this);
      const formElement = modal.find('form');
    
      // Clear form fields
      clearForm(formElement);
    
      // Remove the validation messages
      formElement.find('.invalid-feedback').remove();
    
      // Remove the is-invalid class
      formElement.find('.is-invalid').removeClass('is-invalid');
  });
});


// $('.data-table-modal').on('hidden.bs.modal', function (e) {
//   alert("hai");
//   const modal = $(this);
//   const formElement = modal.find('form');

//   // Clear form fields
//   clearForm(formElement);

//   // Remove the validation messages
//   formElement.find('.invalid-feedback').remove();

//   // Remove the is-invalid class
//   formElement.find('.is-invalid').removeClass('is-invalid');
// });

// // Function to clear form fields
// function clearForm(form) {
//   form.find(':input').each(function() {
//     const element = $(this);
//     const type = element.attr('type');

//     switch (type) {
//       case 'text':
//       case 'password':
//       case 'textarea':
//       case 'select-one':
//         element.val('');
//         break;
//       case 'checkbox':
//       case 'radio':
//         element.prop('checked', false);
//         break;
//     }
//   });
// }


function clearForm(modal) {
  modal.find('input, textarea').val('');
  // modal.find('select').val('');
}
// ==== ./modal field blank automatically when a modal close




// script for tab steps
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

  var href = $(e.target).attr('href');
  var $curr = $(".process-model  a[href='" + href + "']").parent();
  $('.process-model li').removeClass();
  $curr.addClass("active");
  $curr.prevAll().addClass("visited");
  
  });
  // end  script for tab steps


// in edit remove select field
function removeNullOption(modalId) {
  var modal = $('#' + modalId);

  // Check if the modal with the given ID exists
  if (modal.length > 0) {
    // Find all select fields within the modal and remove the first option with value=""
    modal.find('select').each(function () {
      $(this).find('option[value=""]').remove();
    });
  } else {
    alert("Modal with ID '" + modalId + "' not found");
  }

 
  
}



