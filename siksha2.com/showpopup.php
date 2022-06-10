<?php
    include('./maininclude/header.php');
    include('dbcon.php');
    $query = "select * from employee";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
<title>jvycttfvghb</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<div class="container">
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <thead>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><img src="img/courses/<?php echo $row['photo']; ?>" height="50" width="50"/></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['position']; ?></td>
                                <td><?php echo $row['office']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['salary']; ?></td>
                                <td><button data-id='<?php echo $row['id']; ?>' class="userinfo btn btn-success">Info</button></td>
                            </tr>
                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.userinfo.').click(function(){
            var userid = $(this).data('id');
            alert(userid)
        });
    });
</script>








<!-- Start including footer -->
    <?php
    include('./maininclude/footer.php');
?>
<!-- End including footer -->