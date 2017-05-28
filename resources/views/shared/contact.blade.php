<form class="form-horizontal">
    <fieldset>
        <legend></legend>
        <div class="form-group">
            <label for="inputName" class="col-lg-2 control-label">Your Name</label>
            <div class="col-lg-10">
                <input name="name" type="text" class="form-control" id="inputName" placeholder="Who are you?">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Your Email</label>
            <div class="col-lg-10">
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email address">
            </div>
        </div>


        <div class="form-group">
            <label for="textContent" class="col-lg-2 control-label">
                Message
            </label>
            <div class="col-lg-10">
                <textarea class="form-control" placeholder="Message... In a bottle? No, Just a message to {{ config('app.name') }}." rows="4" id="textContent"></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </fieldset>
</form>