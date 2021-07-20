<?php 
session_start();
$page = $_SERVER['PHP_SELF'];
 $sec = "5";
 header("Refresh: $sec; url=$page");
 ?>
<html>  
    <head>  
        <title>Verification</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <style>
        	.button {
					background-color: black;
					border: none;
					
					border-radius : 10px;
					color: white;
					padding: 10px 32px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 16px;
					margin: 4px 2px;
					-webkit-transition-duration: 0.4s; 
					transition-duration: 0.4s;
					cursor: pointer;
					}
					.button:hover {
					background-color: #ebe6e6; 
					color: black;
					font-weight:bold;
					border: 1px solid black;
                    }
        </style>
    </head>  
    <body style="padding-bottom: 10px; background-image: url(images/newspaper.jpg); background-size: cover; font-family:Arvo;">  

    <div class= "nav-bar">
		<div align= "center" ><img src="images/NITS.png" alt="" style="width:100px;height:100px; margin:auto;"> <h1 style="font-family: garamond">National Institute of Technology</h1></div>
				<div align="center" style="float:center;">
				
				<a href="verifyAcademic.php" style="text-decoration: none;color: white;font-size: 15px;"><button class="button">
					Verify Academic Details
					</button></a>
<!-- 					
						
					<a href="verifyInternship.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Verify Internship Details</button></a>
					 -->
					
						
					<a href="Drive/add_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">Add Placement Drive</button></a>
					
					
						
					<a href="Drive/view_drive.php" style="text-decoration: none;color: black;font-size: 15px;"><button class="button">View/Edit Placement Drive</button></a>
					

			</div>
		</div>
        <p>
        <script type="text/javascript">
            function goback() {
                window.history.back();
            }
        </script>
        <button class="button" style="position: relative; top:-50px;left:20px;"onclick="goback()">Back</button>
    </p>


<hr>
        <div class="container">  
           
            <div class="table-responsive">  
                <h3 style="text-align: center;">
                    PENDING INTERNSHIP DETAILS VERIFICATION 
                </h3>
                <!-- <h3 align="center">Back to Tutorial - <a href="http://www.webslesson.info/2016/02/live-table-add-edit-delete-using-ajax-jquery-in-php-mysql.html" title="Live Table Add Edit Delete using Ajax Jquery in PHP Mysql">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</a></h3><br /> -->
                <br>
                <span id="result"></span>
                <div id="live_data">
                </div>                 
            </div> 
           
        </div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
                $('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    // $(document).on('click', '#btn_add', function(){  
    //     var first_name = $('#first_name').text();  
    //     var last_name = $('#last_name').text();  
    //     if(first_name == '')  
    //     {  
    //         alert("Enter First Name");  
    //         return false;  
    //     }  
    //     if(last_name == '')  
    //     {  
    //         alert("Enter Last Name");  
    //         return false;  
    //     }  
                                    // $.ajax({  
                                    //     url:"insert.php",  
                                    //     method:"POST",  
                                    //     data:{first_name:first_name, last_name:last_name},  
                                    //     dataType:"text",  
                                    //     success:function(data)  
                                    //     {  
                                    //         alert(data);  
                                    //         fetch_data();  
                                    //     }  
                                    // })  
    });  
    
    // function edit_data(id, text, column_name)  
 //    {  
 //        $.ajax({  
 //            url:"edit.php",  
 //            method:"POST",  
 //            data:{id:id, text:text, column_name:column_name},  
 //            dataType:"text",  
 //            success:function(data){  
 //                //alert(data);
    //          $('#result').html("<div class='alert alert-success'>"+data+"</div>");
 //            }  
 //        });  
 //    }  
    // $(document).on('blur', '.first_name', function(){  
    //     var id = $(this).data("id1");  
    //     var first_name = $(this).text();  
    //     edit_data(id, first_name, "first_name");  
    // });  
    // $(document).on('blur', '.last_name', function(){  
    //     var id = $(this).data("id2");  
    //     var last_name = $(this).text();  
    //     edit_data(id,last_name, "last_name");  
    // });  
    $(document).on('click', '.btn_delete', function(){  
        var id1=$(this).data("id3");
        var a = id1/10;
        var b = id1%10;
        var id= parseInt(a);
        var CompanyName = $("#CompanyName"+id+b).text();
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{ScholarID:id,CompanyName:CompanyName},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data(); 
                    window.location.reload();  
                }  
            });  
        }  
    }


);

$(document).on('click', '.btn_accept', function(){  
        var id1=$(this).data("id4");
        var a = id1/10;
        var b = id1%10;
        var id= parseInt(a);
        var CompanyName = $("#CompanyName"+id+b).text();
        if(confirm("Are you sure you want to confirm this?"))  
        {  
            $.ajax({  
                url:"verify_1.php",  
                method:"POST",  
                data:{ScholarID:id,CompanyName:CompanyName},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });
</script>