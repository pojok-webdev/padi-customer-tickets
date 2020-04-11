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
    <?php $this->load->view('paginated/menu');?>
    <div class="content">
        <form action='/paginateds/save' method='post'>
        <?php $this->load->view('commons/breadline');?>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Penambahan Ticket Backbone</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span5">Pelapor:</div>
                            <div class="span7">
                                <input type="text" name="reporter" id="reporter" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Telp:</div>
                            <div class="span7">
                            <input type="text" name="reporterphone" id="reporterphone" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Tanggal:</div>
                            <div class="span7">
                                <input type="text" name="ticketstart" id="ticketstart" class="mask_date" value="<?php echo date('d/m/Y h:i');?>" /> 
                                <span>Example: 31/12/2020 12:15</span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Complain:</div>
                            <div class="span7">
                            <input type="text" name="complain" id="complain" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Description:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container">
                                    <textarea id="description" class="wysiwyg" name="description" style="height: 300px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix dauto">
                            <div class="span5">Nama Backbone:</div>
                            <div class="span7">
                                <?php echo form_dropdown('backbone',$backbones,1,'')?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Site:</div>
                            <div class="span7">
                                <select name="client_site_id" id="client_site_id"></select>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span12">
                                <button type="submit" class="btn" name="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                        <div class="head clearfix">
                            <div class="isw-list"></div>
                            <h1>List Client Affected</h1>
                        </div>
                        <div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span5">Pelanggan:</div>
                            <div class="span5">
                                <input type="text" name="client" id="client" />
                            </div>
                            <div class="span2">
                                <a class="btn" id="btnAssociateClientBackbone">Add to Affected Client</a>
                            </div>
                        </div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="table images" id="tClient">
                                <thead>
                                    <tr>
                                        <th width="30">ID</th>
                                        <th>Downtime</th>
                                        <th width="60">Size</th>
                                        <th width="40">Actions</th>                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clients as $client){?>
                                    <tr>
                                        <td><?php echo $client->id;?></td>
                                        <td class="info">
                                            <span>Start: <?php echo $client->name;?></span> 
                                            <span>End: <?php echo $client->address;?></span>
                                        </td>
                                        <td><?php echo $client->createuser;?></td>
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
        </div>
    </form>
    <script src="/asset/aqua/js/paginateds/addbackbone.js"></script>
    <script src="/asset/aqua/js/followups/wysiwygs.js"></script>
</body>
</html>
