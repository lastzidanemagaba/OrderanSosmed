<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Orderan_model extends Model
{
    protected $table = 'blog';
     
    
    function search_name($title){
        $db = \Config\Database::connect();
        $builder = $this->db->table($this->table);
        $builder->like('blog_title', $title , 'both');
        $builder->orderBy('blog_title', 'ASC');
        $builder->limit(10);
        return $builder->get()->getResultArray();
    }
 
}