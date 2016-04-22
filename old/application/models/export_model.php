<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class export_model extends CI_Model
{
    public function create($license,$product,$qty,$rateperkgusd,$fobinusd,$fobinrs,$status)
    {
        $data=array("license" => $license,"product" => $product,"qty" => $qty,"rateperkgusd" => $rateperkgusd,"fobinusd" => $fobinusd,"fobinrs" => $fobinrs,"status" => $status);
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
    public function edit($id,$license,$product,$qty,$rateperkgusd,$fobinusd,$fobinrs,$status)
    {
        $data=array("license" => $license,"product" => $product,"qty" => $qty,"rateperkgusd" => $rateperkgusd,"fobinusd" => $fobinusd,"fobinrs" => $fobinrs,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_export", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_export` WHERE `id`='$id'");
        return $query;
    }
}
?>
