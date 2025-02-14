


var tableVar = $('#adminDataTable').DataTable({
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
                tableVar.settings()[0].jqXHR.abort();  // Abort the previous request if any
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
        { data: "role" },
        { data: "status" },
        { data: "actions", sClass: "text-end" }
    ],
    columnDefs: [
        {
            width: "100px",
            targets: 4,
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
                return '<a href="'+full.view_url+'" class="btn btn-danger p-1" ">\
                            <i class="fa-solid fa-eye"></i>\
                        </a>\
                        <a href="'+full.edit_url+'" class="btn btn-primary p-1" >\
                            <i class="fa-solid fa-pen-to-square"></i>\
                        </a>\
                        <button type="button" class="btn btn-danger p-1" onclick="deleteUser(' + data + ')">\
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

// Delete User Function
function deleteUser(id) {
    var url = deleteRowUrl.replace(':id', id);  // Replace the placeholder with actual ID

    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete this admin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with deletion if confirmed
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: csrfToken,
                },
                success: function(response) {
                    // Reload table data after successful deletion
                    tableVar.ajax.reload();

                    // Show success notification using SweetAlert
                    Swal.fire(
                        'Deleted!',
                        'Admin has been deleted successfully.',
                        'success'
                    );
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // Show error notification if deletion fails
                    Swal.fire(
                        'Error!',
                        'There was an issue deleting the admin.',
                        'error'
                    );
                }
            });
        } else {
            // Action on cancel (optional)
            Swal.fire(
                'Cancelled',
                'Admin was not deleted.',
                'info'
            );
        }
    });
}


// Confirm Status Change Function
function confirmStatusChange(id, currentStatus) {
    currentStatus = currentStatus.toString();
    var newStatus = (currentStatus === '0') ? '1' : '0'; // Toggle between active/inactive

    var url = changeStatusUrl.replace(':id', id);  // Replace the placeholder with actual ID

    // Show the confirmation dialog using SweetAlert2
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to change the status of this user.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6', // Blue for confirm
        cancelButtonColor: '#d33', // Red for cancel
        confirmButtonText: 'Yes, change it!', // Text for confirm button
        cancelButtonText: 'No, keep it' // Text for cancel button
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to update the status
            $.ajax({
                url: url,  // URL with user ID
                type: 'POST',
                data: {
                    _token: csrfToken,  // CSRF token for security
                    status: newStatus,   // New status (either 0 or 1)
                },
                success: function(response) {
                    // Reload the DataTable to reflect the change
                    tableVar.ajax.reload();

                    // Show success notification with SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Updated',
                        text: 'The status has been updated successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // Handle any errors from the AJAX request
                    console.error(jqXHR.responseJSON);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error updating the status.',
                        showConfirmButton: true
                    });
                }
            });
        }
    });
}

