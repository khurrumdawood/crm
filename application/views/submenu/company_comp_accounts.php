<?php
if (!isset($active_sub_link)) {
    $active_sub_link = '';
}
?>
<ul id="menu">
    <?php if (isset($is_edit_customer)||isset($is_edit_customer)) { ?>
        <li><a class="<?php if ($active_sub_link == 'account_setup'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/edit_customer/<?php echo $customer_id ?>" title="Addresses">
                <i class="entypo-briefcase"></i><span>Account Setup</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'addresses'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/edit_customer_address/<?php echo $customer_id ?>" title="Addresses">
                <i class="entypo-briefcase"></i><span>Addresses</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'base_rates'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/index/<?php echo $customer_id ?>" title="Base Rates">
                <i class="entypo-briefcase"></i><span>Base Rates</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'invoices_options'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/edit_invoice_options/<?php echo $customer_id ?>" title="Invoices Options">
                <i class="entypo-briefcase"></i><span>Invoices Options</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'markups'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/markups/<?php echo $customer_id ?>" title="Invoices Options">
                <i class="entypo-briefcase"></i><span>Markups</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'collections'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/edit_collections/<?php echo $customer_id ?>" title="Collections">
                <i class="entypo-briefcase"></i><span>Collections</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'webships'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/webship_user_account/<?php echo $customer_id ?>" title="Webships">
                <i class="entypo-briefcase"></i><span>Webships</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'notes'): ?>active<?php endif; ?>" 
               href="<?php echo base_url(); ?>index.php/admin/comp_accounts/edit_notes/<?php echo $customer_id ?>" title="Notes">
                <i class="entypo-briefcase"></i><span>Notes</span>
            </a></li>
        <li><a class="<?php if ($active_sub_link == 'sales_reps_commission'): ?>active<?php endif; ?>" 
               href="javascript:void(0)" title="Sales Reps Commission">
                <i class="entypo-briefcase"></i><span>Sales Reps Commission</span>
            </a></li>
    <?php } else  { ?>
        <!--        <li><a class="<?php if ($active_sub_link == 'manage_contacts'): ?>active<?php endif; ?>" 
                       href="<?php echo base_url(); ?>index.php/admin/sales/" title="Manage Contacts">
                        <i class="entypo-briefcase"></i><span>Manage Contacts</span>
                    </a></li>
                <li><a class="<?php if ($active_sub_link == 'manage_customers'): ?>active<?php endif; ?>" 
                       href="<?php echo base_url(); ?>index.php/admin/comp_accounts/customer/" title="Manage Customers">
                        <i class="entypo-briefcase"></i><span>Manage Customers</span>
                    </a></li>-->
    <?php } ?>



</ul>