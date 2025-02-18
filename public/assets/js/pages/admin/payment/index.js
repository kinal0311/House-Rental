var paymentTable = $('#paymentDataTable').DataTable({
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
            if (paymentTable != null) {
                paymentTable.settings()[0].jqXHR.abort();
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
        { data: "property_id" },
        { data: "user_name" },
        { data: "agent_name" },
        { data: "payment_option" },
        { data: "payment_status" },
        { data: "deposit" },
        { data: "amount" }
        // { data: "actions", sClass: "text-end" }
    ],
    columnDefs: [
        {
            width: "100px",
            targets: 5,
            render: function (data, type, full, meta) {
                var status = {
                    '1': { 'title': "Pending", 'type': 'warning' },
                    '2': { 'title': "Completed", 'type': 'success' },
                    '3': { 'title': "Failed", 'type': 'danger' },
                };
                if (typeof status[data] === 'undefined') {
                    return data;
                }

                return '<span class="badge badge-' + status[data].type + '" style="cursor: pointer;" onclick="confirmPaymentStatusChange(' + full.id + ', ' + data + ')">' + status[data].title + '</span>';
            },
        },
    ],
    lengthMenu: [
        [10, 25, 100, -1],
        [10, 25, 100, "All"]
    ],
});

// function deletePayment(id) {
//     var url = deletePaymentUrl.replace(':id', id);  // Replace the placeholder with actual ID

//     Swal.fire({
//         title: 'Are you sure?',
//         text: 'You want to delete this payment?',
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
//                     paymentTable.ajax.reload();

//                     Swal.fire(
//                         'Deleted!',
//                         'Payment has been deleted successfully.',
//                         'success'
//                     );
//                 },
//                 error: function(jqXHR, ajaxOptions, thrownError) {
//                     Swal.fire(
//                         'Error!',
//                         'There was an error deleting the payment.',
//                         'error'
//                     );
//                 }
//             });
//         } else {
//             Swal.fire(
//                 'Cancelled',
//                 'Payment deletion has been cancelled.',
//                 'info'
//             );
//         }
//     });
// }

// function confirmPaymentStatusChange(id, currentStatus) {
//     var newStatus = (currentStatus === '0') ? '1' : '0'; // Toggle between Pending/Completed

//     var url = changePaymentStatusUrl.replace(':id', id);

//     Swal.fire({
//         title: 'Are you sure?',
//         text: 'You are about to change the payment status.',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes, change it!',
//         cancelButtonText: 'No, keep it'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: url,
//                 type: 'POST',
//                 data: {
//                     _token: csrfToken,
//                     status: newStatus,
//                 },
//                 success: function(response) {
//                     paymentTable.ajax.reload();

//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Payment Status Updated',
//                         text: 'The payment status has been updated successfully.',
//                         showConfirmButton: false,
//                         timer: 1500
//                     });
//                 },
//                 error: function(jqXHR, ajaxOptions, thrownError) {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Error',
//                         text: 'There was an error updating the payment status.',
//                         showConfirmButton: true
//                     });
//                 }
//             });
//         }
//     });
// }
