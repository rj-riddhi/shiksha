//Ajax call for Admin Login Verification
function checkAdminLogin(){
    var adminLogemail = $("#adminLogemail").val();
    //console.log(adminLogemail);
    var adminLogPass = $("#adminLogPass").val();
    //console.log(adminLogPass);
    $.ajax({
        url:"admin/admin.php",
        method: "POST",
        data:{
            //checkLogemail: "checklogmail",
            adminLogemail:adminLogemail,
            adminLogPass:adminLogPass,
        },
        success:function(data){
           // console.log('bhdscj n');
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Passwored!</small>');
            }else if(data == 1){
                $("#statusAdminLogMsg").html('<small class="alert alert-success">Login Successful!</small>');
                setTimeout(()=>{
                    window.location.href = "index.php";
                }, 1000)

                
            }
        }
    });
}