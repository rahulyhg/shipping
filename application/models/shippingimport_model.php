<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class shippingimport_model extends CI_Model
{
    public function create($license,$billofentry,$date,$material,$qty,$amount,$status)
    {
        $importdetails=$this->db->query("SELECT * FROM `shipping_import` WHERE `id`='$material'")->row();
        $importid=$importdetails->id;
        $importlicense=$importdetails->license;
//        $importquantity=$importdetails->appliedqty;
//        $importamount=$importdetails->amount;
        $importbalanceqty=$importdetails->importbalanceqty;
        $importbalanceamount=$importdetails->importbalanceamount;
        
        $newimportbalanceqty=$importbalanceqty-$qty;
        $newimportbalanceamount=$importbalanceamount-$amount;
        
//        echo "1)".$newimportbalanceqty."2)".$newimportbalanceamount;
        
        $data=array("license" => $license,"billofentry" => $billofentry,"date" => $date,"material" => $material,"qty" => $qty,"amount" => $amount,"status" => $status);
        $query=$this->db->insert( "shipping_shippingimport", $data );
        $id=$this->db->insert_id();
        
        $uq="UPDATE `shipping_import` SET `importbalanceqty`='$newimportbalanceqty',`importbalanceamount`='$newimportbalanceamount' WHERE `id`='$importid'";
        $updatequery=$this->db->query($uq);
        
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_shippingimport")->row();
        return $query;
    }
    function getsingleshippingimport($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("shipping_shippingimport")->row();
        return $query;
    }
    public function edit($id,$license,$billofentry,$date,$material,$qty,$amount,$status)
    {
        
        
        $importdetails=$this->db->query("SELECT * FROM `shipping_import` WHERE `id`='$material'")->row();
        $importid=$importdetails->id;
        $importlicense=$importdetails->license;
//        $importquantity=$importdetails->appliedqty;
//        $importamount=$importdetails->amount;
        $importbalanceqty=$importdetails->importbalanceqty;
        $importbalanceamount=$importdetails->importbalanceamount;
        
        
        $shippingimportdetails=$this->db->query("SELECT * FROM `shipping_shippingimport` WHERE `id`='$id'")->row();
        $shippingimportid=$shippingimportdetails->id;
        $shippingimportqty=$shippingimportdetails->qty;
        $shippingimportamount=$shippingimportdetails->amount;
        
        if($qty<$shippingimportqty)
        {
            $newimportbalanceqty=$importbalanceqty+$qty;
        }
        else if($qty>$shippingimportqty)
        {
            $newimportbalanceqty=$importbalanceqty-$qty;
        }
        else
        {
            $newimportbalanceqty=$importbalanceqty;
        }
        
        if($amount<$shippingimportamount)
        {
            $newimportbalanceamount=$importbalanceamount+$amount;
        }
        else if($qty>$shippingimportamount)
        {
            $newimportbalanceamount=$importbalanceamount-$amount;
        }
        else
        {
            $newimportbalanceamount=$importbalanceamount;
        }
        
//        $newimportbalanceqty=$importbalanceqty-$qty;
//        $newimportbalanceamount=$importbalanceamount-$amount;
        
//        echo "1)".$newimportbalanceqty."2)".$newimportbalanceamount;
        

        
        
        $uq="UPDATE `shipping_import` SET `importbalanceqty`='$newimportbalanceqty',`importbalanceamount`='$newimportbalanceamount' WHERE `id`='$importid'";
        $updatequery=$this->db->query($uq);
        
        
        
        
        $data=array("license" => $license,"billofentry" => $billofentry,"date" => $date,"material" => $material,"qty" => $qty,"amount" => $amount,"status" => $status);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_shippingimport", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_shippingimport` WHERE `id`='$id'");
        return $query;
    }
}
?>
