<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('chats/head');?>
<style>
.selected{
    background:'red';
}
.selected .name {
    color: red !important;
}
.div250{
    height: 250px;
    overflow-y:scroll;
}
</style>
<body>
<div class="header">
        <a class="logo" href="/"><img src="/asset/aqua/img/logo.png" alt="Chats" title="Chats"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('commons/menu');?>
    <div class="content">
    <?php $this->load->view('commons/breadline');?>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-chats"></div>
                        <h1><span id='messagingtitle' chat_id='' targettyppe=''>Messaging</span></h1>
                        <ul class="buttons">
                            <li>
                                <a class="isw-refresh" id="reloadchat" title="Reload"></a>
                            </li>                            
                            <li>
                                <a href="#" class="isw-attachment"></a>
                            </li>                            
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="block messaging padichats div250">
                    </div>
                    <div class="bloc messaging">
                        <div class="controls">
                            <div class="control">
                                <textarea name="textarea" id="txtMessage" placeholder="Your message..." style="height: 70px; width: 100%;"></textarea>
                            </div>
                            <button class="btn" id="btnSendMessage">Send message</button>
                        </div>                        
                    </div>
                </div>                                                
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Your Groups</h1>    
                    </div>
                    <div class="block messages chatgroups div250">
                    </div>
                </div>                
                
                
            </div>                                                            
            
            <div class="dr"><span></span></div>
        
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-mail"></div>                        
                        <h1>Box with scrolling</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#" class="isw-settings"></a>                            
                            </li>                                                    
                        </ul>
                    </div>
                    
                    <div class="block messages scrollBox">                        
                        
                        <div class="scroll" style="height: 270px;">

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>
                                    <p>Lorem ipsum dolor. In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim.</p>
                                    <span>19 feb 2012 12:45</span>
                                </div>
                            </div>

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/olga.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Olga</a>
                                    <p>Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                    <span>18 feb 2012 12:45</span>
                                </div>
                            </div>                        

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/dmitry.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Dmitry</a>
                                    <p>In id adipiscing diam. Sed lobortis dui ut odio tempor blandit.</p>
                                    <span>17 feb 2012 12:45</span>
                                </div>
                            </div>                         

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/helen.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Helen</a>
                                    <p>Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                    <span>15 feb 2012 12:45</span>
                                </div>
                            </div>                                  

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>
                                    <p>Lorem ipsum dolor. In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim.</p>
                                    <span>19 feb 2012 12:45</span>
                                </div>
                            </div> 

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/olga.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Olga</a>
                                    <p>Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                    <span>18 feb 2012 12:45</span>
                                </div>
                            </div>                        

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/dmitry.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Dmitry</a>
                                    <p>In id adipiscing diam. Sed lobortis dui ut odio tempor blandit.</p>
                                    <span>17 feb 2012 12:45</span>
                                </div>
                            </div>                         

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/helen.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Helen</a>
                                    <p>Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                    <span>15 feb 2012 12:45</span>
                                </div>
                            </div>                                  

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>
                                    <p>Lorem ipsum dolor. In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim.</p>
                                    <span>19 feb 2012 12:45</span>
                                </div>
                            </div> 
                            
                        </div>
                        
                    </div>                
                    
                </div>                                
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-users"></div>
                        <h1>Your Clients</h1>
                        <ul class="buttons">
                            <li>
                                <a href="#" class="isw-user"></a>                            
                            </li>                                                      
                            <li>
                                <a href="#" class="isw-plus"></a>                            
                            </li>                                                                              
                        </ul>
                    </div>
                    <div class="block-fluid users">                                                
                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/aqvatarius_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Suspect</a>                                    
                                    <span>23</span>
                                </div>
                            </div>

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/olga_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Prospect</a>                                
                                    <span>5</span>
                                </div>
                            </div>                        

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/alexey_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Survey</a>  
                                    <span>106</span>
                                </div>
                            </div>                              
                        
                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/dmitry_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Install</a>                                    
                                    <span>350</span>
                                </div>
                            </div>                         

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/helen_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Ticket</a>                                                                        
                                    <span>6</span>
                                </div>
                            </div>                                  

                            <div class="item clearfix">
                                <div class="image"><a href="#"><img src="/img/users/alexander_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Troubleshoot</a>                                                                        
                                    <span>5</span>
                                </div>
                            </div>                                                          
                        
                    </div>                
                    
                </div>                
                
            </div>
            
            <div class="dr"><span></span></div>
            
        </div>        
    </div>
    <script>
    var user_id=<?php echo $_SESSION['user_id'];?>;
    var username='<?php echo $_SESSION['username'];?>';
    </script>
    <script src="/asset/padi.common.js"></script>
    <script src="/asset/aqua/js/chats/index.js"></script>
</body>
</html>
