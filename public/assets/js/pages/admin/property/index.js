var tableVar = $('#propertyDataTable').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: {
        url: dateTableUrl, // URL to fetch data
        type: "POST",
        data: {
            _token: csrfToken, // CSRF token for security
        },
        beforeSend: function () {
            if (tableVar != null) {
                tableVar.settings()[0].jqXHR.abort(); // Abort previous request before sending new
            }
        },
        error: function (jqXHR, ajaxOptions, thrownError) {
            if (jqXHR.status == 419) {
                // Handle session timeout or CSRF errors
            }
        },
    },

    searchable: true,
    order: [1, 'desc'],
    pageLength: 10,
    columns: [
        { data: "id" },
        { data: "property_type" },
        { data: "max_rooms" },
        { data: "beds" },
        { data: "baths" },
        { data: "price" },
        { data: "status" },
        { data: "area" },
        { data: "zip_code" },
        { data: "address" },
        { data: "city" },
        { data: "agent" },
        { data: "description" },
        // { data: "media" },
        { data: "additional_features" },
        { data: "actions", sClass: "text-end" } // Actions column
    ],
    columnDefs: [
        {
            width: "100px",
            targets: 6, // Status column
            render: function (data, type, full, meta) {
                // Define the status options and their corresponding styles
                var status = {
                    'sale': { 'title': "Sale", 'type': 'success' },
                    'sold': { 'title': "Sold", 'type': 'danger' },
                    'rent': { 'title': "Rent", 'type': 'info' },
                };

                // Convert the data to lowercase for comparison (in case the data is in a different case)
                var statusKey = data.toString().toLowerCase();

                // Check if the statusKey exists in the status object
                if (typeof status[statusKey] === 'undefined') {
                    return data;  // If no match is found, return the raw data
                }

                // Return the badge with the corresponding status style and title
                return '<span class="badge badge-' + status[statusKey].type + '">' + status[statusKey].title + '</span>';
            }
        },

        {
            width: "200px",
            targets: -1, // Actions column
            title: "Actions",
            orderable: false,
            render: function (data, type, full, meta) {
                return '<a href="'+full.view_url+'" class="btn btn-danger p-1" ">\
                            <i class="fa-solid fa-eye"></i>\
                        </a>\
                        <a href="'+full.edit_url+'" class="btn btn-primary p-1">\
                            <i class="fa-solid fa-pen-to-square"></i>\
                        </a>\
                        <button type="button" class="btn btn-danger p-1" onclick="deleteProperty(' + data + ')">\
                            <i class="fa-solid fa-trash-can"></i>\
                        </button>';
            },
        },
    ],
    lengthMenu: [
        [10, 25, 100, -1],
        [10, 25, 100, "All"]
    ],
});

// Example deleteProperty function with Notiflix confirmation
function deleteProperty(id) {
    var url = deleteRowUrl.replace(':id', id);  // Use the final URL with ID

    Notiflix.Confirm.show(
        'Confirm Deletion',
        'Are you sure you want to delete this property?',
        'Yes',
        'No',
        function() {

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: csrfToken,
                },
                success: function(response) {
                    tableVar.ajax.reload();
                    Notiflix.Notify.Success('Property deleted successfully.');
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    Notiflix.Notify.Failure('Error deleting property.');
                }
            });
        },
        function() {
        }
    );
}


// function confirmStatusChange(id, currentStatus) {
//     currentStatus = currentStatus.toString();
//     var newStatus = (currentStatus === '0') ? '1' : '0'; // Toggle between active/inactive

//     var url = changeStatusUrl.replace(':id', id);  // Replace the placeholder with actual ID

//     // Show the confirmation dialog using SweetAlert2
//     Swal.fire({
//         title: 'Are you sure?',
//         text: 'You are about to change the status of this user.',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6', // Blue for confirm
//         cancelButtonColor: '#d33', // Red for cancel
//         confirmButtonText: 'Yes, change it!', // Text for confirm button
//         cancelButtonText: 'No, keep it' // Text for cancel button
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Send AJAX request to update the status
//             $.ajax({
//                 url: url,  // URL with user ID
//                 type: 'POST',
//                 data: {
//                     _token: csrfToken,  // CSRF token for security
//                     status: newStatus,   // New status (either 0 or 1)
//                 },
//                 success: function(response) {
//                     // Reload the DataTable to reflect the change
//                     tableVar.ajax.reload();

//                     // Show success notification with SweetAlert2
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Status Updated',
//                         text: 'The status has been updated successfully.',
//                         showConfirmButton: false,
//                         timer: 1500
//                     });
//                 },
//                 error: function(jqXHR, ajaxOptions, thrownError) {
//                     // Handle any errors from the AJAX request
//                     console.error(jqXHR.responseJSON);
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Error',
//                         text: 'There was an error updating the status.',
//                         showConfirmButton: true
//                     });
//                 }
//             });
//         }
//     });
// }
