<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class shipping_model extends CI_Model
{
    public function create($liscense,$shippingbillno,$date,$material,$qty,$amount,$status)
    {
        $data=array("liscense" => $liscense,"shippingbillno" => $shippingbillno,"date" => $date,"material" => $material,"qty" => $qty,"amount" => $amount,"status" => $status);
        $query=$this->db->insert( "shipping_shipping", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_shipping")->row();
        return $query;
    }
    function getsingleshipping($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_shipping")->row();
        return $query;
    }
    public function edit($id,$liscense,$shippingbillno,$date,$material,$qty,$amount,$status)
    {
        $data=array("liscense" => $liscense,"shippingbillno" => $shippingbillno,"date" => $date,"material" => $material,"qty" => $qty,"amount" => $amount,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_shipping", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_shipping` WHERE `id`='$id'");
        return $query;
    }
}
?>
