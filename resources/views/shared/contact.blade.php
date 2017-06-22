@include('shared.errors')
@include('shared.session')
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="rs_contact_form">
        <div class="rs_submitform">

            <form action="/send" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" required="required" id="ur_name" name="name" placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" required="required" id="ur_mail" name="email" placeholder="Enter your mail address">
                </div>

                <textarea class="form-control" rows="10" id="msg" required="required" name="body" placeholder="Enter your message"></textarea>

                <div class="rs_btn_div rs_toppadder30">
                    <button type="submit" id="send_btn" class="rs_button rs_button_orange">send</button>
                    <p id="err"></p>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 pull-right">
    <div class="rs_contact_section">
        <div class="rs_contact_heading rs_green_heading rs_bottompadder50">
            <h3>Find Us Here</h3>
            <div><span><i class="fa fa-heart"></i></span></div>
        </div>
        <div class="rs_contact_info">
            <div class="rs_contact_data">
                <span class="fa fa-map-marker"> San Diego, California</span>
            </div>
        </div>
        <div class="rs_contact_info">
            <div class="rs_contact_data">
                <span class="fa fa-envelope"> <a href="mailto:contact@couponbooty">contact@couponbooty</a></span>
            </div>
        </div>
    </div>
</div>