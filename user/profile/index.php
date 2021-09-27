<?php require_once '../init.php';
// fetch user ....

$id = $_SESSION['user']['id'];

$sql = "SELECT users.*, user_detail.governorate, user_detail.city, user_detail.extra_data
        FROM users
        JOIN user_detail
        ON users.detail_id = user_detail.id 
        WHERE users.id =".$id;

$op = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($op);
echo mysqli_error($conn);
?>
    <div id="layoutSidenav_content">     
        <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                                            
            <?php 
                printMessages('Display users');
            ?>
        </ol>
            <div class="card mb-4  profile">
                
                <div class="card-body" >
                        <table width="100%" height="200">
                            <tr>
                                <td><h3>First Name:</h3></td>
                                <td><h3><?php echo $data['firstname']?></h3></td>
                                <td rowspan="<?php if (isset($data['detail_id'])) { echo '6';}else{echo '3';}?>">
                                    <a href='update.php?id=<?php echo $id;?>' class='btn btn-primary m-r-1em'>Update</a>
                                </td>

                            </tr>
                            <tr>
                                <td><h3>Last Name:</h3></td>
                                <td><h3><?php echo $data['lastname']?></h3></td>
                            </tr>
                            <tr>
                                <td><h3>Email:</h3></td>
                                <td><h3><?php echo $data['email']?></h3></td>
                            </tr>
                            <?php if (isset($data['detail_id'])) {?>
                                <tr>
                                    <td><h3>Governorate</h3></td>
                                    <td><h3><?php echo $data['governorate']?></h3></td>

                                </tr>
                                <tr>
                                    <td><h3>City:</h3></td>
                                    <td><h3><?php echo $data['city']?></h3></td>
                                </tr>
                                <tr>
                                    <td><h3>Extra Data:</h3></td>
                                    <td><h3><?php if (!empty($data['extra_data'])){echo $data['extra_data'];}else{echo '-';};?></h3></td>
                                </tr>
                            <?php }?>
                        </table>

                </div>
            </div>
        </div>
    </main>
            
    </div>
</div>
<?php require '../../helpers/footer.php'?>
