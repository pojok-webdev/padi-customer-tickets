<div id="dFilter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Category Filter </h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
        <h3>Filter</h3>
        </div>
        <div class="span12">
            <div class="span6">
                <div class="clearfix">
                    <h5>Category</h5>
                </div>
                <div class="clearfix">
                    <div class="span3">
                        <input type="checkbox" checked="checked" value="0" class="filter categoryclass" /> 
                        Select All
                    </div>

                    <?php foreach($categories as $catid=>$catname){?>
                    <div class="span3">
                        <input type="checkbox" checked="checked" value="<?php echo $catid;?>" class="filter categoryclass" /> 
                        <?php echo $catname;?>
                    </div>
                    <?php }?>
                </div>
                
            </div>

            <div class="span6">
                <div class="clearfix">
                    <h5>Year</h5>
                </div>
                <div class="clearfix">
                    <div class="span3">
                        <input type="checkbox" checked="checked" value="0" class="filter yearclass"  /> 
                        Select All
                    </div>

                    <?php foreach($years as $year){?>
                    <div class="span3">
                        <input type="checkbox" checked="checked" value="<?php echo $year;?>" class="filter yearclass"  /> 
                        <?php echo $year;?>
                    </div>
                    <?php }?>
                </div>
                
            </div>
    </div>

    </div>
    <div class="modal-footer">
        <button id="test" class="btn">Test</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
    </div>
</div>  