<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class license_model extends CI_Model
{
    public function create($number,$company,$issuedate,$expirydate,$extention,$status,$importexpirydate,$usdrate)
    {
        $data=array("number" => $number,"company" => $company,"issuedate" => $issuedate,"expirydate" => $expirydate,"extention" => $extention,"status" => $status,"importexpirydate" => $importexpirydate,"usdrate" => $usdrate);
        $query=$this->db->insert( "shipping_license", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_license")->row();
        return $query;
    }
    function getsinglelicense($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_license")->row();
        return $query;
    }
    public function edit($id,$number,$company,$issuedate,$expirydate,$extention,$status,$importexpirydate,$usdrate)
    {
        $data=array("number" => $number,"company" => $company,"issuedate" => $issuedate,"expirydate" => $expirydate,"extention" => $extention,"status" => $status,"importexpirydate" => $importexpirydate,"usdrate" => $usdrate);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_license", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_license` WHERE `id`='$id'");
        return $query;
    }
    
    public function getlicensedropdown()
	{
		$query=$this->db->query("SELECT * FROM `shipping_license` ORDER BY `id` ASC")->result();
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
