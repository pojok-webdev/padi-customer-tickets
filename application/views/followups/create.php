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
    <?php $this->load->view('tickets/breadline');?>
        <div class="workplace">            
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1></h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span5">Pelapor:</div>
                            <div class="span7">
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Telp:</div>
                            <div class="span7">
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Tanggal:</div>
                            <div class="span7">
                                <input type="text" id="mask_date"/> <span>Example: 31/12/2020
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Action:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container">
                                    <textarea id="wysiwyg" name="text" style="height: 300px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-target"></div>
                        <h1></h1>
                    </div>
                    <div class="block-fluid">
                    <div class="row-form clearfix">
                            <div class="span5">Main Root Cause:</div>
                            <div class="span7">
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
                            <div class="span5">Sub Root Cause:</div>
                            <div class="span7">
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
                            <div class="span5">Kesimpulan:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container">
                                    <textarea id="wysiwyg" name="text" style="height: 300px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">PIC:</div>
                            <div class="span7">
                                <input type="text" placeholder="Nama PIC..."/>
                            </div>
                        </div>                                 
                        <div class="row-form clearfix">
                            <div class="span5">Jabatan:</div>
                            <div class="span7">
                                <input type="text" placeholder="Jabatan..."/>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span5">Telepon:</div>
                            <div class="span7">
                                <input type="text" placeholder="Telepon..."/>
                            </div>
                        </div>                                 
                        <div class="row-form clearfix">
                            <div class="span5">Hasil Konfirmasi:</div>
                            <div class="span7">
                                <div class="block-fluid" id="wysiwyg_container">
                                    <textarea id="wysiwyg" name="text" style="height: 300px;"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-form clearfix">
                            <div class="span5">Konfirmasi Pelanggan:</div>
                            <div class="span7">
                                <div class="btn-group">
                                    <button class="btn" type="button">OK</button>
                                    <button class="btn" type="button">Belum OK</button>
                                    <button class="btn" type="button">Belum bisa dihubungi</button>
                                </div>                                
                            </div>
                        </div>

                        
                        <div class="row-form clearfix">
                            <div class="span5">Konfirmasi Pelanggan:</div>
                            <div class="span7">
                                <div class="btn-group">
                                    <button class="btn" type="button">Reset</button>
                                    <button class="btn" type="button">History</button>
                                    <button class="btn" type="button">Tutup Ticket</button>
                                    <button class="btn" type="button">Progress</button>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>   
</body>
</html>
