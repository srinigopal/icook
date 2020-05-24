@extends('_public.layouts.master')

@section('content')

    <section class="public-full-height row no-gutters">
        
        <div class="col-12 d-flex align-items-center justify-content-center bg-primary text-white">
            <div class="text-center">

                <i class="fal fa-street-view display-3 mb-4"></i>

                <h4>
                    <p class="font-weight-light">It looks like you're already logged in.</p>
                    <small class="font-weight-light mt-2">Here's a couple of options you can try:</small>
                </h4>

                <div class="row mt-5">
                    <div class="col col-md-6">
                        <a href="/dashboard" class="text-white">
                            <i class="fal fa-home display-6"></i>
                            <h6 class="font-weight-light">Take me to my Dashboard</h6>
                        </a>
                    </div>
                    <div class="col col-md-6">
                        <a href="" class="text-white">
                            <i class="fal fa-clipboard-list-check display-6"></i>
                            <h6 class="font-weight-light">Sign up a new Organisation</h6>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection