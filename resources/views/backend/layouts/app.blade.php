<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.head')
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

@include('backend.layouts.top-nav')

@include('backend.layouts.side-bar')

@section('main-content')
    @show

</div>
<!-- /Main Wrapper -->

@include('backend.layouts.script')

</body>
</html>
