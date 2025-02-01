<!DOCTYPE html>
<html lang="en">
<head>
<?php
 include("conn.php")
?>
<!-- เพิ่มส่วน ใช้งาน Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ส่วนของ DataTable -->
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- เพิ่มส่วน ใช้งาน Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:ital,wght@0,200;0,300;1,100;1,200&family=Prompt:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">

<!-- เพิ่ม CSS ให้ใช้ Font  -->
<style>
    body{
        font-family: 'Kanit', sans-serif;
        margin-top : 100px;
        margin-bottom : 150px;
        margin-right : 100px;
        margin-left : 200px;
    }
</style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลนักฟุตบอล</title>
</head>
<body>
<?php
        if(isset($_GET['action_even'])=='del'){
        //echo "Test";

        $PlayerID = $_GET['employee_id'];
        $sql="SELECT * FROM footballplayers WHERE PlayerID=$PlayerID";
        // echo $sql;
        $result = $conn->query($sql);
        // $lvsql =mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
            // sql to delete a record
            $sql="DELETE FROM footballplayers WHERE PlayerID=$PlayerID";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";  
            } else {
                echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุราตรวจสอบ !!! </div>" . $conn->error;
            }
            // $conn->close();
        } else {
            echo 'ไม่พบข้อมูล กรุณาตรวจสอบ';
            
            
        }
    }
    ?>
    <h1>ตารางแสดงข้อมูลนักฟุตบอล</h1>
    <table id="employees" class="table table-striped" style="width:100%">
    <h4> พัฒนาโดย 653485003 นายณัฐกุล จิระศิริโชติ หมู่เรียน 26.16 </h4>
        <thead>
            <tr>
                <th>รหัสผู้เล่น</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อายุ</th>
                <th>ตำแหน่ง</th>
                <th>สัญชาติ</th>
                <th>สโมสร</th>
                <th>ทำประตู</th>
                <th>ช่วยทำประตู</th>
                <th>หมายเลขเสื้อ</th>
                
            </tr>
        </thead>
</tbody>        
<?php
$sql = "SELECT * FROM footballplayers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " <tr>";
    echo "<td>". $row["PlayerID"]. "</td>" ;
    echo "<td>". $row["FullName"]."</td>" ;
    echo "<td>". $row["Age"] ."</td>" ;
    echo "<td>". $row["Position"] ."</td>" ;
    echo "<td>". $row["Nationality"] ."</td>" ;
    echo "<td>". $row["Club"] ."</td>" ;
    echo "<td>". $row["GoalsScored"] ."</td>" ;
    echo "<td>". $row["Assists"] ."</td>" ;
    echo "<td>". $row["JerseyNumber"] ."</td>" ;
    echo '<td> <a type="button" href="show.php?action_even=del&PlayerID=' . $row['PlayerID'] . '" title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['PlayerID'] . ' ' . $row['FullName'] . ' ' . $row['Age'] .'?\')" class="btn btn-danger btn-sm"> ลบข้อมูล </a>  
                    
                    <a type="button" href="edit.php?action_even=edit&id=' . $row['PlayerID'] . '" 
                title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['PlayerID'] . ' ' . $row['FullName'] . ' ' . $row['Age'] . '?\')" class="btn btn-primary btn-sm"> แก้ไขข้อมูล </a> </td>';
    echo "</tr>";
  }

} else {
  echo "0 results";
}
$conn->close();
?>
        </tbody>

        <tfoot>
            <tr>
                <th>PlayerID</th>
                <th>Fullname</th>
                <th>Age</th>
                <th>Position</th>
                <th>Nationality</th>
                <th>Club</th>
                <th>GoalsScored</th>
                <th>Assists</th>
                <th>JerseyNumber</th>
            </tr>
        </tfoot>
    </table>
</body>

<!-- Latest compiled JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#footballplayers');
</script>
</html>