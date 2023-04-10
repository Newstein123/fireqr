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


})

function changeState(url, id) {
    $.ajax({
        url : url,
        method : 'POST',
        data : {id : id},
        success : function(res) {
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