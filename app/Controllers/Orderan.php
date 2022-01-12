<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Orderan_model;

class Orderan extends Controller
{
    public function index()
    {
        return view('orderan_view');
    }
    public function get_autocomplete()
    {
        if (isset($_GET['term'])) 
        {
                $model = new Orderan_model;
                $result = $model->search_name($_GET['term']);
                if (count($result) > 0) 
                {
                    foreach ($result as $row)
                    
                        $arr_result[] = array(
                                'label'			=> $row["blog_title"],
                                'description'	=> $row["blog_description"],
                                'sale_alamat'	=> $row["sale_alamat"],
                            );
                        echo json_encode($arr_result);
                }
        }
            
    }

    public function do_upload()
    {
        $image = $this->request->getFile('myDropzone');
        echo $image;

		
    }
		
	
}