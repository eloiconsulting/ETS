<?php include('template/dashboardheader.php');?>
<!-- Fixed Left Sidebar -->
 
    
    
    <section id="main-content">
     <section class="wrapper main-wrapper ">
      <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div> 
        <?php } ?>
     <div class="mt-5">
      <div class="row">
          <div class="col-md-8">
            <h2>Welcome! <?php echo $_SESSION['username'];?> </h2>
          </div>
          <div class="col-md-4 mt-3">
            <div class="row">
                <div class="col-md-3 ">
                  <h4><label>Date:</label></h4>
                  <h4><label>Day:</label></h4>
                </div>
                <div class="col-md-9">
                 <h4><span class="badge badge-pill badge-primary"><?php echo date('d-m-Y');?></span></h4>
                 <h4 class="mt-3"><span class="badge badge-pill badge-primary"><?php echo date('l');?></span></h4>
                  <!-- <input type="text" name="curdate" id="departing_on" value="<?php echo date('d-m-Y:-l');?>" class="form-control" style="text-align:center;"> -->
                </div>
            </div>
           
          </div>
      </div>
      
     </div> 
      <!-- <h1>Welcome - <?php echo $_SESSION['username'];?></h1> -->
      <div class="row">
        <div class = "col-md-8">
          <div class="row">
        <?php 
         if($_SESSION['userid'] == 1){?>
        <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Total Enquiries</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/totallist"><span class="badge badge-pill badge-success"><?php echo $totalcounts;?></span></a>
                </div>
              </section>
         </div>
         
          <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Total Users</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/GetTotalusers"><span class="badge badge-pill badge-primary"><?php echo $totalusercounts;?></span></a>
                </div>
              </section>
         </div> 
         
          <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">New Enquiries</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/newenquiries"><span class="badge badge-pill badge-success"><?php echo $totnewenqcounts;?></span></a>
                </div>
              </section>
         </div>
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Assigned Task</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/assignedtasklist"><span class="badge badge-pill badge-primary"><?php echo $asntskcounts;?></span></a>
                </div>
              </section>
         </div>
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Total Sales</p>
                  <span class="badge badge-pill badge-secondary"><?php echo $totalwoncounts;?></span>
                </div>
              </section>
         </div>
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Percentage%</p>
                  <?php
                  $per =  $totalcounts - $totalwoncounts;
                  
                  $totper = $per / 100 * 100;
                  ?>
                  <span class="badge badge-pill badge-secondary"><?php echo $totper;?>%</span>
                </div>
              </section>
         </div>
         <?php
       } else {
       ?> 
        
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Total Task</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/usertasklist"><span class="badge badge-pill badge-success"><?php echo $taskcounts;?></span></a>
                </div>
              </section>
         </div>
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">New Task</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/usernewtask"><span class="badge badge-pill badge-success"><?php echo $newusertaskcounts;?></span></a>
                </div>
              </section>
         </div>
       <?php } ?>
       
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Task Inprogress </p>
                  <a href="<?php echo base_url();?>Dashboardctrl/Inprogressopportunitylist"><span class="badge badge-pill badge-warning"><?php echo $totalinprogresscounts;?></span></a>
                </div>
              </section>
         </div>
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Task Completed</p>
                    <a href="<?php echo base_url();?>Dashboardctrl/wonopportunitylist"><span class="badge badge-pill badge-success"><?php echo $totalwoncounts;?></span></a>
                </div>
              </section>
         </div>
         
         <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Task Pending</p>
                  <a href="<?php echo base_url();?>Dashboardctrl/lostopportunitylist"><span class="badge badge-pill badge-danger"><?php echo $totallostcounts;?></span></a>
                </div>
              </section>
         </div>

         <?php if($_SESSION['userid']!= 1){?>
         <!-- <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Assigned Tasks</p>
                  <span class="badge badge-pill badge-danger"><?php echo $totallostcounts;?></span>
                </div>
              </section>
         </div> -->
         <!-- <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Completed Tasks</p>
                  <span class="badge badge-pill badge-danger"><?php echo $totallostcounts;?></span>
                </div>
              </section>
         </div>
          <div class="col-md-3">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                <div>
                  <p class="counttitle">Pending Tasks</p>
                  <span class="badge badge-pill badge-danger"><?php echo $totallostcounts;?></span>
                </div>
              </section>
         </div> -->
       <?php } ?>

       </div>
      </div>  
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <section class="box shadow-lg p-3 mb-5 bg-white rounded">
        <p><b>Current Tasks</b></p>
        <?php 
        if($_SESSION['userid'] == 1)
        {
          $tasks = $this->db->select('enq_id')
                  ->from('won_opportunity')
                  ->where('opp_status ',1)
                  ->get()
                  ->result_array();


          }else{
            $tasks = $this->db->select('enq_id')
                  ->from('won_opportunity')
                  ->where(array('opp_status '=>1,'assign_to'=>$_SESSION['userid']))
                  ->get()
                  ->result_array();
          }
          $i =1; ?>
          <table class="table table-striped">
                        <thead style="font-size: 1rem;">
                          <tr>
                            <th>S.No</th>
                            <th>Task No</th>
                          </tr>
                        </thead>
                        <tbody style="font-size: 1rem;">
          <?php
                  foreach ($tasks as $key => $value) {  ?>
                      
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $value['enq_id'] ;?></td>
                          </tr>
                        
                      <!-- <h6></h6><p class="badge badge-pill badge-info"> -  -->

                <?php   $i++;
              } ?>
        </tbody>
                      </table>
       
        
      </section>
      <section class="box shadow-lg p-3 mb-5 bg-white rounded">
        <p><b>Total Tasks</b></p>
        <?php 
        if($_SESSION['userid'] == 1)
        {
          $tasks = $this->db->select('enq_id')
                  ->from('won_opportunity')
                  ->get()
                  ->result_array();


          }else{
            $tasks = $this->db->select('enq_id')
                  ->from('won_opportunity')
                  ->where(array('assign_to'=>$_SESSION['userid']))
                  ->get()
                  ->result_array();
          }
          $i =1; ?>
          <table class="table table-striped">
                        <thead style="font-size: 1rem;">
                          <tr>
                            <th>S.No</th>
                            <th>Task No</th>
                          </tr>
                        </thead>
                        <tbody style="font-size: 1rem;">
          <?php
                  foreach ($tasks as $key => $value) {  ?>
                      
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $value['enq_id'] ;?></td>
                          </tr>
                        
                      <!-- <h6></h6><p class="badge badge-pill badge-info"> -  -->

                <?php   $i++;
              } ?>
        </tbody>
                      </table>
       
        
      </section>

      <section class="box shadow-lg p-3 mb-5 bg-white rounded">
        <p><b>Upcomming Tasks</b></p>
        <?php 
         if($_SESSION['userid'] == 1)
        {
          $tasks = $this->db->select('task_no')
                  ->from('task_assign')
                  ->where('is_status',0)
                  ->get()
                  ->result_array();
        }else{
          $tasks = $this->db->select('task_no')
                  ->from('task_assign')
                  ->where(array('is_status'=>0,'assign_to'=>$_SESSION['userid']))
                  ->get()
                  ->result_array();
        }
        $i =1; ?>
         <table class="table table-striped">
                        <thead style="font-size: 1rem;">
                          <tr>
                            <th>S.No</th>
                            <th>Task No</th>
                          </tr>
                        </thead>
                        <tbody style="font-size: 1rem;"> 
        <?php
                  foreach ($tasks as $key => $value) {  ?>
                   
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $value['task_no'] ;?></td>
                          </tr>
                       

                <?php   $i++;
              } 
              ?>
               </tbody>
                      </table>
                      <!-- <ul> -->
                      <!-- <h6><?php //echo $i;?></h6><p class="badge badge-pill badge-warning"> <?php //echo $value['task_no'] ;?></p> -->
                    <!-- </ul> -->
       
        
      </section>


      <?php
      if($_SESSION['userid'] == 1){ 
      ?>
        <!--  <section class="box shadow-lg p-3 mb-5 bg-white rounded">
        <p><b>Users</b></p>
        <?php 
        $users = $this->db->select('*')
                  ->from('user_login')
                  ->get()
                  ->result_array();

                  $i = 1;
                  ?>
                  <table class="table table-striped">
                        <thead style="font-size: 1rem;">
                          <tr>
                            <th>S.No</th>
                            <th>User Mail</th>
                          </tr>
                        </thead>
                        <tbody style="font-size: 1rem;">
                          <?php 
                foreach ($users as $key => $value) {?>
                  
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $value['user_name'] ;?></td>
                          </tr>

                   
                <?php 
                $i++;
              }
        ?>
                                </tbody>
                      </table>
       
      </section> -->
    <?php } ?>
       
      </div>     
      </div>    
         
      <div class="clearfix"></div> <!--**************clearfix**************-->
         <div class="row">
            <div class="col-md-8">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="wrapper">
                      <canvas id='c'></canvas>
                      <div class="label">text</div>
                    </div>
                      <p>Please mouse over the dots</p>
                </section>
              </div>
              <div class="col-md-4">              
              <section class="box shadow-lg p-3 mb-5 bg-white rounded">
                    <p><b>Process</b></p>

          <div class="chart">
                    <canvas id="property_types" class="pie"></canvas>
                    <div id="pie_legend" class="py-3 text-left col-md-7 mx-auto"></div>
                  </div>
                </section>
              </div>
         </div>
              </section>
         </div>
         
        </section>
    </section>
