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


  var addId = tableId + '_add_new';
  var filterId = tableId + '_filter';
// Create a new button div with a button containing a Font Awesome icon for your new button
  var FilterButtonDiv = document.createElement('div');
  FilterButtonDiv.className = 'new_btn_div';
  FilterButtonDiv.innerHTML = '<button id="' + filterId + '" class="customise_filter_button" data-value="' + tableId + '" ><i class="fas fa-filter"></i>Filter</button>';



  // Create a "Cancel" button
  var cancelFilterButton = document.createElement('button');
  var cancelFilterButtonId = tableId + '_reset_filter';
  cancelFilterButton.id = cancelFilterButtonId;
  cancelFilterButton.className = 'cancel_filter_button';
  cancelFilterButton.innerHTML = '<i class="fas fa-times"></i> Cancel';
  // Initially hide the "Cancel" button
  cancelFilterButton.style.display = 'none';

  // Add the "Cancel" button to the container div
  


  // Create a button div with a button containing a Font Awesome icon for "Add New"
  var buttonDiv = document.createElement('div');
  buttonDiv.className = 'add_new_btn_div';
  buttonDiv.innerHTML = '<button id="' + addId + '" class="add_new_button" data-bs-toggle="modal" data-value="' + tableId + '" ><i class="fas fa-plus"></i> Add New</button>';

  // Add the custom filter and button divs to a parent div
  var containerDiv = document.createElement('div');
  containerDiv.className = 'parent_filter_and_btn';
  var container_div_add_fiter = document.createElement('div');
  container_div_add_fiter.className = 'add_and_filter_group';



  container_div_add_fiter.appendChild(buttonDiv);
  container_div_add_fiter.appendChild(FilterButtonDiv);
  container_div_add_fiter.appendChild(cancelFilterButton);
  containerDiv.appendChild(customFilterDiv);
  containerDiv.appendChild(container_div_add_fiter);
  
  
  // containerDiv.appendChild(newButtonDiv);

  // Add the container div above the filter container
  $('#' + tableId + '_filter').before(containerDiv);
  // Set a placeholder for the search input
  filterInput.attr('placeholder', 'Search...');

  $('#' + cancelFilterButtonId).on("click", function() {
    // Clear the filter and redraw the DataTable
 
    var table = $('#' + tableId).DataTable();
    var modal = $('#' + tableId + '_filter_modal');
    modal.find("select").val("0");
    table.columns().search('');
    table.search('').draw();
  
    // Hide the "Cancel" button again
    $(this).hide();
    // Update the filter status text
   
  }); 
}

$(document).on("click", ".add_new_button", function() {
  $("#flag_id").val("0");
  var data_table_id = $(this).attr("data-value");
 
  // $("#" + data_table_id + "_modal").modal("show");
  var modalId = "#" + data_table_id + "_modal";
  $(modalId).modal("show");

  // Clear text fields
  $(modalId + ' input[type="text"]').val('');
  // Reset select2 dropdowns
  $(modalId + ' select').each(function() {
     
    if ($(this).hasClass('select2')) {
        $(this).val('').trigger('change');
    }
});


 
    // $("#flag_id").val('0');
});

$(document).on("click", ".customise_filter_button", function() {
  // Show the associated modal
  $("#flag_id").val('0');
  var data_table_id = $(this).attr("data-value");
  $("#" + data_table_id + "_filter_modal").modal("show");
});


 




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


// Call the function whenever you need to remove null options from the last opened modal


