<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class import_model extends CI_Model
{
    public function create($license,$product,$norm,$qty,$rateperkgusd,$cifinusd,$cifinrs,$billofentryno,$date,$status)
    {
        $data=array("license" => $license,"product" => $product,"norm" => $norm,"qty" => $qty,"rateperkgusd" => $rateperkgusd,"cifinusd" => $cifinusd,"cifinrs" => $cifinrs,"billofentryno" => $billofentryno,"date" => $date,"status" => $status);
        $query=$this->db->insert( "shipping_import", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_import")->row();
        return $query;
    }
    function getsingleimport($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_import")->row();
        return $query;
    }
    public function edit($id,$license,$product,$norm,$qty,$rateperkgusd,$cifinusd,$cifinrs,$billofentryno,$date,$status)
    {
        $data=array("license" => $license,"product" => $product,"norm" => $norm,"qty" => $qty,"rateperkgusd" => $rateperkgusd,"cifinusd" => $cifinusd,"cifinrs" => $cifinrs,"billofentryno" => $billofentryno,"date" => $date,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_import", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_import` WHERE `id`='$id'");
        return $query;
    }
}
?>
