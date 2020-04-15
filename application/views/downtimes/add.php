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
        <form action='/downtimes/save' method='post'>
        <input type="hidden" name="createuser" value="puji" />
        <input type="hidden" name="ticket_id" value="<?php echo $ticket_id;?>" />
        <?php $this->load->view('downtimes/breadline');?>
        <div class="workplace">            
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Penambahan Downtime</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span5">Start Downtime:</div>
                            <div class="span7">
                                <input type="text" name="downtimestart" id="downtimestart" class="mask_date"/> 
                                <span>Example: 31/12/2020 12:15</span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">End Downtime:</div>
                            <div class="span7">
                                <input type="text" name="downtimeend" id="downtimeend" class="mask_date"/> 
                                <span>Example: 31/12/2020 12:15</span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5"></div>
                            <div class="span7">
                                <button type="submit" class="btn">Simpan</button> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>List Downtime</h1>
                    </div>
                    <div class="block-fluid without-head">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th>Downtime</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($downtimes as $downtime){?>
                                <tr>
                                    <td><?php echo $downtime->id;?></td>
                                    <td class="info">
                                        <span>Start: <?php echo $downtime->start;?></span> 
                                        <span>End: <?php echo $downtime->end;?></span>
                                    </td>
                                    <td><?php echo $downtime->size;?></td>
                                    <td>
                                        <a type="btn" href="/downtimes/remove/<?php echo $ticket_id;?>/<?php echo $downtime->id;?>">Hapus</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>                    

                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="right">
                                    <div class="pagination pagination-mini">
                                        <ul>
                                            <li class="disabled"><a href="#">Prev</a></li>
                                            <li class="disabled"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>                             
                            </div>                        
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="/asset/aqua/js/paginateds/downtimeadd.js"></script>
    <script src="/asset/aqua/js/followups/wysiwygs.js"></script>
</body>
</html>
