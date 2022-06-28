
<?php
include("..//conn.php");
include("adminheader.php");

$sql = "SELECT * FROM my_slider";
$result=$conn->query($sql);
$cnt;

if($result->num_rows > 0)
{
    $cnt=$result->num_rows;
}


if(isset($_GET["del_id"]))
{
  $id=$_GET["del_id"];
  $sql_q="DELETE from my_slider WHERE id = $id";
  $conn->query($sql_q);
}

?>


    <div class="container-fluid py-4">
    <h5 class="font-weight-bolder mb-0">Manage Slider</h5>
    
    <p class="mb-0 bg-gradient-primary shadow-primary border-radius-lg" >
      <a href="insert_slider.php" class="text-white text-capitalize ps-3">&nbsp;&nbsp;&nbsp;&nbsp;Add New Slider</a>
    </p><br><br>
      
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Slider table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Title</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($result->num_rows > 0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            ?>
                                <tr>
                                    <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><?php echo $row["id"];?></h6>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div>
                                        <img src="..//<?php echo $row["image_path"];?>" class="avatar avatar-lg me-2 border-radius-lg" alt="<?php echo $row["image_title"];?>">
                                        </div>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $row["image_title"];?></p>
                                    </td>
                                    <td class="align-middle">
                                    <a href="edit_slider.php?id=<?php echo $row["id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Slider">
                                        Edit 
                                    </a>
                                    |
                                    <a href="slider_tbl.php?del_id=<?php echo $row["id"];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Slider">
                                        Delete 
                                    </a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>   
<?php
include("adminfooter.php");
?>
