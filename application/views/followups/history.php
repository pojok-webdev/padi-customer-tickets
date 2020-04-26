<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('followups/head');?>
<body>
    <input type="hidden" value="<?php echo $ticketid;?>" name="ticketid" id="ticketid">
    <div class="header">
        <a class="logo" href="/"><img src="/asset/aqua/img/logo.png" alt="Follow up History" title="Follow up History"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
    <?php $this->load->view('commons/breadline');?>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Follow up Hstory <span id="kdticket"></span></h1>
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTicket">
                            <thead>
                                <tr>
                                    <th width="10%">Tanggal</th>
                                    <th width="10%">PIC</th>
                                    <th width="35%">Narasi</th>
                                    <th width="20%">Cause</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTables_info" id="tTicket_info"></div>
                        <div class="dataTables_paginate paging_two_button" id="tTicket_paginate">
                            <span id="pageid">1</span>
                            <button class="btn" id="btnFirst">First</button>
                            <button class="btn" id="tTicket_previous">Previous</button>
                            <span id="paginationbuttons" class="btn-group"></span>
                            <button class="btn" id="tTicket_next">Next</button>
                            <button class="btn" id="btnLast" disabled>Last</button>
                            <?php echo form_dropdown('pageoption',array(),'1','id="pageoption" class="pageoption" width="40" ');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script src="/asset/aqua/js/followups/history.js"></script>
</body>
</html>
