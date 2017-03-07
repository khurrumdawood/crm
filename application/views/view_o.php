<pre>
<code>
    <?php echo '&lt;?php'; ?>
    class <?php echo ucfirst($table); ?> extends CI_Controller {
function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }
function index() {
        
        $data['back_button'] = array('url' =&gt; 'javascript:void(0)', 'btn_title' =&gt; 'Back', 'onclick' =&gt; 'history.go(-1);');
        $data['active_link'] = 'zones';
        $data['table_text'] = 'Companies';
        $data['page_text'] = 'Companies&lt;small&gt;List of Couriers\' Companies&lt;/small&gt;';
        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'admin/<?php echo $table; ?>/<?php echo $table; ?>datatable/';

        $data['add_button'] = array('url' =&gt; base_url() . 'admin/<?php echo $table; ?>/add_<?php echo $table; ?>', 'btn_title' =&gt; 'Add New <?php echo ucfirst($table); ?>');

        $tmpl = array('table_open' =&gt; '&lt;table class="display table table-striped table-hover" id="table-4"&gt;');

        $this-&gt;table-&gt;set_template($tmpl);

        $this-&gt;table-&gt;set_heading(<?php echo '"'.implode('","', $ops1).'","Edit","Delete"'; ?>);

        $this-&gt;table-&gt;set_footer(
        <?php $i=0;
        $total = count($ops);
            foreach($ops as $op)
            {
                $op1 = $ops1[$i];
                ?>
                '&lt;input type="text" name="<?php echo $op; ?>" placeholder="<?php echo $op1; ?>" class="search_init" /&gt;'<?php if($i!=$total-1) echo ','; ?>
                
        <?php $i++;  } ?>
        );

        $this-&gt;load-&gt;view('admin/list', $data);
    }

    function <?php echo $table; ?>datatable() {
        $select = '<?php echo implode(',',$ops); ?>';
        $where = '';
        $generate = $this-&gt;web-&gt;get_dt_data('', '<?php echo $table; ?>', $where, $select);
        
        $generate['aaData'] = $this-&gt;admin_prepare_<?php echo $table; ?>($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_<?php echo $table; ?>($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $edit = '&lt;a href="' . base_url() . 'admin/<?php echo $table; ?>/edit_<?php echo $table; ?>/' . $data[0] . '"&gt;Edit&lt;/a&gt;';
                $delete = '&lt;a href="' . base_url() . 'admin/<?php echo $table; ?>/delete_<?php echo $table; ?>/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" &gt;Delete&lt;/a&gt;';
            <?php $i=0;
            foreach($ops as $op)
            {
//                print_r($ops);exit;
//                $op1 = $ops1[$i];
                 ?>
    $rs[] = $data[<?php echo $i; ?>];
            <?php $i++; } ?>
    $rs[] = $edit;
    $rs[] = $delete;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }
    
    function add_<?php echo $table; ?>() {
        
        <?php $i=0;
            foreach($ops as $op)
            {
                $op1 = $ops1[$i];
                $i++; ?>
        $this->form_validation->set_rules('<?php echo $op; ?>', '<?php echo $op1; ?>', 'required');
            <?php } ?>
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';

            $this->load->view('admin/<?php echo $table ?>/add', $data);
        } else {
        <?php $i=0;
            foreach($ops as $op)
            {
                $op1 = $ops1[$i];
                $i++; ?>
            $data['<?php echo $op; ?>'] = $this->input->post('<?php echo $op; ?>');
            <?php } ?>
            $this->web->insert_data($data, '<?php echo $table; ?>');

            redirect(base_url() . 'index.php/admin/<?php echo $table; ?>');
        }
    }
    
    
    function edit_<?php echo $table; ?>($id=0) {
        if($id==0)
        {
            show_404();
        }
        <?php $i=0;
            foreach($ops as $op)
            {
                $op1 = $ops1[$i];
                $i++; ?>
        $this->form_validation->set_rules('<?php echo $op; ?>', '<?php echo $op1; ?>', 'required');
            <?php  } ?>
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Courier Company';
            $data['page_text'] = 'Zones';

            $data['<?php echo $table; ?>_data'] = $this->web->get_data($id, '<?php echo $table; ?>');
            $this->load->view('admin/<?php echo $table; ?>/edit', $data);
            
        } else {
            <?php $i=0;
            foreach($ops as $op)
            {
                $op1 = $ops1[$i];
                $i++; ?>
            $data['<?php echo $op; ?>'] = $this->input->post('<?php echo $op; ?>');
            <?php } ?>
            
            $this->web->update_data($id, '<?php echo $table; ?>', $data);

            redirect(base_url() . 'index.php/admin/<?php echo $table; ?>');
            
        }
    }
    
    
    function delete_<?php echo $table; ?>($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, '<?php echo $table; ?>');
        
        redirect(base_url() . 'admin/<?php echo $table; ?>/');

        $this->output->enable_profiler(FALSE);
    }

    
    
}
</code>
</pre>