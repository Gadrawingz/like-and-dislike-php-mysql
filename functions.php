public function likeAnyPost($user_id, $post_id) {

    // Against like duplication
    if($this->connect->query("SELECT COUNT(*) FROM rating WHERE user_id='$user_id' AND post_id= '$post_id' AND rat_action='like'")->fetchColumn() !='1') {

    $sql="INSERT INTO rating (user_id, post_id,  date) 
    VALUES ($user_id, $post_id, 'like', NOW()) ON DUPLICATE KEY UPDATE action='like'";

    $query = $this->connect->prepare($sql);
    $query->execute();
    $count = $query->rowCount();
    return $count;
    }else {
      return false;
    } 
  }

// You can do unlike if you wish too
  public function doUnlikePost($user_id, $post_id) {
    $sql="DELETE FROM rating WHERE user_id=$user_id AND post_id=$post_id";
    $query = $this->connect->prepare($sql);
    $query->execute();
    $count = $query->rowCount();
    echo $count;
} 
