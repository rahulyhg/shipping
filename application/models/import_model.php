<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class import_model extends CI_Model
{
    public function create($license,$product,$norm,$appliedqty,$rateperkgusd,$cifinusd,$cifinrs,$billofentryno,$date,$status,$cifwithoutnormusd,$cifwithoutnormrs,$finalqty,$importbalanceqty,$importbalanceamount,$differenceqty,$differenceamount)
    {
        $licensedetails=$this->db->query("SELECT `shipping_license`.`id`,`shipping_license`.`usdrate`,`shipping_license`.`number`,`shipping_export`.`qty` FROM `shipping_license` LEFT OUTER JOIN `shipping_export` ON `shipping_license`.`id`=`shipping_export`.`license` WHERE `shipping_license`.`id`='$license'")->row();
        $usdrate=$licensedetails->usdrate;
        $qty=$licensedetails->qty;
        echo $usdrate;
        $cifwithoutnormusd=$rateperkgusd*$appliedqty;
        $cifwithoutnormrs=$cifwithoutnormusd*$usdrate;
//        echo $usdrate." * ".$fobinusd." = ".$fobinrs;
        echo $norm;
        
        if($norm==0)
        {
            $importbalanceqty=$appliedqty;
            $importbalanceamount=$cifwithoutnormusd;
        }
        if($norm > 0)
        {
            echo "in if";
            $finalqty=$norm*$qty;
            $cifinusd=$finalqty*$rateperkgusd;
            $cifinrs=$cifinusd*$usdrate;
            echo $finalqty."-".$cifinusd."-".$cifinrs;
            
//            $importrowcount=$this->db->query("SELECT * FROM `shipping_import` WHERE `license`='$license'")->result();
//            if(empty($importrowcount))
//            {
//                $finalqty=$qty*$rateperkgusd;
//            }
//            else
//            {
//                $finalqty=0;
//                foreach($importrowcount as $key=>$value)
//                {
//                    $total=
//                    $finalqty=
//                }
//            }
//                
            
        }
        
        $data=array("license" => $license,"product" => $product,"norm" => $norm,"appliedqty" => $appliedqty,"rateperkgusd" => $rateperkgusd,"cifinusd" => $cifinusd,"cifinrs" => $cifinrs,"billofentryno" => $billofentryno,"date" => $date,"status" => $status,"cifwithoutnormusd" => $cifwithoutnormusd,"cifwithoutnormrs" => $cifwithoutnormrs,"finalqty" => $finalqty,"importbalanceqty" => $importbalanceqty,"importbalanceamount" => $importbalanceamount,"differenceqty" => $differenceqty,"differenceamount" => $differenceamount);
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
    public function edit($id,$license,$product,$norm,$appliedqty,$rateperkgusd,$cifinusd,$cifinrs,$billofentryno,$date,$status,$cifwithoutnormusd,$cifwithoutnormrs,$finalqty,$importbalanceqty,$importbalanceamount,$differenceqty,$differenceamount)
    {
        
        
        $licensedetails=$this->db->query("SELECT `shipping_license`.`id`,`shipping_license`.`usdrate`,`shipping_license`.`number`,`shipping_export`.`qty` FROM `shipping_license` LEFT OUTER JOIN `shipping_export` ON `shipping_license`.`id`=`shipping_export`.`license` WHERE `shipping_license`.`id`='$license'")->row();
        $usdrate=$licensedetails->usdrate;
        $qty=$licensedetails->qty;
        echo $usdrate;
        $cifwithoutnormusd=$rateperkgusd*$appliedqty;
        $cifwithoutnormrs=$cifwithoutnormusd*$usdrate;
//        echo $usdrate." * ".$fobinusd." = ".$fobinrs;
        echo $norm;
        
        $q="SELECT SUM(`shipping_shippingimport`. `qty`) as `totalquantity`,SUM(`shipping_shippingimport`. `amount`) as `totalamount` FROM `shipping_shippingimport` WHERE `shipping_shippingimport`.`material`='$product'";
        
        if($norm == 0)
        {
            $q=$this->db->query("SELECT SUM(`shipping_shippingimport`. `qty`) as `totalquantity`,SUM(`shipping_shippingimport`. `amount`) as `totalamount` FROM `shipping_shippingimport` WHERE `shipping_shippingimport`.`material`='$product'")->row();
            $totalquantity=$q->totalquantity;
            $totalamount=$q->totalamount;
            
            if($totalquantity=="")
                $totalquantity=0;
            if($totalamount=="")
                $totalamount=0;
            
            $importbalanceqty=$appliedqty-$totalquantity;
            $importbalanceamount=$cifwithoutnormusd-$totalamount;
            
            $cifinusd=0;
            $cifinrs=0;
            $finalqty=0;
//            $uq="UPDATE `shipping_import` SET `cifinusd`='$cifinusd',`cifinrs`='$cifinrs',`finalqty`='$finalqty',`importbalanceqty`='$importbalanceqty',`importbalanceamount`='$importbalanceamount' WHERE `id`='$material'";
//            $updatequery=$this->db->query($uq);
            
//            $importbalanceqty=$appliedqty;
//            $importbalanceamount=$cifwithoutnormusd;
        }
        if($norm > 0)
        {
//            echo "in if";
            $finalqty=$norm*$qty;
            $cifinusd=$finalqty*$rateperkgusd;
            $cifinrs=$cifinusd*$usdrate;
//            echo $finalqty."-".$cifinusd."-".$cifinrs;
//            echo $product;
//            $check="SELECT SUM(`shipping_shippingimport`. `qty`) as `totalquantity`,SUM(`shipping_shippingimport`. `amount`) as `totalamount` FROM `shipping_shippingimport` WHERE `shipping_shippingimport`.`material`='$id'";
//            echo $check;
            $q=$this->db->query("SELECT SUM(`shipping_shippingimport`. `qty`) as `totalquantity`,SUM(`shipping_shippingimport`. `amount`) as `totalamount` FROM `shipping_shippingimport` WHERE `shipping_shippingimport`.`material`='$id'")->row();
            print_r($q);
            $totalquantity=$q->totalquantity;
            $totalamount=$q->totalamount;
            
            if($totalquantity=="")
                $totalquantity=0;
            if($totalamount=="")
                $totalamount=0;
            
            $importbalanceqty=$finalqty-$totalquantity;
            $importbalanceamount=$cifinusd-$totalamount;
            
//            echo "1)importbalanceqty=".$importbalanceqty."<br>";
//            echo "2)importbalanceamount=".$importbalanceamount."<br>";
//            echo "3)totalquantity=".$totalquantity."<br>";
//            echo "4)totalamount=".$totalamount."<br>";
            
//            $uq="UPDATE `shipping_import` SET `importbalanceqty`='$importbalanceqty',`importbalanceamount`='$importbalanceamount' WHERE `id`='$material'";
//            $updatequery=$this->db->query($uq);
        
            
            
//            $importrowcount=$this->db->query("SELECT * FROM `shipping_import` WHERE `license`='$license'")->result();
//            if(empty($importrowcount))
//            {
//                $finalqty=$qty*$rateperkgusd;
//            }
//            else
//            {
//                $finalqty=0;
//                foreach($importrowcount as $key=>$value)
//                {
//                    $total=
//                    $finalqty=
//                }
//            }
//                
            
        }
        
        
        $data=array("license" => $license,"product" => $product,"norm" => $norm,"appliedqty" => $appliedqty,"rateperkgusd" => $rateperkgusd,"cifinusd" => $cifinusd,"cifinrs" => $cifinrs,"billofentryno" => $billofentryno,"date" => $date,"status" => $status,"cifwithoutnormusd" => $cifwithoutnormusd,"cifwithoutnormrs" => $cifwithoutnormrs,"finalqty" => $finalqty,"importbalanceqty" => $importbalanceqty,"importbalanceamount" => $importbalanceamount,"differenceqty" => $differenceqty,"differenceamount" => $differenceamount);
        print_r($data);
        $this->db->where( "id", $id );
        $query=$this->db->update( "shipping_import", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `shipping_import` WHERE `id`='$id'");
        return $query;
    }
    
    public function getimportproductbylicense($license)
	{
		$query=$this->db->query("SELECT * FROM `shipping_import` WHERE `license`='$license'  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->product;
		}
		
		return $return;
	}
}
?>
