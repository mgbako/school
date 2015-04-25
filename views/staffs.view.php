
<div class="row">
<h1 class="align-Center">Staffs Record</h1>
  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Class</th>
        <th>Start Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($staffs as $row) :?>
      <tr>
        <td><?php echo $row['firstName'];?></td>
        <td><?php echo $row['lastName'];?></td>
        <td><?php echo $row['type'];?></td>
        <td><?php echo $row['startDate'];?></td>
        <td><a href="editStaff.php?id=<?php echo $row['id'];?>"><button class="button tiny info radius">Edit</button></a></td>
        <td><a href="deleteStaff.php?id=<?php echo $row['id'];?>"><button class="button tiny alert radius">X</button></a></td>
      </tr>
    </tbody>
  <?php endforeach ;?>
  </table>
</div>