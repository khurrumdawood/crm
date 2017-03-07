<ul class="sf-menu">
    <li class="<?php if ($active_link == 'dashboard'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a>
    </li>
    <li class="<?php if ($active_link == 'notify'): ?>active<?php endif; ?>">
        <a href="<?php echo base_url(); ?>index.php/admin/notifications">Notifications</a>
    </li>
    <li  class="<?php if ($active_link == 'companies'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/companies">Companies
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'zones'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/zones">Courier
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'zone_list'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/zone">Zones
<!--                                                    <span class="sf-sub-indicator"> »</span>-->
        </a>
    </li>
    <li  class="<?php if ($active_link == 'countries'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/meta_location">Countries
        </a>
    </li>
<li  class="<?php if ($active_link == 'note'): ?>active<?php endif; ?>">
        <a  href="<?php echo base_url(); ?>index.php/admin/note">Note
        </a>
    </li>
    <div class="clear"></div>
</ul>
