<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quiz App</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png"') }} " />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h4>Quiz App</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" class="pt-3" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <x-input id="name" class="form-control form-control-lg" type="text"
                                        name="name" :value="old('name')" required autofocus placeholder="Name" />
                                </div>

                                <!-- Email Address -->
                                <div class="form-group">


                                    <x-input id="email" class="form-control form-control-lg" type="email"
                                        name="email" :value="old('email')" required placeholder="Email" />
                                </div>

                                <!-- Password -->
                                <div class="form-group">


                                    <x-input id="password" class="form-control form-control-lg" type="password"
                                        name="password" required autocomplete="new-password" placeholder="Password" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">


                                    <x-input id="password_confirmation" class="form-control form-control-lg"
                                        type="password" name="password_confirmation" required
                                        placeholder="Password Again" />
                                </div>

                                <div class="flex items-center justify-end mt-4">


                                    <x-button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Register') }}
                                    </x-button>

                                    <div class="text-center mt-4 font-weight-light">
                                        <a href="{{ route('login') }}"
                                            class="text-primary">{{ __('Already registered?') }}</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
