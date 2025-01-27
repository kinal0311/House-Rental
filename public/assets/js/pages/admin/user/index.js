var tableVar = $('#userDataTable').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: {
        url: dateTableUrl,
        type: "POST",
        data: {
            _token: csrfToken,
        },
        beforeSend: function () {
            if (tableVar != null) {
                tableVar.settings()[0].jqXHR.abort();
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
            { data: "name" },
            { data: "email" },
            // { data: "role" },
            { data: "gender" },
            { data: "phone_number" },
            { data: "dob" },
            { data: "status" },
            { data: "description" },
            { data: "address" },
            { data: "zip_code" },
            { data: "img", render: function(data, type, row) {
                console.log("Image path:", data);
                return `<img src="${data}" alt="Image" width="50" height="50">`;
            }},
            { data: "actions", sClass: "text-end" }
        ],
    columnDefs: [
        {
            width: "100px",
            targets: 6,
            render: function (data, type, full, meta) {
                var status = {
                    '0': { 'title': "Inactive", 'type': 'danger' },
                    '1': { 'title': "Active", 'type': 'success' },
                };
                if (typeof status[data] === 'undefined') {
                    return data;
                }

                // Status badge with a click event to trigger confirmation
                return '<span class="badge badge-' + status[data].type + '" style="cursor: pointer;" onclick="confirmStatusChange(' + full.id + ', ' + data + ')">' + status[data].title + '</span>';
            },
        },
        {
            width: "150px",
            targets: -1,
            title: "Actions",
            orderable: false,
            render: function (data, type, full, meta) {
                return '<a href="'+full.view_url+'" class="btn btn-danger" ">\
                            <i class="fa-solid fa-eye"></i>\
                        </a>\
                        <a href="'+full.edit_url+'" class="btn btn-primary" >\
                            <i class="fa-solid fa-pen-to-square"></i>\
                        </a>\
                        <button type="button" class="btn btn-danger" onclick="deleteUser(' + data + ')">\
                            <i class="fa-solid fa-trash-can"></i>\
                        </button>';
            },
        }

    ],
    lengthMenu: [
        [10, 25, 100, -1],
        [10, 25, 100, "All"]
    ],
});

function deleteUser(id) {
    var url = deleteRowUrl.replace(':id', id);  // Replace the placeholder with actual ID

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
                    Notiflix.Notify.Success('User deleted successfully.');  // Success notification
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    Notiflix.Notify.Failure('Error deleting user.');  // Error notification
                }
            });
        },
        function() {  // Callback function for cancel action
            // Action when the user clicks "No" (nothing to do)
        }
    );
}

function confirmStatusChange(id, currentStatus) {
    // Ensure currentStatus is a string for proper comparison
    currentStatus = currentStatus.toString();

    // Toggle between '0' (inactive) and '1' (active)
    var newStatus = (currentStatus === '0') ? '1' : '0';

    // Replace the placeholder with the actual user ID in the URL
    var url = changeStatusUrl.replace(':id', id);

    // Show the confirmation dialog using Notiflix
    Notiflix.Confirm.Show(
        'Confirm Status Change',  // Title of the confirmation box
        'Are you sure you want to change the status?',  // Confirmation message
        'Yes',  // Confirm button text
        'No',   // Cancel button text
        function() {  // Callback for "Yes" button
            // Send AJAX request to update the status
            $.ajax({
                url: url,  // URL with user ID
                type: 'POST',
                data: {
                    _token: csrfToken,  // CSRF token for security
                    status: newStatus,   // New status (either 0 or 1)
                },
                success: function(response) {
                    tableVar.ajax.reload();  // Reload the table to reflect the change
                    Notiflix.Notify.Success('Status updated successfully.');  // Success message
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // Log the error for debugging
                    console.error(jqXHR.responseJSON);
                    Notiflix.Notify.Failure('Error updating status.');  // Failure message
                }
            });
        },
        function() {  // Callback for "No" button (nothing happens)
            // Nothing happens when user clicks "No"
        }
    );
}







