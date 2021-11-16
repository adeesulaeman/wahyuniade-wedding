<?php include(APPPATH . 'controllers/__ui/core/pages/backend/header.ui.php') ?>
<script type="text/javascript" src="<?=$assets?>plugins/pusaka/DataTable/PusakaDatatableClient.js"></script>

<!--main-container-part-->
<div id="content">
   <!--breadcrumbs-->
   <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
   </div>
   <!--End-breadcrumbs-->

   <!--Action boxes-->
   <div class="container-fluid">
      <div class="quick-actions_homepage">
         <ul class="quick-actions">
            <li id="materi" onclick="formCtrl.materi(this)" class="bg_lb span2"> <a href="#"> <i class="icon-envelope"></i> Materi </a> </li>
            <li id="sku" onclick="formCtrl.sku(this)" class="bg_ls span2"> <a href="#"> <i class="icon-file"></i> Isi SKU</a> </li>
            <li id="skk" onclick="formCtrl.skk(this)" class="bg_ls span2"> <a href="#""> <i class="icon-file"></i> Isi SKK</a> </li>
         </ul>
      </div>
   </div>

   <!--Action boxes-->
   <div class="container-fluid">
      <div class="quick-actions_homepage">
         <ul class="quick-actions">
            <li id="approve"  class="bg_lb span2"> <a href="<?=$baseurl?>leave/request"> <i class="icon-envelope"></i> Approve </a> </li>
            <li id="pengujian" class="bg_ls span4"> <a href="<?=$baseurl?>leave/application"> <i class="icon-file"></i> Lihat List Pengujian</a> </li>
         </ul>
      </div>
   </div>

   <!--Action boxes-->
   <div class="container-fluid">
      <div class="row-fluid" id="isimateri" style="display: none;">
         <div class="span12">
            <div class="widget-box">
              <div class="widget-title bg_ly"><span class="icon"><i class="icon-remove" onclick="formCtrl.back(this)"></i></span>
                <h5>List</h5>
              </div>
              <div class="widget-content nopadding collapse in">
                 
                  <div id="dt_materi" class="pusaka-datatable"></div>

               <script type="text/javascript">
                  var DtMateri    = PusakaDatatableClient({
                     id       : 'dt_materi',
                     url      : apiurl       + 'master/materi.api/datatable/',
                     template : ASSETS_URL   + 'plugins/pusaka/DataTable/PusakaDatatableTemplateV2.php',
                     header   : function(head) {
                        head.append(`
                           <tr>
                              <th></th>
                              <th>ID Materi</th>
                              <th>Isi Materi</th>
                              <th>Category</th>
                           </tr>
                           <tr>
                              <th></th>
                              <th class="insearch-head"><input name="IdMateri" dtpart="searchadvance" class="form-control" placeholder=" "   /></th>
                              <th class="insearch-head"><input name="IsiMateri" dtpart="searchadvance" class="form-control" placeholder=" " /></th>
                              <th class="insearch-head"><input name="CategoryMateri" dtpart="searchadvance" class="form-control" placeholder=" " /></th>
                           </tr>
                        `);
                     },
                     footer  : function(foot) {
                        // foot.append(`
                        //    <tr>
                        //       <td><input class="form-control" placeholder="Id"   name=""/></td>
                        //       <td><input class="form-control" placeholder="Name"    name=""/></td>
                        //    </tr>
                        // `);   
                     },
                     body    : function(row, index) {
                        return (`
                           <tr>
                              <td style="width:20px;"><button onclick="formCtrl.delete(this, '`+row.IdMateri+`')" class="btn btn-mini btn-danger"><i class="fa fa-remove"></i></button></td>
                              <td onclick="formCtrl.openedit('`+row.IdMateri+`');">`+row.IdMateri+`</td>
                              <td onclick="formCtrl.openedit('`+row.IdMateri+`');">`+row.IsiMateri+`</td>
                              <td onclick="formCtrl.openedit('`+row.IdMateri+`');">`+row.CategoryMateri+`</td>
                           </tr>
                        `);
                     },
                     init : {
                        limit:5,
                        post:{
                           'p94a08da1fecbb6e8b46990538c7b50b2':p94a08da1fecbb6e8b46990538c7b50b2
                        }
                     },
                     // next : function() {
                     // },
                     // prev : function() {
                     // },
                     // gotopage : function() {
                     // },
                     // limit : function() {
                     // },
                     // searchglobal: function() {
                     // },
                     // searchadvance: function() {
                     // }
                  });
               </script>

              </div>
            </div>
         </div>
      </div>

     <div class="row-fluid" id="isisku">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title bg_ly"><span class="icon"><i class="icon-remove" onclick="formCtrl.back(this)"></i></span>
                <h5>Isi SKU</h5>
              </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="3%">No.</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Opts</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                     1
                  </td>
                  <td class="taskDesc">
                     <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                  </td>
                  <td class="taskStatus"><span class="in-progress">in progress</span></td>
                  <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                </tr>
                <tr>
                  <td>
                     2
                  </td>
                  <td class="taskDesc">
                     <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>

                  </td>
                  <td class="taskStatus"><span class="pending">pending</span></td>
                  <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><input type="checkbox" name="radios" /></td>
                </tr>
                <tr>
                  <td>
                     3
                  </td>
                  <td class="taskDesc">
                     <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                     <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  </td>
                  <td class="taskStatus"><span class="done">done</span></td>
                  <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a></td>
                </tr>
                <tr>
                   <td class="taskOptions">
                      <button class="btn btn-warning">Mark</button>
                   </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
     </div>
   </div>

