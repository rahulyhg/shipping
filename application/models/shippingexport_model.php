<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class shippingexport_model extends CI_Model
{
    public function create($license,$shippingbillno,$date,$material,$qty,$amount,$status,$manualfobrs,$actualrealisedebrcusd)
    {
        
        $exportdetails=$this->db->query("SELECT * FROM `shipping_export` WHERE `license`='$license'")->row();
        $exportid=$exportdetails->id;
        $exportqty=$exportdetails->qty;
        $exportfobinusd=$exportdetails->fobinusd;
        $exportbalanceqty=$exportdetails->exportbalanceqty;
        $exportbalanceusd=$exportdetails->exportbalanceusd;
        
        $newbalanceqty=$exportbalanceqty-$qty;
        $newbalanceamount=$exportbalanceusd-$amount;
        
//        $arrofobject = (array)$exportdetails;
//        if (empty($arrofobject)) 
//        {
//            $newbalanceqty=$exportqty-$qty;
//            $newbalanceamount=$exportfobinusd-$amount;
//        }
        
        $data=array("license" => $license,"shippingbillno" => $shippingbillno,"date" => $date,"material" => $material,"qty" => $qty,"amount" => $amount,"status" => $status);
        $query=$this->db->insert( "shipping_shippingexport", $data );
        $id=$this->db->insert_id();
        $uq="UPDATE `shipping_export` SET `exportbalanceqty`='$newbalanceqty',`exportbalanceusd`='$newbalanceamount' WHERE `id`='$exportid'";
        $updateq=$this->db->query($uq);
        echo $uq;
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_shippingexport")->row();
        return $query;
    }
    function getsingleshippingexport($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_shippingexport")->row();
        return $query;
    }
    public function edit($id,$license,$shippingbillno,$date,$material,$qty,$amount,$status,$manualfobrs,$actualrealisedebrcusd)
    {
        $data=array("license" => $license,"shippingbillno" => $shippingbillno,"date" => $date,"material" => $material,"qty" => $qty,"amount" => $amount,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_shippingexport", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_shippingexport` WHERE `id`='$id'");
        return $query;
    }
}
?>
