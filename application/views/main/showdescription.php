<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('commons/head');?>
<body>
    <div class="header">
        <a class="logo" href="/"><img src="/asset/aqua/img/logo.png" alt="Manage Description" title="Manage Description"/></a>
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
                        <h1>Manage Description </h1>
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTicket">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th width="45%">Description</th>
                                    <th width="45%">Description</th>
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
    <script src="/asset/aqua/js/main/showdescription.js"></script>
</body>
</html>
