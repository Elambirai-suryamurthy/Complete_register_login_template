<?php
class Profile_model extends CI_model
{
    private $_sno;
    public function setSno($serialno) {
        $this->_sno = $serialno;
    }
    public function getEmpList() {        
        $this->db->select(array('e.sno', 'e.name',  'e.email', 'e.password', 'e.city'));
        $this->db->from('clist e');        
        $query = $this->db->get();
        return $query->result_array();
    }
    
function add($data)
{

   
   $data = array(
    'sno' => $this->input->post('sno'),
    'name' => $this->input->post('name'),
    'email' => $this->input->post('email'),
    'password' => $this->input->post('password'),
    'city' => $this->input->post('city')
    );
        $this->db->insert('clist',$data);
   } 
   public function getEmp() {     


$this->db->select(array('e.sno', 'e.name', 'e.email', 'e.password', 'e.city'));
$this->db->from('clist e');  
$this->db->where('e.sno', $this->_sno);     
$query = $this->db->get();
return $query->row_array();
}
function updateEmp($data)
{

extract($data);

    $this->db->where('sno', $sno);
    $this->db->update($table_name, array('sno' => $sno, 'name' => $name, 'email' => $email, 'password' => $password, 'city' => $city));
    return true;

}
public function deleteEmp() {         
    $this->db->where('sno', $this->_sno);
    $this->db->delete('clist');  
}





}
?>