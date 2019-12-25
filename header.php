<?php require_once dirname(__FILE__)."/Apps/Libs/Session.php";
include_once dirname(__FILE__). "/Apps/Libs/DBConnection.php";?>
<?php

$session = new Session(); 
if ( isset( $_GET[ 'masp' ]) and isset($_GET['chucnang']) )  {
    if($_GET['chucnang']==1)
    $session->addcart( $_GET[ 'masp' ] );
} 
$soluong = $session->ktrSession();?>
<style> *{
	font-family: monospace,"arial";
	font-weight:600;
	}
</style>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <?php include("Dangnhap.php");?>
        </div>
    </div>
    <div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <?php include("dangxuat.php");?>
        </div>
    </div>
      
    <div class="header-top">
        <div class="container">
            <div class="col-md-8">
                <div class="user-menu">
					
                    <ul>
						
                        <li><a href="#" data-toggle="modal"
                         data-target="#logout-modal" ><i class="fa fa-user"></i> 
                        <?php 
							
							if(isset( $_SESSION['username'])and $_SESSION['username']!='Administrator')
                               echo $_SESSION['username'];
                            else 
                            	echo "Tài khoản"?></a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-search"></i> Kiểm tra</a></li>
                        <li><a href="#" data-toggle="modal"
                         data-target="#login-modal"><i class="fa fa-user">

                         </i> Đăng nhập</a></li>
                         <li><a href="dangki.php"><i class="fa fa-user"></i> Đăng kí</a></li>
                        
                    </ul>
					
                </div>
            </div>
            <div class="col-md-4">
                <form action="index.php" class="search-form" method = "post">
                    <div class="form-group has-feedback">
						
                        <label for="search" class="sr-only">Tìm kiếm</label>
                        <input type="text" class="form-control" name="search"
                               id="search" placeholder="Nhập từ khóa">
                        <!--button type = "submit" name = "tim" >Tìm</button-->
						
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="logo">
                    <h1><a href="index.php"><img src="Media/img/logoGHT.png" width="210px"></a></h1>
                </div>
            </div>
        
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="giohang.php"><i class="fa fa-3x fa-shopping-cart"></i> <span class="badge">
                        <?php echo $session->ktrSession();?></span></a>
                </div>
            </div>
        </div>
    </div>
</div> 
