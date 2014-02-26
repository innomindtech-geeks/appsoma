<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package appsoma

 */

?>
 <div class="col-lg-3 columns widgets side-widgets"> 
                      <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Specializing in<i class="fa fa-angle-up pull-right"></i>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      <div class="content">
          							<ul class="side-nav">
            							<?php 
            if(function_exists('wp_nav_menu')) {
             wp_nav_menu( array('menu' => 'Side Menu1' ));
            }?>
          							</ul>
        						</div>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        Additional Services<i class="fa fa-angle-up pull-right"></i>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse ">
      <div class="panel-body">
       <div class="content">
          							<ul class="side-nav">
            							<?php 
            if(function_exists('wp_nav_menu')) {
             wp_nav_menu( array('menu' => 'Side Menu2' ));
            }?>
         							</ul>
        						</div>
      </div>
    </div>
  </div>
  
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
        More Resources<i class="fa fa-angle-up pull-right"></i>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse ">
      <div class="panel-body">
     <div class="content">
          							<ul class="side-nav">
                                       <?php 
            if(function_exists('wp_nav_menu')) {
             wp_nav_menu( array('menu' => 'Side Menu3' ));
            }?>
         							</ul>
        						</div>
      </div>
    </div>
  </div>
  
  </div>
                      
                      <!-- End Sidebar Navigation -->        
                                
                                
                                
                                <div class="appointment-block grey-bg">            
            
            	<div class="appoinment_style01">
                <a class="red appoinment_btn" href="#login_form" id="login_pop">
                
                    <p>MAKE AN APPOINMENT</p>
                    &nbsp;<!-- Put appointemnt label here -->
                </a></div>
                
                
   <!-- popup form #1 -->
   
        <a href="#x" class="overlay" id="login_form"></a>
        <div class="popup">
          <?php
              if (function_exists(appointment_mailer)) {				
                  appointment_mailer();
               }
               ?>
            </div>
        </div>


<!-- form itself -->


        
		</div>            
                    </div>