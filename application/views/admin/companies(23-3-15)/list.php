<section class="grid_12">
    <div class="box">
        <div class="title"><span class="icon16_sprite i_spreadsheet"></span>User</div>

        <div class="inside">
            </body>
            </html>	
<!--            <a href="<?php echo base_url(); ?>admin/user/Add" class="right button green">Add New User</a>-->
            <!--<a href="<?php echo base_url(); ?>index.php/admin/add_user" class="right button green">Add New User</a>-->
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Full name</th>
<!--                        <th>Phone</th>
                        <th>Birth date</th>-->
                        <th>Address</th>
                        <th>Zip</th>
                        <th >Image</th>
                        <th>Community</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($users)) {
                        foreach ($users as $user) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->firstname . ' ' . $user->lastname; ?></td>
<!--                                <td><?php echo $user->phone_num; ?></td>
                                <td><?php echo $user->dob; ?></td>-->
                                <td><?php echo $user->country; ?>,<?php echo $user->city; ?></td>
                        <!--        <td><?php //echo $user->city; ?></td>-->
                                <td><?php echo $user->zip; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>uploads/profile/<?php echo $user->profile_image; ?>" style="width: 100px; height: 100px;">
                                        <img  width="44px" height="44px" src="<?php echo base_url(); ?>uploads/profile/<?php echo $user->profile_image; ?>">
                                    </a>        </td>
                                <td><?php echo get_user_comunity_name($user->community_id); ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo date("jS M Y H:i:s", strtotime($user->created_at)); ?></td>
                                <td><?php
                                    echo
                                    ($user->updated_at != null) ?
                                            date("jS M Y H:i:s", strtotime($user->updated_at)) : '';
                                    ?></td>
                                <!--<td><?php echo $user->is_active; ?></td>-->
                                <td>
                                    <a class="status_activate" att_url="user" att_id="<?php echo $user->id; ?>" href="javascript:void(0)"><?php
                                        echo ($user->is_active == 1) ? 'Active' : 'Reactivate';
                                        ?></a>
                                </td>
                                <td>
                                    <!--<a href="<?php echo base_url(); ?>index.php/admin/update_shop/<?php echo $user->id; ?>">Edit</a> &nbsp; | &nbsp;--> 
        <!--                                    <a href="<?php echo base_url(); ?>admin/user/update/<?php echo $user->id; ?>">Edit</a> &nbsp; | &nbsp; -->
                                    <a href="<?php echo base_url(); ?>admin/user/delete/<?php echo $user->id; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a> 
                                    <!--<a href="<?php echo base_url(); ?>index.php/admin/delete_shop/<?php echo $user->id; ?>" onclick="return confirm('Are you sure you want to delete this user');">Delete</a> &nbsp; | &nbsp;--> 
                                </td>
                            </tr>

                        <?php }
                    } else {
                        ?>
                        <tr class="odd gradeX">
                            <td>record did not exist</td>
                            <?php
                        }
                        ?>


                </tbody>

            </table>