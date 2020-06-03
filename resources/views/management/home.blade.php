@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <organisation-details></organisation-details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

    <script src="{{ mix('/js/admin/organisation/index.js') }}" defer></script>

@endpush