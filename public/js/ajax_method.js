$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';    
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ]

    });

    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000",
    }
    // Multiple Image Preview 
    $('#fileInput').on('change', function() {
        // Clear any existing preview images
        $('#previewImages').empty();

        // Get selected files
        var files = $(this)[0].files;

        // Loop through selected files
        for (var i = 0; i < files.length; i++) {
            // Create a new FileReader object
            var reader = new FileReader();

            // Set the image src attribute with the data URL
            reader.onload = function(event) {
                var img = $('<img>').attr('src', event.target.result);
                img.addClass('w-25')
                $('#previewImages').append(img);
            }

            // Read the file as a data URL
            reader.readAsDataURL(files[i]);
        }
    });

    // Signle Image Preview 
    $('#fileInput').on('change', function() {
        // Get selected file
        var file = $(this)[0].files[0];

        // Create a new FileReader object
        var reader = new FileReader();

        // Set the image src attribute with the data URL
        reader.onload = function(event) {
            $('#preview_image_before_upload').attr('src', event.target.result);
        }

        // Read the file as a data URL
        reader.readAsDataURL(file);
    });
})

function changeState(url, id) {
    $.ajax({
        url : url,
        method : 'POST',
        data : {id : id},
        success : function(res) {
            console.log(res)
            if(res.success) {
                toastr.success(res.message);
                setInterval(function() {
                   location.reload()
                }, 1000); 
            } else {
                toastr.danger(res.message)
            }
        },
        error : function(e) {
            toastr.danger(res.message)
        }
    })
}

function deleteForm(url, id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {    
            $.ajax({
                url : url,
                method : 'POST',
                data : {id : id},
                success : function(res) {
                    console.log(res)
                    if(res.success) {
                        Swal.fire({
                            title: 'Deleted',
                            text: res.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if(result.isConfirmed) {
                               location.reload()
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Something Wrong',
                            text: res.message,
                            icon: 'danger',
                            confirmButtonText: 'OK'
                        })
                    }
                },
                error : function(e) {
                    console.log(e)
                }
            })
        }
      })
}

function grantPermission(id, name, permissionId) {
    var checkbox = $('#' + permissionId);
    var isChecked = checkbox.is(':checked') ? true : false;
    $.ajax({
        url: "/admin/setting/permission/give",
        type: 'POST',
        data: {
            id : id,
            name : name,
            status : isChecked,
        },
        success: function(res) {
          if(res.success) {
            toastr.success(res.message)
          } else {
            toastr.warning(res.message)
          }
        },
        error: function(xhr, status, error) {
          console.log(error)
        }
    });
}