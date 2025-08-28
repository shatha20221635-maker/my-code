<?php
$students = [
    ['stdNo'=>'20003','stdName'=>'Ahmed Ali','stdEmail'=>'ahmed@gmail.com','stdGAP'=>88.7],
    ['stdNo'=>'30304','stdName'=>'Mona Khalid','stdEmail'=>'mona@gmail.com','stdGAP'=>78.5],
    ['stdNo'=>'10002','stdName'=>'Bilal Hmaza','stdEmail'=>'bilal@gmail.com','stdGAP'=>98.7],
    ['stdNo'=>'10005','stdName'=>'Said Ali','stdEmail'=>'said@gmail.com','stdGAP'=>98.7],
    ['stdNo'=>'10007','stdName'=>'Mohammed Ahmed','stdEmail'=>'mohamed@gmail.com','stdGAP'=>98.7]
];
$totalStudents = count($students);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Students Table with Search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
    function searchTable() {
      let input = document.getElementById("searchInput").value.toLowerCase();
      let table = document.getElementById("studentsTable");
      let rows = table.getElementsByTagName("tr");

      for (let i = 1; i < rows.length; i++) { // تجاهل رأس الجدول
        let cells = rows[i].getElementsByTagName("td");
        let match = false;
        for (let j = 1; j < cells.length; j++) { // البحث من العمود 1 لتجاهل رقم الصف
          if (cells[j].innerText.toLowerCase().includes(input)) {
            match = true;
            break;
          }
        }
        rows[i].style.display = match ? "" : "none";
      }
    }
  </script>
</head>
<body class="p-5 bg-light">

<div class="container">
  <h3 class="mb-4 text-center fw-bold">Students Information</h3>

  <!-- حقل البحث -->
  <div class="mb-3">
    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control" placeholder="Search by name or student number">
  </div>

  <table class="table text-center align-middle" id="studentsTable">
    <thead class="table-dark text-white">
      <tr>
        <th>#</th>
        <th>Student No</th>
        <th>Name</th>
        <th>Email</th>
        <th>GPA</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $colors = ['table-primary','table-success','table-info','table-warning','table-danger']; // ألوان مختلفة لكل صف
      $i = 0;
      foreach($students as $student){
          $colorClass = $colors[$i % count($colors)]; // لتكرار الألوان إذا زاد عدد الطلاب
          echo "<tr class='$colorClass'>";
          echo "<td>".($i+1)."</td>";
          echo "<td>{$student['stdNo']}</td>";
          echo "<td>{$student['stdName']}</td>";
          echo "<td>{$student['stdEmail']}</td>";
          echo "<td>{$student['stdGAP']}</td>";
          echo "</tr>";
          $i++;
      }
      ?>
      <!-- صف العدد النهائي -->
      <tr class="table-light fw-bold">
        <td class="text-start" colspan="5">Number of Students: <?php echo $totalStudents; ?></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>












