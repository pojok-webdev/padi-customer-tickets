<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('main/head');?>
<body>
    <div class="loginBox">
        <div class="loginHead">
            <img src="/img/logo_padinet_small4.png" alt="PadiApp Ticket" title="PadiApp Ticket"/>
        </div>
        <form class="form-horizontal" action="/main/loginhandler" method="POST">
            <div class="control-group">
                <label for="inputEmail">Email</label>
                <input type="text" id="email" name="email" />
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="password" name="password" />
            </div>
            <div class="control-group" style="margin-bottom: 5px;">
                <label class="checkbox"> </label>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>
    </div>
</body>
</html>
