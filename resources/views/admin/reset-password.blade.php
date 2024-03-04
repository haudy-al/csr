


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>LOGIN</title>


<link href="{{ asset('TemplateAdmin') }}/dist/css/style.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dist') }}/toastr/toastr.min.css">
<link rel="stylesheet" href="{{ asset('dist/fontawesome/css/all.min.css') }}">

<script src="{{ asset('TemplateAdmin') }}/dist/js/jquery-3.7.1.min.js"></script>
<script src="{{ asset('dist') }}/toastr/toastr.min.js"></script>
<script src="{{ asset('TemplateAdmin') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

@php
    $csp = csp_nonce();
@endphp


@livewireStyles(['nonce' => $csp ])

@livewire('admin.auth.reset-password')

@livewireScripts(['nonce' => $csp ])


