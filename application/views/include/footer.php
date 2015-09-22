

</div>
  <script src="/assets/js/jquery.js"></script>
  <script src="/assets/js/bootstrap.js"></script>
  <script src="/assets/js/jquery.dataTables.min.js"></script>


      <script>
      $(document).ready(function (){
          var $dname11  = 0
          var $dname21  = 0;
          var $dname31  = 0;
          var $dname41  = 0;
          var $dname51  = 0;
          var $total    = 0;
          $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
          });

          $('.dname').click(function(){
              $total_dname = $('#dname');
              $dname1 = $('input[name=dname1]:checked');
              if($dname1.length > 0)
              {
                  $dname11 = $dname1.val();
              }
              $dname2 = $('input[name=dname2]:checked');

              if($dname2.length > 0)
              {
                  $dname21 = $dname2.val();
              }
              $dname3 = $('input[name=dname3]:checked');
              $dname4 = $('input[name=dname4]:checked');
              $dname5 = $('input[name=dname5]:checked');
              if($dname3.length > 0)
              {
                  $dname31 = $dname3.val();
              }
              if($dname4.length > 0)
              {
                  $dname41 = $dname4.val();
              }
              if($dname5.length > 0)
              {
                  $dname51 = $dname5.val();
              }
              $total = Number($dname11) + Number($dname21) + Number($dname31) + Number($dname41) + Number($dname51);
              $total_dname.html($total);
          });

          var $cname11  = 0
          var $cname21  = 0;
          var $cname31  = 0;
          var $cname41  = 0;
          var $cname51  = 0;
          var $total    = 0;

          $('.cname').click(function(){
              $total_cname = $('#cname');
              $dname1 = $('input[name=cname1]:checked');
              if($dname1.length > 0)
              {
                  $cname11 = $dname1.val();
              }
              $dname2 = $('input[name=cname2]:checked');

              if($dname2.length > 0)
              {
                  $cname21 = $dname2.val();
              }
              $dname3 = $('input[name=cname3]:checked');
              $dname4 = $('input[name=cname4]:checked');
              $dname5 = $('input[name=cname5]:checked');
              if($dname3.length > 0)
              {
                  $cname31 = $dname3.val();
              }
              if($dname4.length > 0)
              {
                  $cname41 = $dname4.val();
              }
              if($dname5.length > 0)
              {
                  $cname51 = $dname5.val();
              }
              $total = Number($cname11) + Number($cname21) + Number($cname31) + Number($cname41) + Number($cname51);
              $total_cname.html($total);
          });

          var $bname11  = 0
          var $bname21  = 0;
          var $bname31  = 0;
          var $bname41  = 0;
          var $bname51  = 0;
          var $total    = 0;

          $('.bname').click(function(){
              $total_bname = $('#bname');
              $dname1 = $('input[name=bname1]:checked');
              if($dname1.length > 0)
              {
                  $bname11 = $dname1.val();
              }
              $dname2 = $('input[name=bname2]:checked');

              if($dname2.length > 0)
              {
                  $bname21 = $dname2.val();
              }
              $dname3 = $('input[name=bname3]:checked');
              $dname4 = $('input[name=bname4]:checked');
              $dname5 = $('input[name=bname5]:checked');
              if($dname3.length > 0)
              {
                  $bname31 = $dname3.val();
              }
              if($dname4.length > 0)
              {
                  $bname41 = $dname4.val();
              }
              if($dname5.length > 0)
              {
                  $bname51 = $dname5.val();
              }
              $total = Number($bname11) + Number($bname21) + Number($bname31) + Number($bname41) + Number($bname51);
              $total_bname.html($total);
          });

          var $aname11  = 0
          var $aname21  = 0;
          var $aname31  = 0;
          var $aname41  = 0;
          var $aname51  = 0;
          var $total    = 0;

          $('.aname').click(function(){
              $total_aname = $('#aname');
              $dname1 = $('input[name=aname1]:checked');
              if($dname1.length > 0)
              {
                  $aname11 = $dname1.val();
              }
              $dname2 = $('input[name=aname2]:checked');

              if($dname2.length > 0)
              {
                  $aname21 = $dname2.val();
              }
              $dname3 = $('input[name=aname3]:checked');
              $dname4 = $('input[name=aname4]:checked');
              $dname5 = $('input[name=aname5]:checked');
              if($dname3.length > 0)
              {
                  $aname31 = $dname3.val();
              }
              if($dname4.length > 0)
              {
                  $aname41 = $dname4.val();
              }
              if($dname5.length > 0)
              {
                  $aname51 = $dname5.val();
              }
              $total = Number($aname11) + Number($aname21) + Number($aname31) + Number($aname41) + Number($aname51);
              $total_aname.html($total);
          });
        $('#example').DataTable();
      });
      </script>
  </body>
</html>
