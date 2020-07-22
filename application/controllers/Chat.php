<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {

 	public function __construct()
    {
		parent::__construct();
		$this->load->model(['chat_model','user_model']);
		$this->load->helper('string');
	}
	
	public function index()
	{
		// $data['strTitle']='';
		// $data['strsubTitle']='';
		// $data['strsubTitle2']='';
		// $data['chatTitle']='';
		// $list=[];
        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4')
        {
			$list = $this->user_model->AdminList();
			$data['strTitle']='Admin';
			$data['strsubTitle']='Admin';
			$data['chatTitle']='Pilih Admin yang ingin anda hubungi';

			$userslist=[];
			foreach($list as $u){
				$userslist[]=
				[
					'id' => $u['id'],
					'name' => $u['name'],
					'images' => $this->user_model->Images($u['id']),
					'status' => $u['status'],
				];
			}
			$data['userslist']=$userslist;
			// $this->parser->parse('chat/chatTemplate',$data);
			$this->load->view('templates/dashboard/headerDosenMhs');
			// $this->load->view('templates/dashboard/helpdesk/headerDosenMhsHelpdesk');
			// $this->load->view('chat/chatTemplate',$data); 
			$this->load->view('chat/chat',$data); 
			$this->load->view('templates/dashboard/sidebarDosenMhs');
			$this->load->view('templates/dashboard/footer');
		}
        else if ($this->session->userdata('role_id') == '2')
        {
			$list = $this->user_model->AdminList();
			$data['strTitle']='Semua Admin';
			$data['strsubTitle']='Admin';
			$data['chatTitle']='Pilih Admin yang ingin anda hubungi';

			$userslist=[];
			foreach($list as $u){
				$userslist[]=
				[
					'id' => $u['id'],
					'name' => $u['name'],
					'images' => $this->user_model->ImagesById($u['id']),
					'status' => $u['status'],
				];
			}
			$data['userslist']=$userslist;
			// $this->parser->parse('chat/chatTemplate',$data);
			$this->load->view('templates/dashboard/headerKaur');
			// $this->load->view('templates/dashboard/helpdesk/headerKaurHelpdesk');
			$this->load->view('templates/dashboard/sidebarKaur');
			// $this->load->view('chat/chatTemplate',$data); 
			$this->load->view('chat/chat',$data); 
			$this->load->view('templates/dashboard/footer'); 
        }
        else if ($this->session->userdata('role_id') == '1')
        {
			$list = array_merge($this->user_model->KaurList(), $this->user_model->DosenMhsList());
			$data['strTitle']='Dosen dan Mahasiswa';
			$data['strsubTitle']='Dosen dan Mahasiswa';
			$data['strsubTitle2']='Kepala Urusan';
			$data['chatTitle']='Pilih Kaur, Dosen, atau Mahasiswa yang ingin dihubungi';

			$userslist=[];
			foreach($list as $u){
				$userslist[]=
				[
					'id' => $u['id'],
					'name' => $u['name'],
					'images' => $this->user_model->ImagesById($u['id']),
					'status' => $u['status'],
				];
			}
			$data['userslist']=$userslist;
			// $this->parser->parse('chat/chatTemplate',$data);
			$this->load->view('templates/dashboard/headerAdmin');
			// $this->load->view('templates/dashboard/helpdesk/headerAdminHelpdesk');
			$this->load->view('templates/dashboard/sidebarAdmin');
			// $this->load->view('chat/chatTemplate',$data); 
			$this->load->view('chat/chat',$data); 
			$this->load->view('templates/dashboard/footer'); 
		}
	}
	
	// public function login_as_admin()
	// {
	// 	$data['title']='';
	// 	$data['strTitle']='';
	// 	$data['strsubTitle']='';
	// 	$list=[];
	// 	$list = $this->user_model->DosenMhsList();
	// 	$data['title']='Laboratorium FIK';
	// 	$data['strTitle']='Terhubung ke Dosen dan Mahasiswa';
	// 	$data['strsubTitle']='Dosen dan Mahasiswa';
	// 	$data['chatTitle']='Pilih Dosen atau Mahasiswa yang ingin dihubungi';
	// 	$userslist=[];
	// 	foreach($list as $u){
	// 		$userslist[]=
	// 		[
	// 			'id' => $u['id'],
	// 			'name' => $u['name'],
	// 			// 'picture_url' => $this->user_model->PictureUrlById($u['id']),
	// 			'status' => $u['status'],
	// 		];
	// 	}
	// 	$data['userslist']=$userslist;
    //     // $this->parser->parse('chat/chatTemplate',$data);
	// 	$this->load->view('templates/dashboard/headerAdmin');
	// 	$this->load->view('templates/dashboard/sidebarAdmin');
	// 	// $this->load->view('chat/chatTemplate',$data); 
	// 	$this->load->view('chat/chat',$data); 
	// 	$this->load->view('templates/dashboard/footer');
	// }

	// public function login_as_kaur()
	// {
	// 	$data['title']='';
	// 	$data['strTitle']='';
	// 	$data['strsubTitle']='';
	// 	$list=[];
	// 	$list = $this->user_model->DosenMhsList();
	// 	$data['title']='Laboratorium FIK';
	// 	$data['strTitle']='Terhubung ke Dosen dan Mahasiswa';
	// 	$data['strsubTitle']='Dosen dan Mahasiswa';
	// 	$data['chatTitle']='Pilih Dosen atau Mahasiswa yang ingin dihubungi';
	// 	$userslist=[];
	// 	foreach($list as $u){
	// 		$userslist[]=
	// 		[
	// 			'id' => $u['id'],
	// 			'name' => $u['name'],
	// 			// 'picture_url' => $this->user_model->PictureUrlById($u['id']),
	// 			'status' => $u['status'],
	// 		];
	// 	}
	// 	$data['userslist']=$userslist;
    //     // $this->parser->parse('chat/chatTemplate',$data);
    //     $this->load->view('templates/dashboard/headerKaur');
	// 	// $this->load->view('chat/chatTemplate',$data); 
	// 	$this->load->view('chat/chat',$data); 
	// 	$this->load->view('templates/dashboard/sidebarKaur');
	// 	$this->load->view('templates/dashboard/footer');
	// }

	// public function login_as_dosenMhs()
	// {
	// 	$data['title']='';
	// 	$data['strTitle']='';
	// 	$data['strsubTitle']='';
	// 	$list=[];
	// 	$list = $this->user_model->AdminList();
	// 	$data['title']='Laboratorium FIK';
	// 	$data['strTitle']='Semua Admin';
	// 	$data['strsubTitle']='Admin';
	// 	$data['chatTitle']='Pilih Admin yang ingin anda hubungi';
	// 	$userslist=[];
	// 	foreach($list as $u){
	// 		$userslist[]=
	// 		[
	// 			'id' => $u['id'],
	// 			'name' => $u['name'],
	// 			// 'picture_url' => $this->user_model->PictureUrlById($u['id']),
	// 			'status' => $u['status'],
	// 		];
	// 	}
	// 	$data['userslist']=$userslist;
	// 	// $this->parser->parse('chat/chatTemplate',$data);
	// 	$this->load->view('templates/dashboard/headerDosenMhs');
	// 	// $this->load->view('chat/chatTemplate',$data); 
	// 	$this->load->view('chat/chat',$data); 
	// 	$this->load->view('templates/dashboard/sidebarDosenMhs');
	// 	$this->load->view('templates/dashboard/footer');
	// }
	
    public function send_text_message()
    {
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
		 	$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];
			 
		}else{
			$messageTxt = reduce_multiples($post['messageTxt'],' ');
		}	
		 
		$data=[
			'sender_id' => $this->session->userdata('id'),
			// 'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),
			'receiver_id' => $this->input->post('receiver_id'),
			'message' =>   $messageTxt,
			'attachment_name' => $attachment_name,
			'file_ext' => $file_ext,
			'mime_type' => $mime_type,
			'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
			'ip_address' => $this->input->ip_address(),
		];
	
		// $query = $this->chat_model->SendTxtMessage($this->OuthModel->xss_clean($data)); 
		$query = $this->chat_model->SendTxtMessage($data);
		$response='';
		if($query == true){
			$response = ['status' => 1 ,'message' => '' ];
		}else{
			$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
		}
			
		echo json_encode($response);
    }
    
	public function ChatAttachmentUpload(){
		
		$file_data='';
		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
			$config['upload_path']          = './uploads/attachment';
			$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
			//$config['max_size']             = 500;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('attachmentfile'))
			{
				echo json_encode(['status' => 0,
				'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
			}
			else
			{
				$file_data = $this->upload->data();
				//$filePath = $file_data['file_name'];
				return $file_data;
			}
		}
 		 
	}
	
	public function get_chat_history_by_vendor(){
		// $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		// $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		$receiver_id = $this->input->get('receiver_id');
		
		$Logged_sender_id = $this->session->userdata('id');
		 
		$history = $this->chat_model->GetReciverChatHistory($receiver_id);
		//print_r($history);
		foreach($history as $chat):
			
			// $message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
			$message_id = $chat['id'];
			$sender_id = $chat['sender_id'];
			$userName = $this->user_model->GetName($chat['sender_id']);
			$userPic = $this->user_model->Images($chat['sender_id']);
			
			$message = $chat['message'];
			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
			
?>
<?php
			$messageBody='';
			if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
				$classBtn = 'right';
				if($Logged_sender_id==$sender_id){
					$classBtn = 'left';
				}
				
				$attachment_name = $chat['attachment_name'];
				$file_ext = $chat['file_ext'];
				$mime_type = explode('/',$chat['mime_type']);
				
				$document_url = base_url('uploads/attachment/'.$attachment_name);
				
				if($mime_type[0]=='image'){
				$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
				}else{
				$messageBody='';
					$messageBody.='<div class="attachment">';
						$messageBody.='<h4>Attachments:</h4>';
						$messageBody.='<p class="filename">';
						$messageBody.= $attachment_name;
						$messageBody.='</p>';
	
						$messageBody.='<div class="pull-'.$classBtn.'">';
						$messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
						$messageBody.='</div>';
					$messageBody.='</div>';
				}

			}else{
				$messageBody = $message;
			}
?>
<?php 		if($Logged_sender_id!=$sender_id){		?>     
				<!-- Message. Default to the left -->
				<div class="direct-chat-msg">
					<div class="direct-chat-info clearfix">
					<span class="direct-chat-name pull-left"><?=$userName;?></span>
					<span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
					</div>
					<!-- /.direct-chat-info -->
					<img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
					<!-- /.direct-chat-img -->
					<div class="direct-chat-text">
						<?=$messageBody;?>
					</div>
					<!-- /.direct-chat-text -->
					
				</div>
				<!-- /.direct-chat-msg -->
<?php 		}else{		?>
				<!-- Message to the right -->
				<div class="direct-chat-msg right">
					<div class="direct-chat-info clearfix">
					<span class="direct-chat-name pull-right"><?=$userName;?></span>
					<span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
					</div>
					<!-- /.direct-chat-info -->
					<img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
					<!-- /.direct-chat-img -->
					<div class="direct-chat-text">
					<?=$messageBody;?>
						<!--<div class="spiner">
							<i class="fa fa-circle-o-notch fa-spin"></i>
						</div>-->
					</div>
					<!-- /.direct-chat-text -->
				</div>
				<!-- /.direct-chat-msg -->
			<?php }?>
	
	<?php
	endforeach;
	}
	
	public function chat_clear_client_cs(){
        // $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
        $receiver_id = $this->input->get('receiver_id');
		$messagelist = $this->chat_model->GetReciverMessageList($receiver_id);
		foreach($messagelist as $row){
			
			if($row['message']=='NULL'){
				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
			}
 		}
		$this->chat_model->TrashById($receiver_id); 
	}
	
}