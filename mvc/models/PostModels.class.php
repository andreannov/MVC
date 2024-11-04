<?php class PostModel extends Model {

public function getAll() {
   $sql = 'SELECT * FROM post';

   return $this->mysqli->query($sql);
}

public function getById($id) {
   $sql = "SELECT * FROM post WHERE id = $id";

   return $this->mysqli->query($sql);
}

public function insert($title, $content) {
   $sql = "INSERT INTO post (title, content) VALUES ('$title', '$content')";

   $this->mysqli->query($sql);
}

public function edit() {
	$id = $_GET['id'];

      if (!$id) header('Location: index.php?c=Post');
	
      $postModel = $this->loadModel('PostModel');
      $post = $postModel->getById($id);
	
      if (!$post->num_rows) header('Location: index.php?c=Post');
	
      $this->loadView('edit', ['post' => $post->fetch_object()]);
   }

public function delete($id) {
   $sql = "DELETE FROM post WHERE id = $id";

   $this->mysqli->query($sql);
}
}
