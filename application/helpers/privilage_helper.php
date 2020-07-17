<?php

function is_logged_in()
{
  $get = get_instance();
  if (!$get->session->userdata('username')) {
    redirect('auth');
  } else {
    $role_id = $get->session->userdata('role_id');
    $menu = $get->uri->segment(1);
    if ($menu == 'admin' and $role_id != 1) {
      redirect('auth/block');
    } elseif ($menu == 'kaur' and $role_id != 2) {
      redirect('auth/block');
    } elseif ($menu == 'users') {
      if ($role_id == 3 or $role_id == 4) {
      } else {
        redirect('auth/block');
      }
    }
  }
}
