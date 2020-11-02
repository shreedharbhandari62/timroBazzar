<?php
  include 'layouts/header.php';

    

?>
 <!-- END HEADER -->
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
                     
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Inquiry</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Inquiries
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                <?php if (isset(($_SESSION['msg'])))  echo $_SESSION['msg']; unset($_SESSION['msg']);?>
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Users Inquiries</h4>
                        
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="hidden" class="group-checkable" data-set="#sample_1 .checkboxes" />S.N</th>
                                <th>Product Name</th>
                                <th class="hidden-phone">Inquired By</th>
                                <th class="hidden-phone">Inquired Date</th>
                                <th class="hidden-phone">Image</th>
                                <th class="hidden-phone">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $inquiries=getAllInquiriesByUserId($conn,$_SESSION['user'] ['id']);
                            
                            foreach ($inquiries as $key => $inquiry):
                            ?>
                            
                            <tr class="odd gradeX">
                                <td><input type="hidden" class="checkboxes" value="1" /><?php echo ++$key; ?></td>
                                <?php $product = getProductRequestById($conn, $inquiry['pro_id']); 
                                      $user = getUserById($conn, $inquiry['inquiry_by']);       
                                ?>
                                <td><?php echo $product['pro_name'] ?></td>
                                <td class="hidden-phone"><?php echo $user['user_username']." is inquiring to sell you the product"; ?></td>
                                <td><?php echo $inquiry['inquiry_date'] ?></td>
                                <td><?php 
                                $s=$inquiry['inquiry_pro_photo'];
                                
                                   ?>
                                     <img src="../ProductImages/<?php echo $s; ?>" alt="Product Image" width="200px"/>
                                   </td>
                                <td ><a href="inquiryconfirmed.php?ref=<?php echo $inquiry['inquiry_id'];?>" class="btn btn-xs btn-success">
																	Confirm
																</a>
                                <a href="deleteinquiry.php?ref=<?php echo $inquiry['inquiry_id'];?>" class="btn btn-xs btn-danger">
                                  Delete
                                </a>

																</td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>