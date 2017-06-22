@extends('layouts.out')

@section('head')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100379036-1', 'auto');
        ga('send', 'pageview');

    </script>
@endsection

@section('content')

    <div class="rs_graybg rs_toppadder100 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <h3>Terms and Conditions (&quot;Terms&quot;)</h3>

                    <p class="text-muted">
                        <small>Last updated: <cite title="Last Updated">May 28, 2017</cite></small>
                    </p>

                    <p>
                        Please read these Terms and Conditions (&quot;Terms&quot;, &quot;Terms and Conditions&quot;) carefully before using
                        the <a href="/">http://couponbooty.com/</a> website (the &quot;Service&quot;) operated by
                        {{ config('app.name') }} (&quot;us&quot;, &quot;we&quot;, or &quot;our&quot;).
                    </p>

                    <p>
                        Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms.
                        These Terms apply to all visitors, users and others who access or use the Service.
                    </p>

                    <p>
                        By accessing or using the Service you agree to be bound by these Terms. If you disagree with
                        any part of the terms then you may not access the Service. This Terms &amp; Conditions agreement is
                        licensed by TermsFeed to {{ config('app.name') }}.
                    </p>

                    <h4>
                        Links To Other Web Sites
                    </h4>

                    <p>
                        Our Service may contain links to third-party web sites or services that are not owned or
                        controlled by {{ config('app.name') }}.
                    </p>

                    <p>
                        {{ config('app.name') }} has no control over, and assumes no responsibility for, the content, privacy policies,
                        or practices of any third party web sites or services. You further acknowledge and agree that
                        {{ config('app.name') }} shall not be responsible or liable, directly or indirectly, for any damage or loss
                        caused or alleged to be caused by or in connection with use of or reliance on any such content,
                        goods or services available on or through any such web sites or services.
                    </p>

                    <p>
                        We strongly advise you to read the terms and conditions and privacy policies of any third-party
                        web sites or services that you visit.
                    </p>

                    <h4>
                        Governing Law
                    </h4>

                    <p>
                        These Terms shall be governed and construed in accordance with the laws of California,
                        United States, without regard to its conflict of law provisions.
                    </p>

                    <p>
                        Our failure to enforce any right or provision of these Terms will not be considered a waiver of
                        those rights. If any provision of these Terms is held to be invalid or unenforceable by a court,
                        the remaining provisions of these Terms will remain in effect. These Terms constitute the entire
                        agreement between us regarding our Service, and supersede and replace any prior agreements we
                        might have between us regarding the Service.
                    </p>

                    <h4>
                        Changes
                    </h4>

                    <p>
                        We reserve the right, at our sole discretion, to modify or replace these Terms at any time.
                        If a revision is material we will try to provide at least 30 days notice prior to any new terms
                        taking effect. What constitutes a material change will be determined at our sole discretion.
                    </p>

                    <p>
                        By continuing to access or use our Service after those revisions become effective, you agree to
                        be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.
                    </p>

                    <h4>
                        Contact Us
                    </h4>

                    <p>
                        If you have any questions about this Privacy Policy, please contact us.
                    </p>
                </div>
                @include('shared.contact')
            </div>
        </div>
    </div>

@endsection