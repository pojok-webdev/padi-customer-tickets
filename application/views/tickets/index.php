<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('tickets/head');?>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp" title="PadiApp"/></a>
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
                        <div class="isw-grid"></div>
                        <h1>Tickets</h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTicket">
                            <thead>
                                <tr>
                                    <th width="20%">Kdticket</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Status</th>
                                    <th width="20%">Cause</th>
                                    <th width="10%">Start</th>
                                    <th width="10%">End</th>
                                    <th>Dura</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class="dr"><span></span></div>            
        </div>
    </div>
    <script src='/asset/aqua/js/tickets/index.js'></script>
</body>
</html>
