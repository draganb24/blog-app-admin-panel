@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #28a745; color: #fff; border-color: #28a745; position: relative; padding-right: 40px;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%);"></button>
</div>
@endif
