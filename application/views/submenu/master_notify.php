<?php
if (!isset($active_sub_link)) {
    $active_sub_link = '';
}
?>
<ul id="menu"> 

    <li>
        <a class="<?php if ($active_sub_link == 'notification'): ?>active<?php endif; ?>" href="<?php echo base_url(); ?>index.php/admin/notifications/" title="Video Gallery">
            <i class="entypo-briefcase"></i><span>Notification</span>
        </a>
    </li>


</ul>