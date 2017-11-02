<ul>
  <?php {
    include "db.php";
    $test = DB::Test();
    foreach($test as $name)
    echo "
        <li>
          <a href='profile.php?id=$name[idEmployees]'>
          $name[idEmployees] $name[first_name] $name[last_name] $name[position]
          </a>
        </li>
    ";
  }
  ?>
</ul>
