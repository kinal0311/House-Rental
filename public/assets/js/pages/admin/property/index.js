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
                var status = {
                    'sale': { 'title': "Sale", 'type': 'success' },
                    'sold': { 'title': "Sold", 'type': 'danger' },
                    'rent': { 'title': "Rent", 'type': 'success' },
                    // <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Primary</button>
                };
                if (typeof status[data] === 'undefined') {
                    return data;
                }
                return '<span class="badge badge-' + status[data].type + '">' + status[data].title + '</span>';
            },
        },
        {
            width: "170px",
            targets: -1, // Actions column
            title: "Actions",
            orderable: false,
            render: function (data, type, full, meta) {
                return '<a href="'+full.view_url+'" class="btn btn-danger" ">\
                            <i class="fa-solid fa-eye"></i>\
                        </a>\
                        <a href="'+full.edit_url+'" class="btn btn-primary">\
                            <i class="fa-solid fa-pen-to-square"></i>\
                        </a>\
                        <button type="button" class="btn btn-danger" onclick="deleteProperty(' + data + ')">\
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

    // Use Notiflix for the confirmation box
    Notiflix.Confirm.Show(
        'Confirm Deletion',  // Title of the confirmation box
        'Are you sure you want to delete this property?',  // Message
        'Yes',  // Text for the confirm button
        'No',   // Text for the cancel button
        function() {  // Callback function for confirm action
            // Send an AJAX request to delete the property
            $.ajax({
                url: url,  // The URL with the property ID
                type: 'DELETE',
                data: {
                    _token: csrfToken,  // CSRF token for security
                },
                success: function(response) {
                    tableVar.ajax.reload();  // Reload the table after deletion
                    Notiflix.Notify.Success('Property deleted successfully.');  // Success notification
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    Notiflix.Notify.Failure('Error deleting property.');  // Error notification
                }
            });
        },
        function() {  // Callback function for cancel action
            // Action when the user clicks "No" (nothing to do)
        }
    );
}

// // Example updateProperty function with Notiflix confirmation
// function updateProperty(id) {
//     $.ajax({
//         url: url,  // The URL with the property ID
//         type: 'PUT',  // Update request type
//         data: {
//             _token: csrfToken,  // CSRF token for security
//             // Add other necessary data from the form (example: property data)
//         },
//         success: function(success) {
//             if ('success') {
//                 // Reload the table or update UI accordingly
//                 tableVar.ajax.reload();  // Reload the table after update
//                 Notiflix.Notify.Success('Property update successfully');  // Success notification
//             } else {
//                 Notiflix.Notify.Failure('Error updating property.');  // Failure notification
//             }
//         },
//         error: function(jqXHR, ajaxOptions, thrownError) {
//             Notiflix.Notify.Failure('Error updating property.');  // Error notification
//         }
//     });
// }
