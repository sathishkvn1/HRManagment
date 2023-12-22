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
function showToast(icon, title, timer = 3000) {
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


//get option based on select date
function populateTimeOptions(startTime, endTime, selectId) {

  var selectElement = $("#" + selectId);

  // Clear existing options
  selectElement.empty();

  var startTimeParts = startTime.split(':');
  var endTimeParts = endTime.split(':');
  var startHour = parseInt(startTimeParts[0], 10);
  var startMinute = parseInt(startTimeParts[1], 10);

  var endHour = parseInt(endTimeParts[0], 10);
  var endMinute = parseInt(endTimeParts[1], 10);

  selectElement.append('<option value="">Please select a time</option>');

  for (var hour = startHour; hour <= endHour; hour++) {
      var minuteStart = (hour === startHour) ? startMinute : 0;
      var minuteEnd = (hour === endHour) ? endMinute : 60;

      for (var minute = minuteStart; minute < minuteEnd; minute += 15) {
          var formatted_hour_12 = (hour % 12) || 12;
          var formatted_minute = (minute < 10 ? '0' : '') + minute;
          var period = hour >= 12 ? 'PM' : 'AM';

          var formatted_time_12_hour = formatted_hour_12 + ':' + formatted_minute + ' ' + period;

          var formatted_hour_24 = (hour < 10 ? '0' : '') + hour;
          var formatted_time_24_hour = formatted_hour_24 + ':' + formatted_minute;

          selectElement.append('<option value="' + formatted_time_24_hour + '">' + formatted_time_12_hour + '</option>');
      }
  }

  // Uncomment the following code to include the end time options
  var formatted_end_time_24_hour = (endHour < 10 ? '0' : '') + endHour + ':' + (endMinute < 10 ? '0' : '') + endMinute;
  var period = endHour >= 12 ? 'PM' : 'AM';
  var formatted_end_time_12_hour = ((endHour % 12) || 12) + ':' + (endMinute < 10 ? '0' : '') + endMinute + ' ' + period;

  selectElement.append('<option value="' + formatted_end_time_24_hour + '">' + formatted_end_time_12_hour + '</option>');
}




// make it date fomate yyyy-mm-dd 
function formatDate(inputDate) {
  var date = new Date(inputDate);
  
  // Subtract one day from the current date
  date.setDate(date.getDate() +1);

  var year = date.getFullYear();
  var month = ("0" + (date.getMonth() + 1)).slice(-2);
  var day = ("0" + date.getDate()).slice(-2);
  
  return year + "-" + month + "-" + day;
}