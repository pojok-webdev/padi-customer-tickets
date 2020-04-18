<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('followups/head');?>
<body>
    <div class="header">
        <a class="logo" href="#"><img src="/asset/aqua/img/logo.png" alt="PadiApp Ticket" title="PadiApp Ticket"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('tickets/menu');?>
    <div class="content">
        <form action='/followups/save' method='post'>
        <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $obj->ticket_id;?>" />
        <?php $this->load->view('followups/breadline');?>
        <div class="workplace">            
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1><span id="kdticketclientname"><?php echo $obj->kdticket.'-'.$obj->clientname;?></span></h1>
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
                                <input type="text" name="followUpDate" id="followUpDate" class="mask_date" value="<?php echo date('d/m/Y h:i');?>"/> 
                                <span>Example: 31/12/2020 12:15</span>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Action:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container">
                                    <textarea id="description" class="wysiwyg" name="description" style="height: 300px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-target"></div>
                        <h1><?php echo $obj->kdticket.'-'.$obj->clientname;?></h1>
                    </div>
                    <div class="block-fluid">
                    <div class="row-form clearfix">
                            <div class="span5">Main Root Cause:</div>
                                <div class="span7">
                                    <select name="mainrootcause" id="mainrootcause">
                                        <option value="0">choose a option...</option>
                                        <?php foreach($categories['res'] as $cause){?>
                                            <option value="<?php echo $cause->id;?>">
                                                <?php echo $cause->name;?>
                                            </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        <div class="row-form clearfix">
                            <div class="span5">Sub Root Cause:</div>
                            <div class="span7">
                                <select name="cause" id="cause_id">
                                </select>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Kesimpulan:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container2">
                                    <textarea id="solution" class="wysiwyg" name="solution" style="height: 300px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">PIC:</div>
                            <div class="span7">
                                <input type="text" placeholder="Nama PIC..." name="picname" id="picname" value="<?php echo $obj->reporter;?>" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Jabatan:</div>
                            <div class="span7">
                                <input type="text" placeholder="Jabatan..." name="position" id="position"/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Telepon:</div>
                            <div class="span7">
                                <input type="text" placeholder="Telepon..." name="picphone" id="picphone" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Hasil Konfirmasi:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container3">
                                    <textarea id="confirmationresult" class="wysiwygx" name="confirmationresult" style="height: 300px;" onchange="textareachange"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Konfirmasi Pelanggan:</div>
                            <div class="span7">
                                <div class="btn-group">
                                    <button class="btn confirmResult" id="confirmResultOK" type="button" value="1">OK</button>
                                    <button class="btn confirmResult" id="confirmResultBelumOK" type="button" value="0">Belum OK</button>
                                    <button class="btn confirmResult" id="confirmResultBelumBisaDihubungi" type="button" value="3">Belum bisa dihubungi</button>
                                </div>
                                <input type="hidden" value="0" id="result" name="result">
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5"></div>
                            <div class="span7">
                                <div class="btn-group">
                                    <button class="btn" type="reset" id="btnResetInput">Reset</button>
                                    <a href="/followups/history/<?php echo $obj->ticket_id;?>" target="_blank" class="btn">
                                        History <span id="followupAmount"></span>
                                    </a>
                                    <button class="btn btnFinal" id="btnCloseTicket" type="button" disabled>Tutup Ticket</button>
                                    <button class="btn btnFinal" id="btnProgressTicket" type="button" disabled>Progress</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="/asset/aqua/js/followups/create.js"></script>
    <script src="/asset/aqua/js/followups/wysiwygs.js"></script>
</body>
</html>
