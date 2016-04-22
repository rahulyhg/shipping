<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class company_model extends CI_Model
{
    public function create($name,$pancard,$address,$ieccode,$status)
    {
        $data=array("name" => $name,"pancard" => $pancard,"address" => $address,"ieccode" => $ieccode,"status" => $status);
        $query=$this->db->insert( "shipping_company", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_company")->row();
        return $query;
    }
    function getsinglecompany($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_company")->row();
        return $query;
    }
    public function edit($id,$name,$pancard,$address,$ieccode,$status)
    {
        $data=array("name" => $name,"pancard" => $pancard,"address" => $address,"ieccode" => $ieccode,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_company", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_company` WHERE `id`='$id'");
        return $query;
    }
    public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enable",
			 "0" => "Disable"
			);
		return $status;
	}
    
    public function getcompanydropdown()
	{
		$query=$this->db->query("SELECT * FROM `shipping_company` WHERE `status`=1  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
}
?>
