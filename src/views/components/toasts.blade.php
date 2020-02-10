@if(session('success'))
    <script type="text/javascript">
        M.toast({html: '{{session('success')}}', classes:'green'});
    </script>
@endif
@if(session('error'))
    <script type="text/javascript">
        M.toast({html: '{{session('error')}}', classes:'red'});
    </script>
@endif