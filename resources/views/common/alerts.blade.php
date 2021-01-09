@if (session()->has('message'))
  <script>
    toastr.success( "{{ @session('message') }}");
  </script>
@endif

@if (session()->has('msg-error'))
  <script>
    toastr.error( "{{ @session('msg-error') }}");
  </script>
@endif
