@extends('_public.layouts.master')

@section('content')

    <section class="flex-fill d-flex align-items-center justify-content-center bg-light-grey min-vh-100">

        <div class="card w-75 w-xl-50">

            <div class="card-body" id="root-login-form">
                <login-form></login-form>
            </div>

        </div>

    </section>

@endsection

@push('scripts')

    <script src="{{ mix('/js/login/index.js') }}" defer></script>

@endpush