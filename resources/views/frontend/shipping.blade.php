@extends('frontend.inc.master')

@section('main-container')
    <main class="page-content">

        <section class="section privacy-sec">
            <div class="container">
                <div class="privacy-heading" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    <h1><span>Shipping</span> & Delivery</h1>
                </div>
            </div>
        </section>

        <section class="section privacy" id="privacy">
            <div class="container">
                <div class="data-content">
                    <h5 class="inter-heading">CricAuction don’t ship any physical products. Since CricAuction provides
                        digital services (app CricAuction) and not physical products, this
                        policy outlines our approach to order fulfilment, cancellations, and refunds</h5>
                    <h3 class="sub-heading">Order Fulfilment</h3>
                    <div class="defination-account">
                        <p>• Once you purchase a testing service package through our platform, you will receive a
                            confirmation email with details about your order.</p>
                        <p>• We will not ship any physical products. Our auction app will access your app provide auction
                            service based on the chosen service package.</p>
                        <p>• You will be able to track the progress of your auction through our platform.</p>
                    </div>
                    <h3 class="sub-heading">Cancellations & Refunds</h3>
                    <p>• You can check the refund policy on our website for more clarification.</p>
                    <h3 class="sub-heading">Additional Considerations:
                    </h3>
                    <p>• We reserve the right to cancel your order if we are unable to provide the auction service due to
                        technical limitations or incompatibility with your app. In such cases, you will receive a full
                        refund.</p>
                    <p>• This policy is subject to change at any time. We will update this policy on our website and notify
                        you by email if significant changes are made.</p>
                    <h5 class="inter-heading">By using CricAuction's services, you agree to the terms outlined
                        in this Shipping & Exchange Policy</h5>
                </div>
            </div>
        </section>

    </main>
@endsection
