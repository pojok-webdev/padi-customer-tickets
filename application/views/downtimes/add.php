<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('paginated/head');?>
    <link rel="stylesheet"  href="/asset/aqua/css/autocomplete.css" />
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp Ticket" title="PadiApp Ticket"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('downtimes/menu');?>
    <div class="content">
        <input type="hidden" name="createuser" value="puji" />
        <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticket_id;?>" />
        <?php $this->load->view('downtimes/breadline');?>
        <div class="workplace">            
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Penambahan Downtime <span class="clientname"></span></h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span5">Start Downtime:</div>
                            <div class="span7">
                                <input type="text" name="downtimestart" id="downtimestart" class="mask_date" value="<?php echo date('d/m/Y h:i');?>"/> 
                                <span>Example: 31/12/2020 12:15</span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">End Downtime:</div>
                            <div class="span7">
                                <input type="text" name="downtimeend" id="downtimeend" class="mask_date" value="<?php echo date('d/m/Y h:i');?>"/> 
                                <span>Example: 31/12/2020 12:15</span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5"></div>
                            <div class="span7">
                                <button type="button" class="btn" id="btnSave">Simpan</button> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>List Downtime <span class="clientname"></span></h1>
                    </div>
                    <div class="block-fluid without-head">
                        <table cellpadding="0" cellspacing="0" width="100%" id="tDowntime" class="table images">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th>Downtime</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                            <?php $c=1;?>
                                <?php foreach($downtimes as $downtime){?>
                                <tr id='<?php echo $downtime->id;?>'>
                                    <td class="number"><?php echo $c++;?></td>
                                    <td class="info">
                                        <span>Start: <?php echo $downtime->start;?></span> 
                                        <span>End: <?php echo $downtime->end;?></span>
                                    </td>
                                    <td><?php echo $downtime->size;?></td>
                                    <td>
                                        <a type="btn" class="btnRemoveDowntime">Hapus</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/asset/padi.common.js"></script>
    <script src="/asset/aqua/js/paginateds/downtimeadd.js"></script>
    <script src="/asset/aqua/js/followups/wysiwygs.js"></script>
</body>
</html>
