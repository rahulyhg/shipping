<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
//            $category=$this->input->post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
       
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('templatewith2',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewlicense()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewlicense";
        $data["base_url"]=site_url("site/viewlicensejson");
        $data["title"]="View license";
        $this->load->view("template",$data);
    }
    function viewlicensejson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`shipping_license`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`shipping_license`.`number`";
        $elements[1]->sort="1";
        $elements[1]->header="License Number";
        $elements[1]->alias="number";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`shipping_license`.`company`";
        $elements[2]->sort="1";
        $elements[2]->header="Company";
        $elements[2]->alias="company";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`shipping_license`.`issuedate`";
        $elements[3]->sort="1";
        $elements[3]->header="Issue Date";
        $elements[3]->alias="issuedate";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`shipping_license`.`expirydate`";
        $elements[4]->sort="1";
        $elements[4]->header="Expiry Date";
        $elements[4]->alias="expirydate";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`shipping_license`.`extention`";
        $elements[5]->sort="1";
        $elements[5]->header="Extention";
        $elements[5]->alias="extention";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`shipping_license`.`status`";
        $elements[6]->sort="1";
        $elements[6]->header="Status";
        $elements[6]->alias="status";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_license`");
        $this->load->view("json",$data);
    }

    public function createlicense()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["status"]=$this->company_model->getstatusdropdown();
        $data["company"]=$this->company_model->getcompanydropdown();
        $data["page"]="createlicense";
        $data["title"]="Create license";
        $this->load->view("template",$data);
    }
    public function createlicensesubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("number","License Number","trim");
        $this->form_validation->set_rules("company","Company","trim");
        $this->form_validation->set_rules("issuedate","Issue Date","trim");
        $this->form_validation->set_rules("expirydate","Expiry Date","trim");
        $this->form_validation->set_rules("extention","Extention","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createlicense";
            $data["title"]="Create license";
            $this->load->view("template",$data);
        }
        else
        {
            $number=$this->input->get_post("number");
            $company=$this->input->get_post("company");
            $issuedate=$this->input->get_post("issuedate");
            $expirydate=$this->input->get_post("expirydate");
            $extention=$this->input->get_post("extention");
            $status=$this->input->get_post("status");
            if($this->license_model->create($number,$company,$issuedate,$expirydate,$extention,$status)==0)
                $data["alerterror"]="New license could not be created.";
            else
                $data["alertsuccess"]="license created Successfully.";
            $data["redirect"]="site/viewlicense";
            $this->load->view("redirect",$data);
        }
    }
    public function editlicense()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editlicense";
        $data["title"]="Edit license";
        $data["before"]=$this->license_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editlicensesubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("number","License Number","trim");
        $this->form_validation->set_rules("company","Company","trim");
        $this->form_validation->set_rules("issuedate","Issue Date","trim");
        $this->form_validation->set_rules("expirydate","Expiry Date","trim");
        $this->form_validation->set_rules("extention","Extention","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editlicense";
            $data["title"]="Edit license";
            $data["before"]=$this->license_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $number=$this->input->get_post("number");
            $company=$this->input->get_post("company");
            $issuedate=$this->input->get_post("issuedate");
            $expirydate=$this->input->get_post("expirydate");
            $extention=$this->input->get_post("extention");
            $status=$this->input->get_post("status");
            if($this->license_model->edit($id,$number,$company,$issuedate,$expirydate,$extention,$status)==0)
                $data["alerterror"]="New license could not be Updated.";
            else
                $data["alertsuccess"]="license Updated Successfully.";
            $data["redirect"]="site/viewlicense";
            $this->load->view("redirect",$data);
        }
    }
    public function deletelicense()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->license_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewlicense";
        $this->load->view("redirect",$data);
    }
    public function viewcompany()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewcompany";
        $data["base_url"]=site_url("site/viewcompanyjson");
        $data["title"]="View company";
        $this->load->view("template",$data);
    }
    function viewcompanyjson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`shipping_company`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`shipping_company`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`shipping_company`.`pancard`";
        $elements[2]->sort="1";
        $elements[2]->header="Pan Card";
        $elements[2]->alias="pancard";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`shipping_company`.`address`";
        $elements[3]->sort="1";
        $elements[3]->header="Address";
        $elements[3]->alias="address";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`shipping_company`.`ieccode`";
        $elements[4]->sort="1";
        $elements[4]->header="IEC Code";
        $elements[4]->alias="ieccode";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`shipping_company`.`status`";
        $elements[5]->sort="1";
        $elements[5]->header="Status";
        $elements[5]->alias="status";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_company`");
        $this->load->view("json",$data);
    }

    public function createcompany()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createcompany";
        $data["title"]="Create company";
        $data["status"]=$this->company_model->getstatusdropdown();
        $this->load->view("template",$data);
    }
    public function createcompanysubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("pancard","Pan Card","trim");
        $this->form_validation->set_rules("address","Address","trim");
        $this->form_validation->set_rules("ieccode","IEC Code","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createcompany";
            $data["title"]="Create company";
            $data["status"]=$this->company_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $pancard=$this->input->get_post("pancard");
            $address=$this->input->get_post("address");
            $ieccode=$this->input->get_post("ieccode");
            $status=$this->input->get_post("status");
            if($this->company_model->create($name,$pancard,$address,$ieccode,$status)==0)
                $data["alerterror"]="New company could not be created.";
            else
                $data["alertsuccess"]="company created Successfully.";
            $data["redirect"]="site/viewcompany";
            $this->load->view("redirect",$data);
        }
    }
    public function editcompany()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editcompany";
        $data["title"]="Edit company";
        $data["status"]=$this->company_model->getstatusdropdown();
        $data["before"]=$this->company_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editcompanysubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("pancard","Pan Card","trim");
        $this->form_validation->set_rules("address","Address","trim");
        $this->form_validation->set_rules("ieccode","IEC Code","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editcompany";
            $data["title"]="Edit company";
            $data["status"]=$this->company_model->getstatusdropdown();
            $data["before"]=$this->company_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $pancard=$this->input->get_post("pancard");
            $address=$this->input->get_post("address");
            $ieccode=$this->input->get_post("ieccode");
            $status=$this->input->get_post("status");
            if($this->company_model->edit($id,$name,$pancard,$address,$ieccode,$status)==0)
                $data["alerterror"]="New company could not be Updated.";
            else
                $data["alertsuccess"]="company Updated Successfully.";
            $data["redirect"]="site/viewcompany";
            $this->load->view("redirect",$data);
        }
    }
    public function deletecompany()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->company_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewcompany";
        $this->load->view("redirect",$data);
    }
    public function viewexport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewexport";
        $data["base_url"]=site_url("site/viewexportjson");
        $data["title"]="View export";
        $this->load->view("template",$data);
    }
    function viewexportjson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`shipping_export`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`shipping_export`.`license`";
        $elements[1]->sort="1";
        $elements[1]->header="License";
        $elements[1]->alias="license";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`shipping_export`.`product`";
        $elements[2]->sort="1";
        $elements[2]->header="Product";
        $elements[2]->alias="product";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`shipping_export`.`qty`";
        $elements[3]->sort="1";
        $elements[3]->header="Quantity";
        $elements[3]->alias="qty";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`shipping_export`.`rateperkgusd`";
        $elements[4]->sort="1";
        $elements[4]->header="Rate Per Kg USD";
        $elements[4]->alias="rateperkgusd";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`shipping_export`.`fobinusd`";
        $elements[5]->sort="1";
        $elements[5]->header="FOB In USD";
        $elements[5]->alias="fobinusd";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`shipping_export`.`fobinrs`";
        $elements[6]->sort="1";
        $elements[6]->header="FOB In RS";
        $elements[6]->alias="fobinrs";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`shipping_export`.`status`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_export`");
        $this->load->view("json",$data);
    }

    public function createexport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createexport";
        $data["title"]="Create export";
        $this->load->view("template",$data);
    }
    public function createexportsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("license","License","trim");
        $this->form_validation->set_rules("product","Product","trim");
        $this->form_validation->set_rules("qty","Quantity","trim");
        $this->form_validation->set_rules("rateperkgusd","Rate Per Kg USD","trim");
        $this->form_validation->set_rules("fobinusd","FOB In USD","trim");
        $this->form_validation->set_rules("fobinrs","FOB In RS","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createexport";
            $data["title"]="Create export";
            $this->load->view("template",$data);
        }
        else
        {
            $license=$this->input->get_post("license");
            $product=$this->input->get_post("product");
            $qty=$this->input->get_post("qty");
            $rateperkgusd=$this->input->get_post("rateperkgusd");
            $fobinusd=$this->input->get_post("fobinusd");
            $fobinrs=$this->input->get_post("fobinrs");
            $status=$this->input->get_post("status");
            if($this->export_model->create($license,$product,$qty,$rateperkgusd,$fobinusd,$fobinrs,$status)==0)
                $data["alerterror"]="New export could not be created.";
            else
                $data["alertsuccess"]="export created Successfully.";
            $data["redirect"]="site/viewexport";
            $this->load->view("redirect",$data);
        }
    }
    public function editexport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editexport";
        $data["title"]="Edit export";
        $data["before"]=$this->export_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editexportsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("license","License","trim");
        $this->form_validation->set_rules("product","Product","trim");
        $this->form_validation->set_rules("qty","Quantity","trim");
        $this->form_validation->set_rules("rateperkgusd","Rate Per Kg USD","trim");
        $this->form_validation->set_rules("fobinusd","FOB In USD","trim");
        $this->form_validation->set_rules("fobinrs","FOB In RS","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editexport";
            $data["title"]="Edit export";
            $data["before"]=$this->export_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $license=$this->input->get_post("license");
            $product=$this->input->get_post("product");
            $qty=$this->input->get_post("qty");
            $rateperkgusd=$this->input->get_post("rateperkgusd");
            $fobinusd=$this->input->get_post("fobinusd");
            $fobinrs=$this->input->get_post("fobinrs");
            $status=$this->input->get_post("status");
            if($this->export_model->edit($id,$license,$product,$qty,$rateperkgusd,$fobinusd,$fobinrs,$status)==0)
                $data["alerterror"]="New export could not be Updated.";
            else
                $data["alertsuccess"]="export Updated Successfully.";
            $data["redirect"]="site/viewexport";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteexport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->export_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewexport";
        $this->load->view("redirect",$data);
    }
    public function viewimport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewimport";
        $data["base_url"]=site_url("site/viewimportjson");
        $data["title"]="View import";
        $this->load->view("template",$data);
    }
    function viewimportjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`shipping_import`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`shipping_import`.`license`";
        $elements[1]->sort="1";
        $elements[1]->header="License";
        $elements[1]->alias="license";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`shipping_import`.`product`";
        $elements[2]->sort="1";
        $elements[2]->header="Product";
        $elements[2]->alias="product";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`shipping_import`.`norm`";
        $elements[3]->sort="1";
        $elements[3]->header="Norm";
        $elements[3]->alias="norm";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`shipping_import`.`qty`";
        $elements[4]->sort="1";
        $elements[4]->header="Quantity";
        $elements[4]->alias="qty";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`shipping_import`.`rateperkgusd`";
        $elements[5]->sort="1";
        $elements[5]->header="Rate Per Kg USD";
        $elements[5]->alias="rateperkgusd";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`shipping_import`.`cifinusd`";
        $elements[6]->sort="1";
        $elements[6]->header="CIF In USD";
        $elements[6]->alias="cifinusd";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`shipping_import`.`cifinrs`";
        $elements[7]->sort="1";
        $elements[7]->header="CIF In RS";
        $elements[7]->alias="cifinrs";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`shipping_import`.`billofentryno`";
        $elements[8]->sort="1";
        $elements[8]->header="Bill Of Entry Number";
        $elements[8]->alias="billofentryno";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`shipping_import`.`date`";
        $elements[9]->sort="1";
        $elements[9]->header="Date";
        $elements[9]->alias="date";
        
        $elements[10]=new stdClass();
        $elements[10]->field="`shipping_import`.`status`";
        $elements[10]->sort="1";
        $elements[10]->header="Status";
        $elements[10]->alias="status";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_import`");
        $this->load->view("json",$data);
    }

    public function createimport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createimport";
        $data["title"]="Create import";
        $this->load->view("template",$data);
    }
    public function createimportsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("license","License","trim");
        $this->form_validation->set_rules("product","Product","trim");
        $this->form_validation->set_rules("norm","Norm","trim");
        $this->form_validation->set_rules("qty","Quantity","trim");
        $this->form_validation->set_rules("rateperkgusd","Rate Per Kg USD","trim");
        $this->form_validation->set_rules("cifinusd","CIF In USD","trim");
        $this->form_validation->set_rules("cifinrs","CIF In RS","trim");
        $this->form_validation->set_rules("billofentryno","Bill Of Entry Number","trim");
        $this->form_validation->set_rules("date","Date","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createimport";
            $data["title"]="Create import";
            $this->load->view("template",$data);
        }
        else
        {
            $license=$this->input->get_post("license");
            $product=$this->input->get_post("product");
            $norm=$this->input->get_post("norm");
            $qty=$this->input->get_post("qty");
            $rateperkgusd=$this->input->get_post("rateperkgusd");
            $cifinusd=$this->input->get_post("cifinusd");
            $cifinrs=$this->input->get_post("cifinrs");
            $billofentryno=$this->input->get_post("billofentryno");
            $date=$this->input->get_post("date");
            $status=$this->input->get_post("status");
            if($this->import_model->create($license,$product,$norm,$qty,$rateperkgusd,$cifinusd,$cifinrs,$billofentryno,$date,$status)==0)
                $data["alerterror"]="New import could not be created.";
            else
                $data["alertsuccess"]="import created Successfully.";
            $data["redirect"]="site/viewimport";
            $this->load->view("redirect",$data);
        }
    }
    public function editimport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editimport";
        $data["title"]="Edit import";
        $data["before"]=$this->import_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editimportsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("license","License","trim");
        $this->form_validation->set_rules("product","Product","trim");
        $this->form_validation->set_rules("norm","Norm","trim");
        $this->form_validation->set_rules("qty","Quantity","trim");
        $this->form_validation->set_rules("rateperkgusd","Rate Per Kg USD","trim");
        $this->form_validation->set_rules("cifinusd","CIF In USD","trim");
        $this->form_validation->set_rules("cifinrs","CIF In RS","trim");
        $this->form_validation->set_rules("billofentryno","Bill Of Entry Number","trim");
        $this->form_validation->set_rules("date","Date","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editimport";
            $data["title"]="Edit import";
            $data["before"]=$this->import_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $license=$this->input->get_post("license");
            $product=$this->input->get_post("product");
            $norm=$this->input->get_post("norm");
            $qty=$this->input->get_post("qty");
            $rateperkgusd=$this->input->get_post("rateperkgusd");
            $cifinusd=$this->input->get_post("cifinusd");
            $cifinrs=$this->input->get_post("cifinrs");
            $billofentryno=$this->input->get_post("billofentryno");
            $date=$this->input->get_post("date");
            $status=$this->input->get_post("status");
            if($this->import_model->edit($id,$license,$product,$norm,$qty,$rateperkgusd,$cifinusd,$cifinrs,$billofentryno,$date,$status)==0)
                $data["alerterror"]="New import could not be Updated.";
            else
                $data["alertsuccess"]="import Updated Successfully.";
            $data["redirect"]="site/viewimport";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteimport()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->import_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewimport";
        $this->load->view("redirect",$data);
    }
    public function viewshipping()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewshipping";
        $data["base_url"]=site_url("site/viewshippingjson");
        $data["title"]="View shipping";
        $this->load->view("template",$data);
    }
    function viewshippingjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`shipping_shipping`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`shipping_shipping`.`liscense`";
        $elements[1]->sort="1";
        $elements[1]->header="Liscense";
        $elements[1]->alias="liscense";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`shipping_shipping`.`shippingbillno`";
        $elements[2]->sort="1";
        $elements[2]->header="Shipping Bill Number";
        $elements[2]->alias="shippingbillno";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`shipping_shipping`.`date`";
        $elements[3]->sort="1";
        $elements[3]->header="Date";
        $elements[3]->alias="date";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`shipping_shipping`.`material`";
        $elements[4]->sort="1";
        $elements[4]->header="Material";
        $elements[4]->alias="material";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`shipping_shipping`.`qty`";
        $elements[5]->sort="1";
        $elements[5]->header="Quantity";
        $elements[5]->alias="qty";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`shipping_shipping`.`amount`";
        $elements[6]->sort="1";
        $elements[6]->header="Amount";
        $elements[6]->alias="amount";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`shipping_shipping`.`status`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_shipping`");
        $this->load->view("json",$data);
    }

    public function createshipping()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createshipping";
        $data["title"]="Create shipping";
        $this->load->view("template",$data);
    }
    public function createshippingsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("liscense","Liscense","trim");
        $this->form_validation->set_rules("shippingbillno","Shipping Bill Number","trim");
        $this->form_validation->set_rules("date","Date","trim");
        $this->form_validation->set_rules("material","Material","trim");
        $this->form_validation->set_rules("qty","Quantity","trim");
        $this->form_validation->set_rules("amount","Amount","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createshipping";
            $data["title"]="Create shipping";
            $this->load->view("template",$data);
        }
        else
        {
            $liscense=$this->input->get_post("liscense");
            $shippingbillno=$this->input->get_post("shippingbillno");
            $date=$this->input->get_post("date");
            $material=$this->input->get_post("material");
            $qty=$this->input->get_post("qty");
            $amount=$this->input->get_post("amount");
            $status=$this->input->get_post("status");
            if($this->shipping_model->create($liscense,$shippingbillno,$date,$material,$qty,$amount,$status)==0)
                $data["alerterror"]="New shipping could not be created.";
            else
                $data["alertsuccess"]="shipping created Successfully.";
            $data["redirect"]="site/viewshipping";
            $this->load->view("redirect",$data);
        }
    }
    public function editshipping()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editshipping";
        $data["title"]="Edit shipping";
        $data["before"]=$this->shipping_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editshippingsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("liscense","Liscense","trim");
        $this->form_validation->set_rules("shippingbillno","Shipping Bill Number","trim");
        $this->form_validation->set_rules("date","Date","trim");
        $this->form_validation->set_rules("material","Material","trim");
        $this->form_validation->set_rules("qty","Quantity","trim");
        $this->form_validation->set_rules("amount","Amount","trim");
        $this->form_validation->set_rules("status","Status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editshipping";
            $data["title"]="Edit shipping";
            $data["before"]=$this->shipping_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $liscense=$this->input->get_post("liscense");
            $shippingbillno=$this->input->get_post("shippingbillno");
            $date=$this->input->get_post("date");
            $material=$this->input->get_post("material");
            $qty=$this->input->get_post("qty");
            $amount=$this->input->get_post("amount");
            $status=$this->input->get_post("status");
            if($this->shipping_model->edit($id,$liscense,$shippingbillno,$date,$material,$qty,$amount,$status)==0)
                $data["alerterror"]="New shipping could not be Updated.";
            else
                $data["alertsuccess"]="shipping Updated Successfully.";
            $data["redirect"]="site/viewshipping";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteshipping()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->shipping_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewshipping";
        $this->load->view("redirect",$data);
    }

}
?>
