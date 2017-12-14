@if(session('message'))
    <script>
        $(function(){
            new PNotify({
                title: 'Notification',
                text: '{{session('message')}}',
                type: 'success',
                styling: 'bootstrap3',
                delay: 2000
            })
        });
    </script>
@endif
@if(Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
    case 'info':
    toastr.info("{{ Session::get('message') }}");
    break;

    case 'warning':
    toastr.warning("{{ Session::get('message') }}");
    break;
    case 'success':
    toastr.success("{{ Session::get('message') }}");
    break;
    case 'error':
    toastr.error("{{ Session::get('message') }}");
    break;
    }
</script>
@endif
{{--You can add more custom ones here--}}