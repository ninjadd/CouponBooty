<div class="rs_search_section rs_toppadder40 rs_bottompadder40">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h4 class="text-uppercase text-right">Search over <span class="rs_bluetext">10 Million </span> Coupons</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="rs_search_form">
                            <form action="/results" class="form-inline" method="POST">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input type="text" name="search_text" value="{{ old('search_text') }}" class="form-control" placeholder="Search Coupons &amp; Booty">
                                </div>
                                <input type="submit" class="btn rs_search_btn" value="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>