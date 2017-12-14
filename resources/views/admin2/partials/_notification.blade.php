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
