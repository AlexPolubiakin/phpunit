<?Php 
class User {
    protected $db;

    public function __construct(){
        $this->db = new Database;
    }   

    public function register($data){
        $this->db->query('INSERT INTO users (login,password) VALUES (:login, :password)');
        $this->db->bind(':login' , $data['login']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    } 

    public function checkLogin($login){
        $this->db->query("SELECT * FROM users WHERE login = :login");
        $this->db->bind(':login', $login);
        
        $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }


    public function login($login,$password){
        $this->db->query("SELECT * FROM users WHERE login =:login");
        $this->db->bind(":login", $login);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }
    
    public function getUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }


}


