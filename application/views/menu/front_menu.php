<?php 
    if(!isset($active_link))
    {
        $active_link='';
    }
?>
<ul class="sf-menu">
    <li class="<?php if ($active_link == 'ship'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>front/comp_accounts/add_customer">Ship</a>
    </li>
    
    <li class="<?php if ($active_link == 'address_book'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>front/address_bookid">Address Book</a>
    </li>
    
    <li class="<?php if ($active_link == 'history'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>front/shipment_history">History</a>
    </li>
    
    <li class="<?php if ($active_link == 'notify'): ?>active<?php endif; ?>">
        <a href="javascript:void(0)">Settings</a>
    </li>
    
    <li class="<?php if ($active_link == 'notify'): ?>active<?php endif; ?>">
        <a href="javascript:void(0)">Supplies</a>
    </li>
    
    <li class="<?php if ($active_link == 'notify'): ?>active<?php endif; ?>">
        <a href="javascript:void(0)">Invoices</a>
    </li>
    
    <li class="<?php if ($active_link == 'notify'): ?>active<?php endif; ?>">
        <a href="javascript:void(0)">Help</a>
    </li>
    <li class="<?php if ($active_link == 'logout'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url() ?>front/comp_accounts/logout">Logout</a>
    </li>
    
    <div class="clear"></div>
</ul>

