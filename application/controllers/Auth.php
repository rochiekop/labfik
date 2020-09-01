<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('auth_model');
    $this->load->model('user_model');
    $this->load->model('kategori_model');
    // is_logged_in();
  }

  public function index()
  {
    if (!isset($_SESSION['id'])) {
      $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
      $this->load->view('auth/login', $data);
    } else {
      redirect('main');
    }
  }

  public function loadRegister()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $this->load->view('auth/register', $data);
  }

  public function register()
  {
    $data = array('success' => false, 'messages' => array());

    $validate_data = array(
      array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required|trim|is_unique[user.username]|min_length[5]' #user is table #add unique validation
      ),
      array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|min_length[6]|trim'
      ),
      array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|callback_validate_email'
      )
    );

    $this->form_validation->set_rules($validate_data);
    // Set error text
    $this->form_validation->set_message('is_unique', 'Username ' . $this->input->post('username') . ' already exists');
    $this->form_validation->set_message('valid_email', 'The {field} is not valid');
    $this->form_validation->set_message('min_length', 'The {field} is to short min.6');
    $this->form_validation->set_error_delimiters('<p class="text-danger" style="text-align:left;margin-left:35px;color:#FB8C00;font-size:12px">', '</p>');

    if ($this->form_validation->run() === true) {

      // Insert
      $this->auth_model->register();
      // Token
      if ($this->input->post('role') == '4') {
        $token = base64_encode(random_bytes(32));
        $this->auth_model->user_token($token);
        $this->_sendEmail($token, 'verify');
      }
      $data['success'] = true;
      $data['messages'] = "Register Success";
    } else {
      foreach ($_POST as $key => $value) {
        $data['messages'][$key] = form_error($key);
      }
    }
    echo json_encode($data);
  }


  public function validate_email()
  {
    $email = $this->auth_model->validate_email();

    if ($email == true) {
      return true;
    } else {
      $this->form_validation->set_message('validate_email', 'The {field} already registered');
      return false;
    }
  }


  private function _sendEmail($token, $type)
  {
    $config = array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'studiolabfik@gmail.com',
      'smtp_pass' => '$@fikLABTel-u#20',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    );

    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('studiolabfik@gmail.com', 'LABFIK TELKOM UNIVERSITY');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('ACCOUNT VERIFICATION FIKLAB TEL-U');
      $this->email->message('To activate your account click this link: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
    } elseif ($type == 'forgot') {
      $this->email->subject('RESET PASSWORD LABFIK TEL-U');
      $this->email->message('To reset your password click this link: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }
    if ($this->email->send()) {
      true;
    } else {
      echo $this->print->print_debugger();
      die;
    };
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user =  $this->db->get_where('user', ['email' => $email])->row_array();
    if ($this->session->userdata('id')) {
      redirect('main');
    }
    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');
          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-success role="alert" style="margin-top:24px;">Account success activate <br>Please Login.</div>');
          $this->load->view('auth/login');
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Token Expired.</div>');
          $this->load->view('auth/login');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Activate failed! Token is invalid.</div>');
        $this->load->view('auth/login');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Activate failed! wrong email</div>');
      $this->load->view('auth/login');
    }
  }

  public function login()
  {
    $data = array('success' => false, 'messages' => array());

    $validate_data = array(
      array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required'            #callback_username_exists #if db is fill at least 1 value
      ),
      array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim'
      )
    );

    $this->form_validation->set_rules($validate_data);
    // $this->form_validation->set_message('callback_username_exists', 'The {field} is not Exist');
    $this->form_validation->set_error_delimiters('<p class="text-danger" style="text-align:left;margin-left:0px;color:#FB8C00;font-size:12px">', '</p>');

    if ($this->form_validation->run() === true) {

      $login = $this->auth_model->login();
      if ($login) {
        if ($login['is_active'] == 1) {
          // Create Session
          $newdata = array(
            'id' => $login['id'],
            'username' => $login['username'],
            'email' => $login['email'],
            'name' => $login['name'],
            'nim'  => $login['nim'],
            'role_id' => $login['role_id'],
            'koordinator' => $login['koordinator'],
            'dosen_wali' => $login['dosen_wali'],
            'logged_in' => TRUE
          );

          $this->session->set_userdata($newdata);
          $data['success'] = true;
          $data['messages'] = "Login Success";
        } else {
          $data['success'] = false;
          $data['messages'] = 'Account has not been Activated!';
        }
      } else {
        $data['success'] = false;
        $data['messages'] = 'Incorrect username / password';
      }
    } else {
      foreach ($_POST as $key => $value) {
        $data['messages'][$key] = form_error($key);
      }
    }
    echo json_encode($data);
    $this->user_model->ChangeStatusOnline($this->session->userdata('id'));
  }

  public function loginActivate()
  {
    $user =  $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array();
    if ($user['is_active'] == 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top:24px;">Register success, please check your email to activate account.</div>');
      $this->load->view('auth/login');
    } elseif (!$user) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">"You dont have account
			please register."</div>');
      $this->load->view('auth/login');
    }
  }

  public function sendtoken()
  {
    $user = $this->db->get_where('user', ['id' => $this->input->post('id')])->row_array();
    if ($user) {
      $token = base64_encode(random_bytes(32));
      $this->auth_model->user_token($token);
      $this->_sendEmail($token, 'verify');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top:24px;">Token berhasil dikirimkan.</div>');
      redirect('admin/activationrequest');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Akun belum terdaftar dalam sistem</div>');
      redirect('admin/activationrequest');
    }
  }

  public function check()
  {
    $set = $this->session->userdata('role_id');
    if ($set == 1) {
      redirect('admin');
    } elseif ($set == 2) {
      redirect('kaur');
    } elseif ($set == 3) {
      redirect('users/main');
    } elseif ($set == 4) {
      redirect('users/main');
    } elseif ($set == 5) {
      redirect('adminlaa');
    } elseif ($set = 5) {
      redirect('koordinator_ta');
    } else {
      redirect('auth');
    }
  }

  // public function helpdeskRedirect()
  // {
  // $set = $this->session->userdata('role_id');
  // if ($set == 1) {
  //   // redirect('admin');
  //   redirect('chat/login_as_admin');
  // } elseif ($set == 2) {
  //   // redirect('kaur');
  //   redirect('chat/login_as_kaur');
  // } elseif ($set == 3 or $set == 4) {
  //   // redirect('users/helpdesk');
  //   redirect('chat/login_as_dosenMhs');
  // } else {
  //   redirect('auth');
  // }
  //   redirect('chat');
  // }


  public function block()
  {
    echo "<h1>Access Block</h1>";
    var_dump($this->session->userdata('role_id'));
  }
  public function notfound()
  {
    echo "<h1>Page 404</h1>";
  }

  public function forgotpassword()
  {
    $data['title'] = 'LABFIK | Forgot Password';
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/forgotPassword', $data);
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email])->row_array();
      if ($user) {
        if ($user['is_active'] != 1) {
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Email is not activated!</div>');
          redirect('auth/forgotPassword');
        } else {
          $token = base64_encode(random_bytes(32));
          $this->auth_model->user_token($token);
          $this->_sendEmail($token, 'forgot');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top:24px;">Please check your email to reset your password.</div>');
          redirect('auth/forgotPassword');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Email is not registered!</div>');
        redirect('auth/forgotPassword');
      }
    }
  }

  public function resetpassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 60 * 1)) { #Batas Maksimal Aktivasi 1 jam jika lebih maka akan ke hapus tokennya
          $this->session->set_userdata('reset_password', $email);
          $this->changePassword();
        } else {
          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Reset Password Expired.</div>');
          $this->load->view('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Reset password failed! Wrong token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Reset password failed! Wrong email.</div>');
      redirect('auth');
    }
  }

  public function changePassword()
  {
    if (!$this->session->userdata('reset_password')) {
      redirect('auth');
    }
    $data['title'] = 'LABFIK | Change Password';

    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
      'min_length' => 'Password must be at least 6 characters'
    ]);
    $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]|matches[password1]', [
      'min_length' => 'Repeat Password must be at least 6 characters', 'matches' => 'Repeat password not matches'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/changePassword', $data);
    } else {
      $email = $this->session->userdata('reset_password');
      $this->auth_model->changepass($email);
      $this->db->delete('user_token', ['email' => $email]);
      $this->session->unset_userdata('reset_password');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top:24px;">Password has been change! Please Login.</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    // $this->session->sess_destroy();
    if (!isset($_SESSION['id'])) {
      redirect('main');
    } else {
      $this->user_model->ChangeStatusOffline($this->session->userdata('id'));

      $this->session->unset_userdata('id');
      $this->session->unset_userdata('name');
      $this->session->unset_userdata('role_id');
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('logged_in');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top:24px;">Your account has been logout.</div>');
      redirect('auth');
    }
  }

  public function editprofilemhs()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $dosen = $this->user_model->getDosenWali();
    $prodi = $this->kategori_model->listing_kat();

    $data = array(
      'title' => 'Edit Profile',
      'user'  => $user,
      'dosen'  => $dosen,
      'prodi' => $prodi,
    );
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'required|trim|integer', [
      'integer' => '%s harus diisi dengan angka!'
    ]);
    $this->form_validation->set_rules(
      'nim',
      'Nim',
      'required|min_length[10]',
      array(
        'required'      =>  '%s harus diisi',
        'min_length[10]' =>  '%s angka yang diisi kurang',
      )
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/editmhs', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $name = $this->input->post('name');
      $prodi = $this->input->post('prodi');
      $nim = $this->input->post('nim');
      $email = $this->input->post('email');
      $nohp = $this->input->post('nohp');
      $dosenwali = $this->input->post('dosenwali');
      $alamat = $this->input->post('alamat');

      $upload_image = $_FILES['images']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
          $old_image = $data['user']['images'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('images', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->db->set('name', $name);
      $this->db->set('no_telp', $nohp);
      $this->db->set('nim', $nim);
      $this->db->set('prodi', $prodi);
      $this->db->set('dosen_wali', $dosenwali);
      $this->db->set('alamat', $alamat);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->db->set('dosen_wali', '1');
      $this->db->where('id', $dosenwali);
      $this->db->update('user');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile ' . $user['name'] . ' berasil diubah</div>');
      redirect('auth/editprofilemhs');
    }
  }

  public function editprofiledsn()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $prodi = $this->kategori_model->listing_kat();
    $data = array(
      'title' => 'Edit Profile',
      'user'  => $user,
      'prodi' => $prodi
    );
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules(
      'nip',
      'Nip',
      'required|min_length[10]',
      array(
        'required'      =>  '%s harus diisi',
        'min_length[10]' =>  '%s angka yang diisi kurang'
      )
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/editdsn', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $name = $this->input->post('name');
      $prodi = $this->input->post('prodi');
      $nip = $this->input->post('nip');
      $email = $this->input->post('email');
      $alamat = $this->input->post('alamat');
      $nohp = $this->input->post('nohp');
      $kodedosen = $this->input->post('kode_dosen');

      $upload_image = $_FILES['images']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
          $old_image = $data['user']['images'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('images', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->db->set('name', $name);
      $this->db->set('nip', $nip);
      $this->db->set('alamat', $alamat);
      $this->db->set('prodi', $prodi);
      $this->db->set('no_telp', $nohp);
      $this->db->set('kode_dosen', $kodedosen);
      $this->db->where('email', $email);
      $this->db->update('user');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile ' . $user['name'] . ' berasil diubah</div>');
      redirect('auth/editprofiledsn');
    }
  }

  public function editprofilekaur()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = array(
      'title' => 'Edit Profile',
      'user'  => $user
    );
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules(
      'nim',
      'Nim',
      'required|min_length[10]',
      array(
        'required'      =>  '%s harus diisi',
        'min_length[10]' =>  '%s angka yang diisi kurang'
      )
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerKaur', $data);
      $this->load->view('templates/dashboard/sidebarKaur', $data);
      $this->load->view('dashboard/kaur/editprofile', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      $upload_image = $_FILES['images']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
          $old_image = $data['user']['images'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('images', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');
      redirect('users/main');
    }
  }

  public function editprofileadmin()
  {
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = array(
      'title' => 'Edit Profile',
      'user'  => $user
    );
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules(
      'nim',
      'Nim',
      'required|min_length[10]',
      array(
        'required'      =>  '%s harus diisi',
        'min_length[10]' =>  '%s angka yang diisi kurang'
      )
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/kaur/editprofile', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      $upload_image = $_FILES['images']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
          $old_image = $data['user']['images'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('images', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');
      redirect('users/main');
    }
  }
}
