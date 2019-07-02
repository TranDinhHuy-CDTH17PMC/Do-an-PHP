<?php
session_start();
class Session{
	
    public
    function ktrSession(){
    $ok=1;
	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $k=>$v)
		{
			if(isset($k))
			{
			$ok=2;
			}
		}
	}

	if ($ok != 2)
	{
		return 0;
	} else {
        $items = $_SESSION['cart'];
		return count($items);
	}
    }
    /*
    *Thêm 1 sản phẩm vào giỏ hàng 
    */
    function addcart($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $qty = $_SESSION['cart'][$id] + 1;
        } else {
            $qty = 1;
        }
        $_SESSION['cart'][$id] = $qty;
    }
    function delcart($id){
        $id=$_GET['productid'];
        if($id == 0)
        {
            unset($_SESSION['cart']);
        }
        else
        {
        	unset($_SESSION['cart'][$id]);
        }
    }

}
