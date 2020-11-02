<?php
  include 'layouts/header.php';
  $pro_id=$_GET['ref'];
  $productRequest=getProductRequestById($conn, $pro_id);
  //dump($adminUser);
  if (isset($_POST['updatebtn'])) {
    if(updateProductRequest($conn, $_POST)){
        //echo "User Updated SuccessFully";
         showMsg('Request Updated Successfully');
         redirection('myrequests.php');
}
}
?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <?php
                    include 'layouts/sidebar.php';
            ?>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     User Form
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Product</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Update Request 
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
              
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Information </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form  class="form-horizontal" method="POST">
                            <div class="control-group">
                                <label class="control-label">Product Type</label>
                                <div class="controls">
                                    <select name="pro_type" class="form-control">
												<optgroup label="Select product type">												
													<option 
                                                    <?php if($productRequest['pro_type']=='Mobile') 
                                                    echo 'selected="selected"'; ?>
                                                    value="Mobile">Mobile</option>
													<option
                                                    <?php if($productRequest['pro_type']=='Laptop') 
                                                    echo 'selected="selected"'; ?>
                                                    value="Laptop">Laptop</option>
                                                    <option 
                                                    <?php if($productRequest['pro_type']=='Tablet') 
                                                    echo 'selected="selected"'; ?>
                                                    value="Tablet">Tablet</option>
													<option 
                                                    <?php if($productRequest['pro_type']=='Mp3 Player') 
                                                    echo 'selected="selected"'; ?>
                                                    value="Mp3 Player">Mp3 Player</option>
												</optgroup>
									</select>
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <input type="text" class="span6 " required name="pro_name" 
                                    value="<?php echo $productRequest['pro_name'];?>"/>
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Brand</label>
                                <div class="controls">
                                    <input type="text" class="span6 " required name="pro_brand"
                                    value="<?php echo $productRequest['pro_brand'];?>" />
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Price Offer</label>
                                <div class="controls">
                                    <input type="text" class="span6 " required name="pro_price_offer"
                                    value="<?php echo $productRequest['pro_price_offer'];?>" />
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Description</label>
                                <div class="controls">
                                    <input type="textarea" class="span6 " required name="pro_description"
                                    value="<?php echo $productRequest['pro_description'];?>" />
                                    
                                </div>
                            </div>
                            <input type="hidden" name="pro_id" value="<?php echo $productRequest['pro_id']; ?>">

                            <div class="form-actions">
                                <button type="submit" name ="updatebtn" class="btn btn-success">Update</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            
           
            
            

         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
</div>

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>

   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script src="js/jQuery.dualListBox-1.3.js" language="javascript" type="text/javascript"></script>


   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>



   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page-->
   <script src="js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->

   <script language="javascript" type="text/javascript">

       $(function() {

           $.configureBoxes();

       });

   </script>


</body>
<!-- END BODY -->
</html>