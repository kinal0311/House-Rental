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
                // console.log('Status data:', data);  // Debugging log
                var status = {
                    'sale': { 'title': "Sale", 'type': 'success' },
                    'sold': { 'title': "Sold", 'type': 'danger' },
                    'rent': { 'title': "Rent", 'type': 'info' },
                };

                // Convert data to a string or check if it matches the status keys
                var statusKey = data.toString().toLowerCase();  // Ensure it's lowercase or formatted correctly

                if (typeof status[statusKey] === 'undefined') {
                    return data;  // Fallback to the raw data if no match is found
                }

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
