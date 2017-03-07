<ul class="sf-menu">
    <li class="<?php if ($active_link == 'dashboard'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
    <li class="<?php if ($active_link == 'sales'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/sales">CRM</a>
    </li>
    <li  class="<?php if ($active_link == 'comp_accounts'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/comp_accounts/customer">Accounts
        </a>
    </li>
<!--    <li  class="<?php if ($active_link == 'accounts'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/accounts">Accounts
                                                    <span class="sf-sub-indicator"> »</span>
        </a>
    </li>-->
    <li  class="<?php if ($active_link == 'user'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Invoice
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'user'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Receivables
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'user'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Payables
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'note'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/note">Note
        </a>
    </li>
    <li  class="<?php if ($active_link == 'user'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Reports
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'user'): ?>active<?php endif; ?>">
        <a  href="javascript:void(0)">Admin
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <div class="clear"></div>
</ul>

