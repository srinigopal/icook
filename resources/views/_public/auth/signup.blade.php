@extends('_public.layouts.master')

@section('content')

    <section class="container-fluid d-flex h-100">

        <div class="row flex-fill">
    
            <div class="col-12 col-md-3 d-flex align-items-center justify-content-center bg-primary text-white">

                <div class="text-center text-white">
                    <h3 class="display-5 py-3">Sign Up</h3>
                    <h5 class="font-weight-light px-2">
                        <p>Not using Eearning yet?</p>
                        <p>That's OK, our easy signup process will have you up and running in no time.</p>
                    </h5>
                    <h2 class="font-weight-light pt-3">Let's Go.</h2>
                </div>

            </div>

            <div id="root-signup" class="col-12 col-md-9 p-md-5 bg-white">
                <sign-up-form></sign-up-form>
            </div>
        
        </div>

    </section>

@endsection

@push('scripts')

    <script src="{{ mix('/js/signup/index.js') }}" defer></script>

@endpush