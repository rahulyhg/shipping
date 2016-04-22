<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class export_model extends CI_Model
{
    public function create($license,$product,$qty,$rateperkgusd,$fobinusd,$fobinrs,$status,$exportbalanceqty,$exportbalanceusd,$exportexpirydate)
    {
        
        $exportbalanceqty=$qty;
        $exportbalanceusd=$fobinusd;
        
        $licensedetails=$this->db->query("SELECT * FROM `shipping_license` WHERE `id`='$license'")->row();
        $usdrate=$licensedetails->usdrate;
//        echo $usdrate;
        $fobinusd=$rateperkgusd*$qty;
        $fobinrs=$fobinusd*$usdrate;
//        echo $usdrate." * ".$fobinusd." = ".$fobinrs;
        
        $data=array("license" => $license,"product" => $product,"qty" => $qty,"rateperkgusd" => $rateperkgusd,"fobinusd" => $fobinusd,"fobinrs" => $fobinrs,"status" => $status,"exportbalanceqty" => $exportbalanceqty,"exportbalanceusd" => $exportbalanceusd,"exportexpirydate" => $exportexpirydate);
        $query=$this->db->insert( "shipping_export", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_export")->row();
        return $query;
    }
    function getsingleexport($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_export")->row();
        return $query;
    }
    public function edit($id,$license,$product,$qty,$rateperkgusd,$fobinusd,$fobinrs,$status,$exportbalanceqty,$exportbalanceusd,$exportexpirydate)
    {
        $licensedetails=$this->db->query("SELECT * FROM `shipping_license` WHERE `id`='$license'")->row();
        $usdrate=$licensedetails->usdrate;
//        echo $usdrate;
        $fobinusd=$rateperkgusd*$qty;
        $fobinrs=$fobinusd*$usdrate;
//        echo $usdrate." * ".$fobinusd." = ".$fobinrs;
        
        $data=array("license" => $license,"product" => $product,"qty" => $qty,"rateperkgusd" => $rateperkgusd,"fobinusd" => $fobinusd,"fobinrs" => $fobinrs,"status" => $status,"exportbalanceqty" => $exportbalanceqty,"exportbalanceusd" => $exportbalanceusd,"exportexpirydate" => $exportexpirydate);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_export", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_export` WHERE `id`='$id'");
        return $query;
    }
    
    public function getexportproductbylicense($licenseid)
	{
		$query=$this->db->query("SELECT * FROM `shipping_export` WHERE `license`='$licenseid'  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->product;
		}
		
		return $return;
	}
    public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Open",
			 "0" => "Closed"
			);
		return $status;
	}
    
    
}
?>
