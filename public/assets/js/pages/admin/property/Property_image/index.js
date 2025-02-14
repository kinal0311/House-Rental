$(document).ready(function () {
    $('#imgForm').parsley();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let validFiles = [];
    let totalValidImages = 0;

    $('#image_url').change(function () {
        const files = this.files;
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/heic', 'image/heif', 'image/webp'];
        let invalidFiles = [];
        $('#images-error').empty();

        Array.from(files).forEach((file, index) => {
            if (allowedTypes.includes(file.type)) {
                const uniqueId = Date.now() + '-' + index;
                file.uniqueId = uniqueId;
                validFiles.push(file);
                const reader = new FileReader();
                reader.onload = function (event) {
                    totalValidImages++;
                    const previewDiv = `
                    <div class="upload-img-box position-relative overflow-hidden d-inline-block mr-2 my-2" id="product_image_${uniqueId}" data-id="${uniqueId}">
                        <div class="img-bg position-relative h-100">
                            <img src="${event.target.result}" class="img-fluid w-100 h-100 object-fit-cover" alt="" />
                        </div>
                        <button type="button" class="btn btn-danger delete-image-btn position-absolute" style="top:5px;right:5px;" data-id="${uniqueId}">
                            &times;
                        </button>
                    </div>`;
                    $('#image-previews').append(previewDiv);
                };
                reader.readAsDataURL(file);
            } else {
                let errorMessage = file.name + ' Invalid file type';
                invalidFiles.push(errorMessage);
            }
        });

        if (invalidFiles.length > 0) {
            invalidFiles.forEach(message => {
                $('#images-error').append(`<div class="text-danger">${message}</div>`);
            });
            this.value = '';
        }
    });

    $('#image-previews').on('click', '.delete-image-btn', function () {
        const uniqueId = $(this).attr('data-id');
        validFiles = validFiles.filter(file => file.uniqueId !== uniqueId);
        $(`#product_image_${uniqueId}`).remove();
    });

    $('#imgForm').on('submit', function (e) {
        e.preventDefault();
        if (validFiles.length === 0) {
            Notiflix.Notify.Failure('Please select valid images.');
            return;
        }
        const formData = new FormData();
        formData.append('property_id', $('#property_id').val());
        formData.append('alt_text', $('#alt_text').val());
        validFiles.forEach((file) => {
            formData.append('images[]', file);
        });

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = response.redirect_url;
                }
                $('#image-previews').empty();
                validFiles = [];
                $('#imgForm')[0].reset();
            },
            error: function (xhr) {
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    Notiflix.Notify.Failure(xhr.responseJSON.message);
                } else {
                    Notiflix.Notify.Failure('An error occurred.');
                }
            }
        });
    });
});


// var tableVar = $('#propertyImgDataTable').DataTable({
//     processing: true,
//     serverSide: true,
//     scrollX: true,
//     ajax: {
//         url: dateTableUrl, // URL to fetch data
//         type: "POST",
//         data: {
//             _token: csrfToken, // CSRF token for security
//         },
//         beforeSend: function () {
//             if (tableVar != null) {
//                 tableVar.settings()[0].jqXHR.abort(); // Abort previous request before sending new
//             }
//         },
//         error: function (jqXHR, ajaxOptions, thrownError) {
//             if (jqXHR.status == 419) {
//                 // Handle session timeout or CSRF errors
//             }
//         },
//     },

//     searchable: true,
//     order: [1, 'desc'],
//     pageLength: 10,
//     columns: [
//         { data: "id" },
//         { data: "property_type" },
//         { data: "image_url", render: function(data, type, row) {
//             // console.log("Image path:", data);
//             return `<img src="../${data}" alt="Image" width="50" height="50">`;
//         } },
//         { data: "alt_text" },
//         { data: "actions", sClass: "text-end" } // Actions column

//     ],
//     columnDefs: [
//         {
//             width: "170px",
//             targets: -1, // Actions column
//             title: "Actions",
//             orderable: false,
//             render: function (data, type, full, meta) {
//                 return `
//                 <a href="${full.view_url}" class="btn btn-danger">
//                     <i class="fa-solid fa-eye"></i>
//                 </a>
//                 <a href="${full.edit_url}" class="btn btn-primary">
//                     <i class="fa-solid fa-pen-to-square"></i>
//                 </a>
//                 <button type="button" class="btn btn-danger" onclick="deletePropertyImg(${full.id})">
//                     <i class="fa-solid fa-trash-can"></i>
//                 </button>
//             `;
//             },
//         },
//     ],
//     lengthMenu: [
//         [10, 25, 100, -1],
//         [10, 25, 100, "All"]
//     ],
// });

// // Example deleteProperty function with Notiflix confirmation
// function deletePropertyImg(id) {
//     var url = deleteRowUrl.replace(':id', id);  // Use the final URL with ID

//     Swal.fire({
//         title: 'Confirm Deletion',
//         text: 'Are you sure you want to delete this image?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: url,
//                 type: 'DELETE',
//                 data: {
//                     _token: csrfToken,
//                 },
//                 success: function(response) {
//                     tableVar.ajax.reload();
//                     Swal.fire('Deleted!', 'Property image deleted successfully.', 'success');
//                 },
//                 error: function(jqXHR, ajaxOptions, thrownError) {
//                     Swal.fire('Error!', 'Error deleting image.', 'error');
//                 }
//             });
//         }
//     });
// }


