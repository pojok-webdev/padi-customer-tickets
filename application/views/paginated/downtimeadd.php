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
        <?php $this->load->view('paginated/breadline');?>
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
                                    <th width="30"><input type="checkbox" name="checkall"/></th>
                                    <th width="60">Image</th>
                                    <th>Name</th>
                                    <th width="60">Size</th>
                                    <th width="40">Actions</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a class="fancybox" rel="group" href="img/example_full.jpg"><img src="img/example_xmini.jpg" class="img-polaroid"/></a></td>
                                    <td class="info"><a class="fancybox" rel="group" href="img/example_full.jpg">Lorem ipsum dolor sit amet</a> <span>fk-hseosqassr.jpg</span> <span>10.11.2012 10:42</span></td>
                                    <td>260 Kb</td>
                                    <td><a href="#"><span class="icon-pencil"></span></a> <a href="#"><span class="icon-remove"></span></a></td>                                    
                                </tr>                                              
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
