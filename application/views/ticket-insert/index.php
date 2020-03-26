<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('ticket-insert/head');?>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="Insert ticket" title="Insert ticket"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('tickets/menu');?>
    <div class="content">
    <?php $this->load->view('tickets/breadline');?>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Client Ticket</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-download"></a></li>                                                        
                        </ul>                        
                    </div>
                    <div class="block-fluid">
                        <form action="/tickets/save" method="post">
                        <div class="row-form clearfix">
                            <div class="span3">Nama:</div>
                            <div class="span9"><input type="text" placeholder="Nama Pelanggan ..."/></div>
                        </div> 
                        <div class="row-form clearfix">
                            <div class="span3">Penyebab:</div>
                            <div class="span9">
                                <select name="select">
                                        <option value="0">choose a option...</option>
                                        <option value="1">Andorra</option>
                                        <option value="2">Antarctica</option>
                                        <option value="3">Bulgaria</option>
                                        <option value="4">Germany</option>
                                        <option value="5">Dominican Republic</option>
                                        <option value="6">Micronesia</option>
                                        <option value="7">United Kingdom</option>
                                        <option value="8">Greece</option>
                                        <option value="9">Italy</option>
                                        <option value="10">Ukraine</option>   
                                </select>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Ticket start:</div>
                            <div class="span9"><input type="text" placeholder="Ticket Start ..."/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Ticket end:</div>
                            <div class="span9"><input type="text" placeholder="Ticket End ..."/></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3"><button class="btn btn-primary" type="submit">Save</button></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
