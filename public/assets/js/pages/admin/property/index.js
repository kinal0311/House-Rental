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
        {
            data: 'image_url',
            name: 'image_url',
            render: function(data, type, row) {
                if (data) {
                    return `<img src="${data}" alt="${row.alt_text}" width="80" height="60" style="object-fit: cover;">`;
                }
            }
        },
        { data: "status" },
        { data: "address" },
        { data: "property_status" },
        { data: "actions", sClass: "text-end" } // Actions column
    ],
    columnDefs: [
        {
            width: "100px",
            targets: 3, // Status column
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
            width: "100px",
            targets: 5, // Assuming property_status is at index 5
            render: function (data, type, full, meta) {
                console.log("Property Status Data:", data); // Debugging log

                // Ensure data is treated correctly
                var statusText = (data.toLowerCase() === "active") ? "Active" : "Inactive";
                var btnClass = (data.toLowerCase() === "active") ? "btn-success" : "btn-danger";

                return `<button class="btn ${btnClass} btn-sm"
                                onclick="confirmPropertyStatusChange(${full.id}, '${data}')">
                            ${statusText}
                        </button>`;
            }

        },


        {
            width: "100px",
            targets: -1, // Actions column
            title: "Actions",
            orderable: false,
            render: function (data, type, full, meta) {
                return '<a href="'+full.view_url+'" class="btn btn-danger p-1 mb-1">\
                            <i class="fa-solid fa-eye"></i>\
                        </a>\
                        <a href="'+full.edit_url+'" class="btn btn-primary p-1 mb-1">\
                            <i class="fa-solid fa-pen-to-square"></i>\
                        </a>\
                        <button type="button" class="btn btn-danger p-1 mb-1" onclick="deleteProperty(' + data + ')">\
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

    Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this property?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: csrfToken,
                },
                success: function(response) {
                    tableVar.ajax.reload();
                    Swal.fire('Deleted!', 'Property deleted successfully.', 'success');
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    Swal.fire('Error!', 'Error deleting property.', 'error');
                }
            });
        }
    });
}

function confirmPropertyStatusChange(id, currentStatus) {
    currentStatus = currentStatus.toString().toLowerCase();
    var newStatus = (currentStatus === "1" || currentStatus === "active") ? "0" : "1";

    var url = changePropertyStatusUrl.replace(':id', id);

    // Show the confirmation dialog using SweetAlert2
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to change the status of this property.',
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
                url: url,  // URL with property ID
                type: 'POST',
                data: {
                    _token: csrfToken,  // CSRF token for security
                    property_status: newStatus,   // New status (either 0 or 1)
                },
                success: function(response) {
                    console.log("Property Status Updated:", response);

                    // Reload the DataTable to reflect the change
                    tableVar.ajax.reload();

                    // Show success notification with SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Updated',
                        text: 'The property status has been updated successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // Handle any errors from the AJAX request
                    console.error("Error Updating Status:", jqXHR.responseJSON);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error updating the property status.',
                        showConfirmButton: true
                    });
                }
            });
        }
    });
}
