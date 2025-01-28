var tableVar = $('#propertyImgDataTable').DataTable({
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
        { data: "image_url", render: function(data, type, row) {
            // console.log("Image path:", data);
            return `<img src="../${data}" alt="Image" width="50" height="50">`;
        } },
        { data: "alt_text" },
        { data: "actions", sClass: "text-end" } // Actions column

    ],
    columnDefs: [
        {
            width: "170px",
            targets: -1, // Actions column
            title: "Actions",
            orderable: false,
            render: function (data, type, full, meta) {
                return `
                <a href="${full.view_url}" class="btn btn-danger">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="${full.edit_url}" class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <button type="button" class="btn btn-danger" onclick="deletePropertyImg(${full.id})">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            `;
            },
        },
    ],
    lengthMenu: [
        [10, 25, 100, -1],
        [10, 25, 100, "All"]
    ],
});

// Example deleteProperty function with Notiflix confirmation
function deletePropertyImg(id) {
    var url = deleteRowUrl.replace(':id', id); // Replace ':id' with the actual ID

    // Use Notiflix for the confirmation box
    Notiflix.Confirm.Show(
        'Confirm Deletion',  // Title of the confirmation box
        'Are you sure you want to delete this image?',  // Message
        'Yes',  // Text for the confirm button
        'No',   // Text for the cancel button
        function() {  // Callback function for confirm action
            // Send an AJAX request to delete the property image
            $.ajax({
                url: url,  // The URL with the property ID
                type: 'DELETE',
                data: {
                    _token: csrfToken,  // CSRF token for security
                },
                success: function(response) {
                    tableVar.ajax.reload();  // Reload the table after deletion
                    Notiflix.Notify.Success('Image deleted successfully.');  // Success notification
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    Notiflix.Notify.Failure('Error deleting image.');  // Error notification
                }
            });
        },
        function() {  // Callback function for cancel action
            // Action when the user clicks "No" (nothing to do)
        }
    );
}


