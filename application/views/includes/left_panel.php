	<?php 
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('progress_status', 'Complete');
    $query = $this->db->get('recipe')->num_rows();
    ?>
	<?php 
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('progress_status', 'Incomplete');
    $query1 = $this->db->get('recipe')->num_rows();
    ?>
	<?php 
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $query2 = $this->db->get('recipe')->num_rows();
    ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="recipe_header">Recipe Informations</td>
    </tr>
    <tr>
        <td>Completed Recipe (<a href="<?php echo base_url();?>index.php/site/completerecipe"><?php echo $query;?></a>)</td>
    </tr>
    <tr>
        <td>InComplete Recipe (<a href="<?php echo base_url();?>index.php/site/incompleterecipe"><?php echo $query1;?></a>)</td>
    </tr>
    <tr>
        <td>Total Recipe (<a href="<?php echo base_url();?>index.php/site/recipe"><?php echo $query2;?></a>)</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>