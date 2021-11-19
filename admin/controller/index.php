<?php include_once '../model/db_config.php'; ?>

<?php
    $error1=$error2=$error3=$success="";
    $sub_cat_name=$sub_cat_code="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $sub_cat_name =trim($_POST['name']);
        $sub_cat_code =trim($_POST['code']);
        echo $sub_cat_name;
        if(empty($sub_cat_name) || empty($sub_cat_code)){
            if(empty($sub_cat_code) && empty($sub_cat_code)){
                echo "sadsad";
                $error1 = "Please fill up both forms";
            }
            else if (empty($sub_cat_name)){

                $error2 = "Please Insert Category Type Name";
                echo $error2;
            }
            else if (empty($sub_cat_code)){
                $error3 = "Please Insert Category Type Code";
            }

            
        }
        else{
            // echo "1";
            $sql = "INSERT INTO sub_categories (sub_cat_name, sub_cat_code) VALUES (?, ?)";
            
            $sql_statment = mysqli_prepare($link,$sql);
            if ($sql_statment){
                // print_r('ssssss');
                mysqli_stmt_bind_param($sql_statment, "ss", $var1,$var2);
                $var1=$sub_cat_name;
                $var2 = $sub_cat_code;
                echo $var1;
                $execute = mysqli_stmt_execute($sql_statment);
                // print_r($execute);
                if($execute){
                    $success = "Successfully Inserted";
                    //header("location: index.php");

                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
        
    }
        
?>
<!DOCTYPE html>
<html>

<?php include '../view/layout/header.php'; ?>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        
        <?php include '../view/layout/side_navbar.php'; ?>
        <!-- Page Content Holder -->
        <div id="content">
            <?php include '../view/layout/content.php'; ?>
            <div class="container mt-5">
    <div class="row">
        <div class="col-md-6 ">
            <div class="mb-3">
                <h3>Add Category Types</h3>
                <?php 
                    if(!empty($success)){
                        echo '<span style="color:green;">'.$success.'</span>';
                    }
                    else{
                        echo '<span style="color:red;">'.$error1.'</span>';
                    }
                ?>
                
            </div>
            <form class="shadow p-4">                  
               
                    <label for="sub_cat_name">Category Type Name</label>
                    <input value="<?php echo $sub_cat_name;?>" type="text" class="form-control" name="sub_cat_name"  id="sub_cat_name" placeholder="Category Type Name">
                    <?php 
                        if(!empty($error2)){

                            echo '<span style="color:red;">'.$error2.'</span>';
                        }
                    ?>
                   <!-- <span id= "error2" style="display:none;"></span>  -->
                   <span id="error2" style="display:none;"></span>

                <div class="mb-3">
                    <label for="sub_cat_code">Category Type Code</label>
                    <input value="<?php echo $sub_cat_code;?>" type="text" class="form-control" name="sub_cat_code" id="sub_cat_code" placeholder="Category Type Code">
                    <?php 
                        if(!empty($error3)){

                            // echo '<span style="color:red;">'.$error3.'</span>';
                        }
                    ?>
                    <!-- <span id= "error3" style="display:block;"color:red></span> -->
                    
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" onclick="Datainsert()">Add Category Types</button>
                </div>
                
            </form>
        </div>
     
<div class="col-md-6 " id= "show_table_div" style="display:none;">  
        <div class="mb-3">  
             <h3> SHOW DATA </h3>
        </div>

<table class="table">

            <thead>
                <tr>
                    <th scope="col">Cat_type_name</th>
                    <th scope="col">Cat_type_code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody id="show_data" >
                    
                </tbody>
            </table>
            </div>
            
        </div>
    </div>
</div>
            
            
        </div>
    </div>

    <?php include '../view/layout/js_lib.php'; ?>
</body>

</html>