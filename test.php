<ul>
  <?php {
    include "db.php";
    $test = DB::Test();
    foreach($test as $name)
    echo "
        <li>
          <a href='profile.php?id=$name[idtest]'>
          $name[idtest] $name[name]
          </a>
        </li>
    ";
  }
  ?>
</ul>