</div><!-- END CONTENT -->

<!--end-main-container-part-->
<!-- 
<script src="<?=$assets?>/systemvendor/go-js/go.js"></script>
-->

<!-- <script src="<?=$assets?>systemvendor/diagrams/raphael.min.js"></script>
<script src="<?=$assets?>systemvendor/diagrams/flowchart.min.js"></script>
 -->
<!-- 
<script type="text/javascript">

$(document).ready(function(){

   code  = 
      `
      a=>start: Start :>http://google.com[blank]
      b=>end: End
      c=>operation: Create Period:>`+BASE_URL+`settings/period[blank]
      d=>operation: Calculate
      e=>condition: Update Salary?
      f=>operation: Update Salary
      g=>operation: Close Period

      a->c
      c(right)->e
      e(yes, right)->f(right)->g->d
      e(no)->d
      d->b

      a@>c({"stroke":"Red"})@
      c@>e({"stroke":"Red"})@
      e@>f({"stroke":"Blue"})@>g({"stroke":"Red"})@>d({"stroke":"Red"})@
      e@>d({"stroke":"Green"})
      d@>b({"stroke":"Red"})
      `;

   chart = flowchart.parse(code);

   chart.drawSVG('WorkFlowChartDiagram', {
         // 'x': 30,
         // 'y': 50,
         'line-width': 3,
         'maxWidth': 3,//ensures the flowcharts fits within a certian width
         'line-length': 50,
         'text-margin': 10,
         'font-size': 14,
         'font': 'normal',
         'font-family': 'Helvetica',
         'font-weight': 'normal',
         'font-color': 'black',
         'line-color': 'black',
         'element-color': 'black',
         'fill': 'white',
         'yes-text': 'yes',
         'no-text': 'no',
         'arrow-end': 'block',
         'scale': 1,
         'symbols': {
         'start': {
            'font-color': 'red',
            'element-color': 'green',
            'fill': 'yellow'
         },
         'end':{
            'class': 'end-element'
         }
      },
      'flowstate' : {
         'past' : { 'fill' : '#CCCCCC', 'font-size' : 12},
         'current' : {'fill' : 'yellow', 'font-color' : 'red', 'font-weight' : 'bold'},
         'future' : { 'fill' : '#FFFF99'},
         'request' : { 'fill' : 'blue'},
         'invalid': {'fill' : '#444444'},
         'approved' : { 'fill' : '#58C4A3', 'font-size' : 12, 'yes-text' : 'APPROVED', 'no-text' : 'n/a' },
         'rejected' : { 'fill' : '#C45879', 'font-size' : 12, 'yes-text' : 'n/a', 'no-text' : 'REJECTED' }
      }

   });

});
</script>
 -->

<?php include(APPPATH . 'controllers/__ui/core/pages/backend/footer.ui.php') ?>

