
@extends('layout.web-app.app')   
@section('title') {{'Sign In'}} @endsection
@section('content-web')
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section">
    <div class="breadcrumbs overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-inner text-left">
              <nav class="" role="navigation" aria-label="breadcrumbs">
                <ul class="breadcrumb-list">
                  <li>
                    <a href="/" title="Back to the home page">Home</a>
                  </li>
                  <li>
                    <span>Create Account</span>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->
  <style>
    .breadcrumbs-inner {
      padding-top: 20px;
    }

    .breadcrumbs-inner {
      padding-bottom: 20px;
    }
  </style>
  <main role="main">
    <div class="customer-page theme-default-margin">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
            <div class="login">
              <div class="login-form-container">
                <div class="login-text">
                  <h2>Create Account</h2>
                  <p>Please Register using account detail bellow.</p>
                </div>
                <div class="register-form">
                  <form method="post" action="/account" id="create_customer" accept-charset="UTF-8" data-login-with-shop-sign-up="true">
                    <input type="hidden" name="form_type" value="create_customer" />
                    <input type="hidden" name="utf8" value="✓" />
                    <label for="FirstName" class="hidden-label">First Name</label>
                    <input type="text" name="customer[first_name]" id="FirstName" class="input-full" placeholder="First Name" autocapitalize="words" autofocus>
                    <label for="LastName" class="hidden-label">Last Name</label>
                    <input type="text" name="customer[last_name]" id="LastName" class="input-full" placeholder="Last Name" autocapitalize="words">
                    <label for="Email" class="hidden-label">Email</label>
                    <input type="email" name="customer[email]" id="Email" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off">
                    <label for="CreatePassword" class="hidden-label">Password</label>
                    <input type="password" name="customer[password]" id="CreatePassword" class="input-full" placeholder="Password">
                    <div class="form-action-button">
                      <button type="submit" class="theme-default-button">Create</button>
                    </div>
                  </form>
                  <div class="account-optional-action">
                    <a href="https://ponno-demo.myshopify.com">Return to Store</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection