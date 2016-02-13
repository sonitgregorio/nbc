

</div>
  <script src="/assets/js/jquery.js"></script>


      <script>
  
      $(document).ready(function (){
       

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
