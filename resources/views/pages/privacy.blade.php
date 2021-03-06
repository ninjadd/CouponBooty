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

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card blue-grey darken-1 hoverable">
                    <div class="card-content white-text">

                        <h3>Privacy Policy</h3>

                        <p class="text-muted">
                            <small>Last updated: <cite title="Last Updated">May 28, 2017</cite></small>
                        </p>
                        <br>

                        <p>
                            {{ config('app.name') }}
                            (&quot;us&quot;, &quot;we&quot;, or &quot;our&quot;)
                            operates the {{ config('app.url') }} website (the &quot;Service&quot;).
                        </p>

                        <p>
                            This page informs you of our policies regarding the collection, use and disclosure of
                            Personal Information when you use our Service.
                        </p>

                        <p>
                            We will not use or share your information with anyone except as described in this Privacy Policy.
                            This Privacy Policy is licensed by TermsFeed Generator to {{ config('app.name') }}.
                        </p>

                        <p>
                            We use your Personal Information for providing and improving the Service.
                            By using the Service, you agree to the collection and use of information in accordance with this policy.
                            Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings
                            as in our Terms and Conditions, accessible at <a href="/terms">http://couponbooty.com/terms</a>
                        </p>

                        <h4>
                            Information Collection And Use
                        </h4>

                        <p>
                            While using our Service, we may ask you to provide us with certain personally identifiable
                            information that can be used to contact or identify you. Personally identifiable information
                            may include, but is not limited to, your name (&quot;Personal Information&quot;).
                        </p>

                        <h4>
                            Log Data
                        </h4>

                        <p>
                            We collect information that your browser sends whenever you visit our Service (&quot;Log Data&quot;).
                            This Log Data may include information such as your computer's Internet Protocol (&quot;IP&quot;)
                            address, browser type, browser version, the pages of our Service that you visit, the time and
                            date of your visit, the time spent on those pages and other statistics.
                        </p>

                        <h4>
                            Cookies
                        </h4>

                        <p>
                            Cookies are files with small amount of data, which may include an anonymous unique identifier.
                            Cookies are sent to your browser from a web site and stored on your computer's hard drive.
                        </p>

                        <p>
                            We use &quot;cookies&quot; to collect information. You can instruct your browser to refuse all cookies or
                            to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be
                            able to use some portions of our Service.
                        </p>

                        <h4>
                            Service Providers
                        </h4>

                        <p>
                            We may employ third party companies and individuals to facilitate our Service, to provide the
                            Service on our behalf, to perform Service-related services or to assist us in analyzing how
                            our Service is used.
                        </p>

                        <p>
                            These third parties have access to your Personal Information only to perform these tasks on our
                            behalf and are obligated not to disclose or use it for any other purpose.
                        </p>

                        <h4>
                            Security
                        </h4>

                        <p>
                            The security of your Personal Information is important to us, but remember that no method of
                            transmission over the Internet, or method of electronic storage is 100% secure. While we strive
                            to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.
                        </p>

                        <h4>
                            Links To Other Sites
                        </h4>

                        <p>
                            Our Service may contain links to other sites that are not operated by us. If you click on a
                            third party link, you will be directed to that third party's site. We strongly advise you to review
                            the Privacy Policy of every site you visit.
                        </p>

                        <p>
                            We have no control over, and assume no responsibility for the content, privacy policies or
                            practices of any third party sites or services.
                        </p>

                        <h4>
                            Children's Privacy
                        </h4>

                        <p>
                            Our Service does not address anyone under the age of 13 (&quot;Children&quot;).
                        </p>

                        <p>
                            We do not knowingly collect personally identifiable information from children under 13.
                            If you are a parent or guardian and you are aware that your Children has provided us with
                            Personal Information, please contact us. If we discover that a Children under 13 has provided
                            us with Personal Information, we will delete such information from our servers immediately.
                        </p>

                        <h4>
                            Changes To This Privacy Policy
                        </h4>

                        <p>
                            We may update our Privacy Policy from time to time. We will notify you of any changes by
                            posting the new Privacy Policy on this page.
                        </p>

                        <p>
                            You are advised to review this Privacy Policy periodically for any changes. Changes to this
                            Privacy Policy are effective when they are posted on this page.
                        </p>

                        <h4>
                            Contact Us
                        </h4>

                        <p>
                            If you have any questions about this Privacy Policy, please contact us.
                        </p>
                    </div>
                </div>
            </div>
            @include('shared.contact')
        </div>
    </div>
@endsection