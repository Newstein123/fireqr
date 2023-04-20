@if (session('message'))
    <script type="text/javascript">
        toastr.options =
        {
        "closeButton" : true,
        'debug' : true,
        "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    </script>
@endif