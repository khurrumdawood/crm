<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
            <td width = "10%">ID</td>
            <td width = "10%">Contact</td>
            <td width = "20%">address</td>
            <td width = "20%">Address2</td>
            <td width = "10%">City</td>
            <td width = "10%">STATE</td>
            <td width = "10%">Postsl Code</td>
            <td width = "10%">Country</td>
            <td width = "20%">Phone</td>
    </tr>

            <?php foreach($csvData as $field){?>
                <tr>
                    <td><?php echo $field['id']?></td>
                    <td><?php echo $field['contact_id']?></td>
                    <td><?php echo $field['address']?></td>
                    <td><?php echo $field['address2']?></td>
                    <td><?php echo $field['city']?></td>
                    <td><?php echo $field['state']?></td>
                    <td><?php echo $field['postal_code']?></td>
                    <td><?php echo $field['country']?></td>
                    <td><?php echo $field['phone']?></td>
                </tr>
            <?php }?>
</table>