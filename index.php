<?PHP
include('functions.php');
$object = new Functions;

// Here I set if user clicked a link and we get the variable declared inside

if(isset($_GET['like'])) {

  // getting user_id for post owner
  $stmt= $object->saveLikeForPost($_SESSION['user_id'], $_GET['like']);
  // if you wish you can add redirect here!
  }


  if(isset($_GET['dislike'])) {

  // getting user_id for post owner
  $stmt= $object->likeSomePost($_SESSION['user_id'], $_GET['like']);
  echo "<script>window.location='page/?dislike'</script>";
  }
//Gad Iradufasha @2020
?>
