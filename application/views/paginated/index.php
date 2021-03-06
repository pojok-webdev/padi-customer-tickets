<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('paginated/head');?>
    <link rel="stylesheet" href="/asset/aqua/css/app/paginated/padicustom.css" />
    <style>
        .checker{
            display:block;
        }
    </style>
<body>
    <div class="header">
        <a class="logo" href="/"><img src="/asset/aqua/img/logo.png" alt="Ticket" title="Tikets"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('paginated/menu');?>
    <div class="content">
    <?php $this->load->view('paginated/breadline');?>
        <div class="workplace">
        <?php $this->load->view('paginated/modalFilterCategory');?>
        <?php $this->load->view('paginated/modalFilter');?>
        <?php $this->load->view('paginated/modalFilterKdticket');?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Ticket PadiApp</h1>
                        <ul class="buttons">
                            <li title="Add Server Ticket"><a href="/paginateds/addserver" target="_blank" class="isw-documents"></a></li>
                            <li title="Add Internet Ticket"><a href="/paginateds/add" target="_blank" class="isw-plus"></a></li>
                            <li title="Add Upstream Ticket">
                                <a href="#" class="isw-up"></a>
                                <ul class="dd-list">
                                    <li title="Add Backbone Ticket"><a href="/paginateds/addbackbone" target="_blank"><span class="isw-plus"></span> Backbone</a></li>
                                    <li title="Add BTS Ticket"><a href="/paginateds/addbts" target="_blank"><span class="isw-plus"></span> BTS</a></li>
                                    <li title="Add Datacenter Ticket"><a href="/paginateds/adddatacenter" target="_blank"><span class="isw-plus"></span> Datacenter</a></li>
                                    <li title="Add PTP Ticket"><a href="/paginateds/addptp" target="_blank"><span class="isw-plus"></span> PTP</a></li>
                                    <li title="Add Core Ticket"><a href="/paginateds/addcore" target="_blank"><span class="isw-plus"></span> Core</a></li>
                                    <li title="Add AP Ticket"><a href="/paginateds/addap" target="_blank"><span class="isw-plus"></span> AP</a></li>
                                </ul>
                            </li>
                            <li title="Search Ticket">
                                <a href="#" class="isw-zoom"></a>
                                <ul class="dd-list search-toggler">
                                    <li title="Search Ticket By Year">
                                        <a class="search"><span class="isw-zoom"></span> By Year</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTicket">
                            <thead>
                                <tr>
                                    <th width=5%>Act</th>
                                    <th width="8%">Kdticket</th>
                                    <th width="20%">Name</th>
                                    <th width="10%">Type</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Cause</th>
                                    <th width="10%">Start</th>
                                    <th width="10%">End</th>
                                    <th>Dura</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTables_info" id="tTicket_info"></div>
                        <input type="text" placeholder="Search by name" id="searchbar">
                        <button class="btn" id="searchbutton">Search</button>
                        <button class="btn" id="clearsearchbutton">Clear Search</button>
                        <div class="dataTables_paginate paging_two_button" id="tTicket_paginate">
                        Row Per Page 
                            <?php echo form_dropdown('pageamount',$rowAmounts,'1','id="pageamount" class="pageoption" ');?>
                            <span style="display:none" id="pageid">1</span>
                            <button class="btn" id="btnFirst">First</button>
                            <button class="btn" id="tTicket_previous">Previous</button>
                            <span id="paginationbuttons" class="btn-group"></span>
                            <button class="btn" id="tTicket_next">Next</button>
                            <button class="btn" id="btnLast">Last</button>
                            <?php echo form_dropdown('pageoption',array(),'1','id="pageoption" class="pageoption" ');?>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('commons/confirmmodal');?>
    <script src="/asset/padi.common.js"></script>
    <script src="/asset/aqua/js/paginateds/index.js"></script>
    <script src="/asset/aqua/js/paginateds/search.js"></script>
</body>
</html>