<?php include('template/footer.php');?>
<!-- <script>
  $(document).ready(function(){
    window.location='<?php echo base_url();?>DashboardCtrl/dashboardview';
  });
</script> -->
<!-- <script>

$(document).ready( function() {
    $('#datePicker').val(new Date().toDateInputValue());
});


</script> -->
<script>
    var options = {
    responsive: true,
    easing:'easeInExpo',
    scaleBeginAtZero: true,
        // you don't have to define this here, it exists inside the global defaults
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  }

    // PIE
    // PROPERTY TYPE DISTRIBUTION
    // context
    var ctxPTD = $("#property_types").get(0).getContext("2d");
    // data
    var dataPTD = [
      {
        label: "Task Assigned",
        color: "#5093ce",
        highlight: "#78acd9",
        value: 50
      },
      // {
      //   label: "Townhouse/Condo",
      //   color: "#c7ccd1",
      //   highlight: "#e3e6e8",
      //   value: 12
      // },
      {
        label: "Upcomming Task",
        color: "#7fc77f",
        highlight: "#a3d7a3",
        value:10
      },
      // {
      //   label: "Multifamily",
      //   color: "#fab657",
      //   highlight: "#fbcb88",
      //   value: 8
      // },
      // {
      //   label: "Farm/Ranch",
      //   color: "#eaaede",
      //   highlight: "#f5d6ef",
      //   value: 8
      // },
      {
        label: "Current Task",
        color: "#dd6864",
        highlight: "#e6918e",
        value: 40
      },
      
    ]

    // Property Type Distribution
    var propertyTypes = new Chart(ctxPTD).Pie(dataPTD, options);
      // pie chart legend
      $("#pie_legend").html(propertyTypes.generateLegend());
</script>