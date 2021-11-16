<div id="dt_{{table_name}}" class="pusaka-datatable"></div>

<script type="text/javascript">
  var Dt_{{table_name}}   = PusakaDatatableClient({
     id          : 'dt_{{table_name}}',
     url         : apiurl       + '{PlaceApiUrlHere}.api/datatable/',
     template    : ASSETS_URL   + 'plugins/pusaka/DataTable/PusakaDatatableTemplateV2.php',
     header      : function(head) {
        head.append(`
           {{table_head}}
        `);
     },
     footer      : function(foot) {
        // foot.append(`
        //    <tr>
        //       <td><input class="form-control" placeholder="Id"   name=""/></td>
        //       <td><input class="form-control" placeholder="Name"    name=""/></td>
        //    </tr>
        // `);   
     },
     body        : function(row, index) {
        return (`
           <tr>
              <td style="width:20px;"><button onclick="formCtrl.delete(this, '`+row.Id+`')" class="btn btn-mini btn-danger"><i class="fa fa-remove"></i></button></td>
              {{table_column}}
           </tr>
        `);
     },
     init : {
        limit:5
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