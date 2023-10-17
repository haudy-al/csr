@if (session()->has('success'))
<script>
    toastr.options = {
        progressBar: true, 
        progressBarColor: '#24880b', 
        closeDuration: 2000,
    };
    toastr.success(`{{ session('success') }}`, 'Success');
</script>
    
@endif

@if (session()->has('error'))
<script>
    toastr.error(`{{ session('error') }}`, 'error');
</script>
@endif