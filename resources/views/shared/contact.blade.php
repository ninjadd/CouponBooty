@include('shared.errors')
@include('shared.session')
    <form class="col s12" action="/send" method="POST">
        <div class="row">
            <div class="input-field col s6">
                <input required="required" id="name" name="name" type="text" class="validate">
                <label for="name">Name</label>
            </div>
            <div class="input-field col s6">
                <input id="email" type="email" required="required" name="email" class="validate">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="input-field col s12">
            <textarea id="textarea1" required="required" name="body" class="materialize-textarea"></textarea>
            <label for="textarea1">Enter your message</label>
            <button type="submit" class="waves-effect waves-light btn">Send</button>
        </div>
    </form>
