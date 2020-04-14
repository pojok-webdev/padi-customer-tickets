<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('commons/head')?>
<script type='text/javascript' src='/js/aquarius/troubleshoot_add.js'></script>
<body>
    <?php $this->load->view('troubleshoots/notification');?>
    <?php $this->load->view('troubleshoots/confirmation');?>
    <div class="header">
        <a class="logo" href="/"><img src="/asset/aqua/img/logo.png" alt="PadiNET Internal App" title="Troubleshoot"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
	<?php $this->load->view('commons/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="<?php echo $breadcrumb[0]['url'];?>"><?php echo $breadcrumb[0]['label'];?></a> <span class="divider">></span></li>
                <li><a href="<?php echo $breadcrumb[1]['url'];?>"><?php echo $breadcrumb[1]['label'];?></a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
		</div>
        <div class="workplace" id="workplace">
            <form action='/troubleshoots/save' method='POST' >
            <div class="row-fluid">
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button class="btn btn-small" title="Simpan Pengajuan Troubleshoot" type="submit">
                                    <span class="icon-ok icon-white"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan</div>
                            <div class="span9">
                                <input type="text" name="name" id="name" value="<?php echo $obj->name;?>" />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Alamat</div>
                            <div class="span9">
                                <input type="text" name="address" id="address" value="<?php echo $obj->address;?>" />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama PIC</div>
                            <div class="span9">
                                <input type="text" name="pic_name" id="pic_name" value="<?php echo $obj->reporter;?>" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Telepon</div>
                            <div class="span9">
                            <input type="text" name="pic_phone" id="pic_phone" value="<?php echo $obj->reporterphone;?>" />
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Jabatan PIC</div>
                            <div class="span9">
                            <input type="text" name="pic_position" id="pic_position" />
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Email</div>
                            <div class="span9">
                            <input type="text" name="pic_email" id="pic_email" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span3">Waktu Troubleshoot</div>
                            <div class="span9">
                            <input type="text" name="troubleshoot_date" id="troubleshoot_date" class="mask_date" value="<?php echo date('d/m/Y h:i');?>"/> 
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Berbayar ?</div>
                            <div class="span9">
								<select name='is_payable' id='is_payable'>
									<option value='1'>Ya</option>
									<option value='0'>Tidak</option>
								</select>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Keterangan</div>
                            <div class="span9">
                            <textarea name="description" id="description"></textarea></div>
                        </div>
					</div>
				</div>
            </div>
            </form>
        </div>
    </div>   
</body>
</html>
