@extends('laouts.applogin')

<section>
    <main class="main" id="top">
        <div class="container">
            <div class="mb-3 text-start">
                <label class="form-label" for="email">Email address</label>
                <div class="form-icon-container">
                    <input class="form-control form-icon-input" id="email" type="email"
                        placeholder="name@example.com" /><span class="fas fa-user text-body fs-9 form-icon"></span>
                </div>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="password">Password</label>
                <div class="form-icon-container" data-password="data-password">
                    <input class="form-control form-icon-input pe-6" id="password" type="password"
                        placeholder="Password" data-password-input="data-password-input" /><span
                        class="fas fa-key text-body fs-9 form-icon"></span>
                    <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                        data-password-toggle="data-password-toggle"><span class="uil uil-eye show"></span><span
                            class="uil uil-eye-slash hide"></span></button>
                </div>
            </div>
            <div class="row flex-between-center mb-7">
                <div class="col-auto">
                    <div class="form-check mb-0">
                        <input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" />
                        <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                    </div>
                </div>
                <div class="col-auto"><a class="fs-9 fw-semibold"
                        href="../../../pages/authentication/simple/forgot-password.html">Forgot
                        Password?</a></div>
            </div>
            <button class="btn btn-primary w-100 mb-3">Sign In</button>
            <div class="text-center"><a class="fs-9 fw-bold"
                    href="../../../pages/authentication/simple/sign-up.html">Create an account</a></div>
        </div>
        </div>
        </div>
        <script>
            var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
            var navbarTop = document.querySelector('.navbar-top');
            if (navbarTopStyle === 'darker') {
                navbarTop.setAttribute('data-navbar-appearance', 'darker');
            }

            var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
            var navbarVertical = document.querySelector('.navbar-vertical');
            if (navbarVertical && navbarVerticalStyle === 'darker') {
                navbarVertical.setAttribute('data-navbar-appearance', 'darker');
            }
        </script>
    </main>
</section>
