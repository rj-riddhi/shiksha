<?php
    
    if(!isset($_SESSION)){
        session_start();
    }
        //   if(isset($_SESSION['is_admin_login'])){
        //       $adminEmail = $_SESSION['adminLogEmail'];
        //   }else{
        //       echo "<script> location.href='../index.php'; </script>";
        //   }
          include('./admininclude/header.php');
          include('../dbConnection.php');
    
?>
      
      <div class="col-sm-9">
            <div class="row mx-5 text-center">
              <div class="col-sm-4 ">
                 <div class="card text-white bg-danger mb-3"
                 style="max-width: 18rem;">
                 <div class="card-header">Courses</div>
                 <div class="card-body">
                     <h4 class="card-title">
                         5
                     </h4>
                <a class="btn text-white" href="#">View</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 ">
       <div class="card text-white bg-success mb-3"
       style="max-width: 18rem;">
         <div class="card-header">Students</div>
         <div class="card-body">
                     <h4 class="card-title">
                    25
                     </h4>
                <a class="btn text-white" href="#">View</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 ">
       <div class="card text-white bg-info mb-3"
       style="max-width: 18rem;">
         <div class="card-header">Sold</div>
         <div class="card-body">
                     <h4 class="card-title">
                     3
                     </h4>
                <a class="btn text-white" href="#">View</a>
            </div>
        </div>
    </div>
    <div class="mx-1  text-center mt-4 col-sm-12">
        <!-- Table -->
    <p class="bg-dark text-white p-2">Course Ordered</p>
     <table class="table">
       <thead>
          <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Course ID</th>
              <th scope="col">Student Email</th>
              <th scope="col">Order Date</th>
              <th scope="col">Amount</th>
              <th scope="col">Action</th>
           </tr>
        </thead>
      <tbody>
          <tr>
            <th scope="row">22</th>
            <td>100</td>
            <td>example@gmail.com</td>
            <td>22/1/2022</td>
            <td>1000</td>
            <td><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i 
                  class="far fa-trash-alt"></i></button></td>
        </tr>
    </tbody>
    </table>
    </div>
   </div>
  </div>
</div>

</div>
</div>

<?php
      include('./admininclude/footer.php');
?>


</body>