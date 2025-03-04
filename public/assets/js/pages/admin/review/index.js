var reviewTable = $('#reviewDataTable').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: {
        url: reviewDataTableUrl,
        type: "POST",
        data: {
            _token: csrfToken,
        },
        beforeSend: function () {
            if (reviewTable != null) {
                reviewTable.settings()[0].jqXHR.abort();
            }
        },
        error: function (jqXHR, ajaxOptions, thrownError) {
            if (jqXHR.status == 419) {
                // Handle session timeout or CSRF errors
            }
        },
    },
    searchable: true,
    order: [5, 'desc'], // Order by latest reviews
    pageLength: 10,
    columns: [
        { data: "id" },
        { data: "user_name" },
        { data: "property_name" },
        { data: "comment" },
        { data: "rating" },
        { data: "action", orderable: false, searchable: false }
    ],
    columnDefs: [
        {
            targets: 4, // Rating column
            render: function (data, type, full, meta) {
                let stars = "";
                for (let i = 1; i <= 5; i++) {
                    stars += i <= data ? '<i class="fas fa-star text-warning"></i> ' : '<i class="far fa-star text-muted"></i> ';
                }
                return stars;
            }
        },
        {
            targets: 5, // Action column (Delete button)
            render: function (data, type, full, meta) {
                return `
                    <button class="btn btn-danger btn-sm" onclick="deleteReview(${full.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
            }
        }
    ],
    lengthMenu: [
        [10, 25, 100, -1],
        [10, 25, 100, "All"]
    ],
});

// Delete Review Function
function deleteReview(id) {
    var url = deleteReviewUrl.replace(':id', id);

    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to delete this review?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: csrfToken,
                },
                success: function(response) {
                    reviewTable.ajax.reload();

                    Swal.fire(
                        'Deleted!',
                        'Review has been deleted successfully.',
                        'success'
                    );
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    Swal.fire(
                        'Error!',
                        'There was an error deleting the review.',
                        'error'
                    );
                }
            });
        } else {
            Swal.fire(
                'Cancelled',
                'Review deletion has been cancelled.',
                'info'
            );
        }
    });
}


// Delete Review Function
// function deleteReview(id) {
//     var url = deleteReviewUrl.replace(':id', id);

//     Swal.fire({
//         title: 'Are you sure?',
//         text: 'You want to delete this review?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes, delete it!',
//         cancelButtonText: 'No, cancel!',
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: url,
//                 type: 'DELETE',
//                 data: {
//                     _token: csrfToken,
//                 },
//                 success: function(response) {
//                     reviewTable.ajax.reload();

//                     Swal.fire(
//                         'Deleted!',
//                         'Review has been deleted successfully.',
//                         'success'
//                     );
//                 },
//                 error: function(jqXHR, ajaxOptions, thrownError) {
//                     Swal.fire(
//                         'Error!',
//                         'There was an error deleting the review.',
//                         'error'
//                     );
//                 }
//             });
//         } else {
//             Swal.fire(
//                 'Cancelled',
//                 'Review deletion has been cancelled.',
//                 'info'
//             );
//         }
//     });
// }
