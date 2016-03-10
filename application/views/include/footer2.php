

</div>
  <script src="/assets/js/jquery.js"></script>


      <script>
  
      $(document).ready(function (){



        $('.deltempsub').click(function(){
          x = $(this).data('param');
          $.post('/addClassed/deltemcla', {x}, function(data){
            $('.err').html("<div class='alert alert-success'>Subject Removed</div>");
            $('.ref_tab').html(data); 
          });
       });
       
       $('.stud_add_subs').click(function(){
          $('#adddshow').modal('show');
       });

      $('.delsub').click(function(){
          x = $(this).data('param');
          m = confirm('Are You Sure?');
          if (m == true) {
              $.post('/addClassed/deletesubs', {x}, function(data){
                $('.err').html("<div class='alert alert-success'>Class Successfully Deleted</div>");
                $(".refretbl").html(data);
            });
          };
          
        });
    });
      </script>

  </body>
</html>
