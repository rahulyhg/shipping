<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getalllicense()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`shipping_license`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`shipping_license`.`number`";
$elements[1]->sort="1";
$elements[1]->header="License Number";
$elements[1]->alias="number";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`shipping_license`.`company`";
$elements[2]->sort="1";
$elements[2]->header="Company";
$elements[2]->alias="company";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`shipping_license`.`issuedate`";
$elements[3]->sort="1";
$elements[3]->header="Issue Date";
$elements[3]->alias="issuedate";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`shipping_license`.`expirydate`";
$elements[4]->sort="1";
$elements[4]->header="Expiry Date";
$elements[4]->alias="expirydate";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`shipping_license`.`extention`";
$elements[5]->sort="1";
$elements[5]->header="Extention";
$elements[5]->alias="extention";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`shipping_license`.`status`";
$elements[6]->sort="1";
$elements[6]->header="Status";
$elements[6]->alias="status";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`shipping_license`.`importexpirydate`";
$elements[7]->sort="1";
$elements[7]->header="Import Expiry Date";
$elements[7]->alias="importexpirydate";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`shipping_license`.`usdrate`";
$elements[8]->sort="1";
$elements[8]->header="USD Rate";
$elements[8]->alias="usdrate";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_license`");
$this->load->view("json",$data);
}
public function getsinglelicense()
{
$id=$this->input->get_post("id");
$data["message"]=$this->license_model->getsinglelicense($id);
$this->load->view("json",$data);
}
function getallcompany()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`shipping_company`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`shipping_company`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`shipping_company`.`pancard`";
$elements[2]->sort="1";
$elements[2]->header="Pan Card";
$elements[2]->alias="pancard";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`shipping_company`.`address`";
$elements[3]->sort="1";
$elements[3]->header="Address";
$elements[3]->alias="address";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`shipping_company`.`ieccode`";
$elements[4]->sort="1";
$elements[4]->header="IEC Code";
$elements[4]->alias="ieccode";

$elements=array();
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_company`");
$this->load->view("json",$data);
}
public function getsinglecompany()
{
$id=$this->input->get_post("id");
$data["message"]=$this->company_model->getsinglecompany($id);
$this->load->view("json",$data);
}
function getallexport()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`shipping_export`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`shipping_export`.`license`";
$elements[1]->sort="1";
$elements[1]->header="License";
$elements[1]->alias="license";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`shipping_export`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`shipping_export`.`qty`";
$elements[3]->sort="1";
$elements[3]->header="Quantity";
$elements[3]->alias="qty";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`shipping_export`.`rateperkgusd`";
$elements[4]->sort="1";
$elements[4]->header="Rate Per Kg USD";
$elements[4]->alias="rateperkgusd";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`shipping_export`.`fobinusd`";
$elements[5]->sort="1";
$elements[5]->header="FOB In USD";
$elements[5]->alias="fobinusd";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`shipping_export`.`fobinrs`";
$elements[6]->sort="1";
$elements[6]->header="FOB In RS";
$elements[6]->alias="fobinrs";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`shipping_export`.`status`";
$elements[7]->sort="1";
$elements[7]->header="Status";
$elements[7]->alias="status";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`shipping_export`.`exportbalanceqty`";
$elements[8]->sort="1";
$elements[8]->header="Export Balance Quantity";
$elements[8]->alias="exportbalanceqty";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`shipping_export`.`exportbalanceusd`";
$elements[9]->sort="1";
$elements[9]->header="Export Balance USD";
$elements[9]->alias="exportbalanceusd";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`shipping_export`.`exportexpirydate`";
$elements[10]->sort="1";
$elements[10]->header="Export Expiry Date";
$elements[10]->alias="exportexpirydate";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_export`");
$this->load->view("json",$data);
}
public function getsingleexport()
{
$id=$this->input->get_post("id");
$data["message"]=$this->export_model->getsingleexport($id);
$this->load->view("json",$data);
}
function getallimport()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`shipping_import`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`shipping_import`.`license`";
$elements[1]->sort="1";
$elements[1]->header="License";
$elements[1]->alias="license";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`shipping_import`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`shipping_import`.`norm`";
$elements[3]->sort="1";
$elements[3]->header="Norm";
$elements[3]->alias="norm";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`shipping_import`.`appliedqty`";
$elements[4]->sort="1";
$elements[4]->header="Applied Quantity";
$elements[4]->alias="appliedqty";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`shipping_import`.`rateperkgusd`";
$elements[5]->sort="1";
$elements[5]->header="Rate Per Kg USD";
$elements[5]->alias="rateperkgusd";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`shipping_import`.`cifinusd`";
$elements[6]->sort="1";
$elements[6]->header="CIF In USD";
$elements[6]->alias="cifinusd";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`shipping_import`.`cifinrs`";
$elements[7]->sort="1";
$elements[7]->header="CIF In RS";
$elements[7]->alias="cifinrs";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`shipping_import`.`billofentryno`";
$elements[8]->sort="1";
$elements[8]->header="Bill Of Entry Number";
$elements[8]->alias="billofentryno";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`shipping_import`.`date`";
$elements[9]->sort="1";
$elements[9]->header="Date";
$elements[9]->alias="date";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`shipping_import`.`status`";
$elements[10]->sort="1";
$elements[10]->header="Status";
$elements[10]->alias="status";

$elements=array();
$elements[11]=new stdClass();
$elements[11]->field="`shipping_import`.`cifwithoutnormusd`";
$elements[11]->sort="1";
$elements[11]->header="CIF Without Norm USD";
$elements[11]->alias="cifwithoutnormusd";

$elements=array();
$elements[12]=new stdClass();
$elements[12]->field="`shipping_import`.`cifwithoutnormrs`";
$elements[12]->sort="1";
$elements[12]->header="CIF Without Norm RS";
$elements[12]->alias="cifwithoutnormrs";

$elements=array();
$elements[13]=new stdClass();
$elements[13]->field="`shipping_import`.`finalqty`";
$elements[13]->sort="1";
$elements[13]->header="Final Quantity";
$elements[13]->alias="finalqty";

$elements=array();
$elements[14]=new stdClass();
$elements[14]->field="`shipping_import`.`importbalanceqty`";
$elements[14]->sort="1";
$elements[14]->header="Import Balance Quantity";
$elements[14]->alias="importbalanceqty";

$elements=array();
$elements[15]=new stdClass();
$elements[15]->field="`shipping_import`.`importbalanceamount`";
$elements[15]->sort="1";
$elements[15]->header="Import Balance Amount";
$elements[15]->alias="importbalanceamount";

$elements=array();
$elements[16]=new stdClass();
$elements[16]->field="`shipping_import`.`differenceqty`";
$elements[16]->sort="1";
$elements[16]->header="Difference Quantity";
$elements[16]->alias="differenceqty";

$elements=array();
$elements[17]=new stdClass();
$elements[17]->field="`shipping_import`.`differenceamount`";
$elements[17]->sort="1";
$elements[17]->header="Difference Amount";
$elements[17]->alias="differenceamount";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_import`");
$this->load->view("json",$data);
}
public function getsingleimport()
{
$id=$this->input->get_post("id");
$data["message"]=$this->import_model->getsingleimport($id);
$this->load->view("json",$data);
}
function getallshippingexport()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`shipping_shippingexport`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`shipping_shippingexport`.`liscense`";
$elements[1]->sort="1";
$elements[1]->header="Liscense";
$elements[1]->alias="liscense";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`shipping_shippingexport`.`shippingbillno`";
$elements[2]->sort="1";
$elements[2]->header="Shipping Bill Number";
$elements[2]->alias="shippingbillno";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`shipping_shippingexport`.`date`";
$elements[3]->sort="1";
$elements[3]->header="Date";
$elements[3]->alias="date";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`shipping_shippingexport`.`material`";
$elements[4]->sort="1";
$elements[4]->header="Material";
$elements[4]->alias="material";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`shipping_shippingexport`.`qty`";
$elements[5]->sort="1";
$elements[5]->header="Quantity";
$elements[5]->alias="qty";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`shipping_shippingexport`.`amount`";
$elements[6]->sort="1";
$elements[6]->header="Amount";
$elements[6]->alias="amount";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`shipping_shippingexport`.`status`";
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_shippingexport`");
$this->load->view("json",$data);
}
public function getsingleshippingexport()
{
$id=$this->input->get_post("id");
$data["message"]=$this->shippingexport_model->getsingleshippingexport($id);
$this->load->view("json",$data);
}
function getallshippingimport()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`shipping_shippingimport`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`shipping_shippingimport`.`license`";
$elements[1]->sort="1";
$elements[1]->header="License";
$elements[1]->alias="license";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`shipping_shippingimport`.`billofentry`";
$elements[2]->sort="1";
$elements[2]->header="Bill Of Entry";
$elements[2]->alias="billofentry";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`shipping_shippingimport`.`date`";
$elements[3]->sort="1";
$elements[3]->header="Date";
$elements[3]->alias="date";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`shipping_shippingimport`.`material`";
$elements[4]->sort="1";
$elements[4]->header="Material";
$elements[4]->alias="material";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`shipping_shippingimport`.`qty`";
$elements[5]->sort="1";
$elements[5]->header="Quantity";
$elements[5]->alias="qty";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`shipping_shippingimport`.`amount`";
$elements[6]->sort="1";
$elements[6]->header="Amount";
$elements[6]->alias="amount";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`shipping_shippingimport`.`status`";
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
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `shipping_shippingimport`");
$this->load->view("json",$data);
}
public function getsingleshippingimport()
{
$id=$this->input->get_post("id");
$data["message"]=$this->shippingimport_model->getsingleshippingimport($id);
$this->load->view("json",$data);
}
} ?>