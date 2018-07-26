<?Php 

class Wlist {
    private $db;
    public function __construct(){
        $this->db = new Database;
        
    }

    public function getLists(){
        $this->db->query("SELECT * FROM lists");
        $result = $this->db->resultset();
        return $result;
    }

    public function showList($id){
        $this->db->query("SELECT *,
                        items.id as itemId
                        FROM items 
                        INNER JOIN lists
                        ON items.list_id = lists.id
                        WHERE items.list_id ='$id'");
        $result = $this->db->resultset();
        return $result;

    }

    public function addList($data){
         $this->db->query('INSERT INTO lists (list_name,list_desc,author_id,author_name) VALUES (:list_name,:list_desc,:author_id,:author_name)');
         $this->db->bind(':list_name', $data['list_name']);
         $this->db->bind(':list_desc', $data['list_desc']);
         $this->db->bind(':author_id', $data['author_id']);
         $this->db->bind(':author_name', $data['author_name']);

         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
    }

    public function getMyLists($author_id){
        $this->db->query("SELECT * FROM lists WHERE lists.author_id ='$author_id'");
        $result = $this->db->resultset();
        return $result;
    }

    public function deleteList($id){
        $this->db->query('DELETE FROM lists WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function deleteItem($id){
        $this->db->query('DELETE FROM items WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function addItem($data){
        $this->db->query('INSERT INTO items (item,list_id) VALUES (:item,:list_id)');
        $this->db->bind(':item', $data['item']);
        $this->db->bind(':list_id', $data['list_id']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
   }

   public function checkItem($id){
       $this->db->query("SELECT items.flag FROM items WHERE items.id='$id'");
       $row = $this->db->single();
       if($row->flag){
        $this->db->query("UPDATE items SET flag=0 WHERE id='$id'");
        if($this->db->execute()){
            return true;
        } else {
            return false;
        } 
    } else {
        $this->db->query("UPDATE items SET flag=1 WHERE id='$id'");
        if($this->db->execute()){
            return true;
        } else {
            return false;
        } 
    }
   }

  
}
