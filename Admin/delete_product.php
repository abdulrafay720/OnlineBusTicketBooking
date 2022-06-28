
<?php
include("..//conn.php");
include("adminheader.php");

if(isset($_GET["del_id"]))
{
    $id = $_GET["del_id"];
    $hsql = "SELECT * FROM product_tbl where prdct_id ='$id'";
    $hresult=$conn->query($hsql);
}

if(isset($_POST["btn_y"]))
{
   $id = $_GET["del_id"];
   $sql="delete from product_tbl where prdct_id ='$id'";
   $conn->query($sql); 
}

?>

<div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Delete Product</h5>

<div class="row" style="min-height:400px">
    <div class="col-md-5">
        <form role="form" method="POST">
            <?php
                 if($hresult->num_rows > 0)
                 {
                     $row=$hresult->fetch_assoc();
                 }
            ?>

              <br>  
            <div class="timeline-content">    
                <h6 class="text-dark text-md font-weight-bold mb-0">Product Name</h6>
                <p class="text-secondary font-weight-bold text-sm mt-1 mb-0"><?php echo $row["prdct_name"];?></p>
            </div>
            <div class="timeline-content">    
                <h6 class="text-dark text-md font-weight-bold mb-0">Product Price</h6>
                <p class="text-secondary font-weight-bold text-sm mt-1 mb-0"><?php echo $row["prdct_price"];?></p>
            </div>
            <div class="timeline-content">    
                <h6 class="text-dark text-md font-weight-bold mb-0">Product Image</h6>
                <img src="..//<?php echo $row["prdct_img"];?>" alt="" style="width:100px;height:100px;" />
            </div>
            <div class="timeline-content">    
                <h6 class="text-dark text-md font-weight-bold mb-0">Product Category</h6>
                <p class="text-secondary font-weight-bold text-sm mt-1 mb-0">
                    <?php 
                        $cate_id=$row["cate_id"];
                        $csql = "SELECT * FROM category_tbl where cate_id ='$cate_id'";
                        $cresult=$conn->query($csql);
                        if($cresult->num_rows > 0)
                        {
                            $crow=$cresult->fetch_assoc();
                        }
                        echo $crow["cate_name"];
                    ?>
                </p>
            </div>


            <div class="timeline-content">    
                <h6 class="text-dark text-md font-weight-bold mb-0">Product Company</h6>
                <p class="text-secondary font-weight-bold text-sm mt-1 mb-0">
                    <?php 
                        $com_id=$row["com_id"];
                        $cosql = "SELECT * FROM company where com_id ='$com_id'";
                        $coresult=$conn->query($cosql);
                        if($coresult->num_rows > 0)
                        {
                            $corow=$coresult->fetch_assoc();
                        }
                        echo $corow["com_name"];
                    ?>
                </p>
            </div>

            <div>
                <label class="form-label">Do you want to delete this product ?</label>
                <br>
                <button type="submit" class="btn btn-sm bg-gradient-primary" name="btn_y">Yes</button>
                <a href="product_tbl.php" class="btn btn-sm bg-gradient-primary">No</a>
            </div>

           
        </form>
    </div>
</div>



<?php
include("adminfooter.php");
?>
