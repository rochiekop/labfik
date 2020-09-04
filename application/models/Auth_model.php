<?php
class Auth_model extends CI_Model
{
  public function register()
  {

    $salt = $this->salt();

    $password = $this->makePassword($this->input->post('password'), $salt);

    $data = array(
      'id' => uniqid(),
      'username' => $this->input->post('username', true),
      'name' => $this->input->post('fullname', true),
      'email' => $this->input->post('email', true),
      'images' => 'default.jpg',
      'password' => $password,
      'salt' => $salt,
      'role_id' => $this->input->post('role', true),
      'is_active' => 0,
      'date_created' => time()

    );

    $this->db->insert('user', $data);
  }

  public function user_token($token)
  {
    $user_token = [
      'id' => uniqid(),
      'email' => $this->input->post('email'),
      'token' => $token,
      'date_created' => time()
    ];
    $this->db->insert('user_token', $user_token);
  }

  public function salt()
  {
    return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
  }

  public function makePassword($password = null, $salt = null)
  {
    if ($password && $salt) {
      return hash('sha256', $password . $salt);
    }
  }

  public function changePass($email)
  {
    $salt = $this->salt();
    $password = $this->makePassword($this->input->post('password1'), $salt);
    $this->db->set('password', $password);
    $this->db->set('salt', $salt);
    $this->db->where('email', $email);
    $this->db->update('user');
  }

  // LOGIN
  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->fetchDataByUsername($username);

    if ($user) {
      $password = $this->makePassword($password, $user['salt']);

      // $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
      // $query = $this->db->query($sql, array($username, $password));
      // $result = $query->row_array();

      // return ($query->num_rows() == 1) ? $result : false;

      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $query = $this->db->get();
      $result = $query->row_array();
      return $result;
      
      // return ($result == 1) ? $result : false;
    } // /if
    else {
      return false;
    } // /else
  }

  public function fetchDataByUsername($username = null)
  {
    if ($username) {
      $sql = "SELECT salt FROM user WHERE username = ?";
      $query = $this->db->query($sql, array($username));
      $result = $query->row_array();

      return ($query->num_rows() == 1) ? $result : false;
      return $result;
    }
  }

  public function validate_email()
  {
    $email = $this->input->post('email');
    $sql = "SELECT * FROM user WHERE email = ?";
    $query = $this->db->query($sql, array($email));
    return ($query->num_rows() == 0) ? true : false;
  }
}
