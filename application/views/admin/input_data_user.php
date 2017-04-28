			<tr>
				<th colspan="2">Data Account</th>
			</tr>
			<tr>
				<td class="title"><label>ID User</label></td>
				<td><input type="text" name="txtIDUser" readonly="readonly" value="<?php echo $id_user;?>"/><?php echo form_error('txtIDUser');?></td>
			</tr>
			<tr>
				<td class="title"><label>Username</label></td>
				<td><input type="text" name="txtUsername" value="<?php if(!isset($msg))echo set_value('txtUsername')?>"/><?php echo form_error('txtUsername');?></td>
			</tr>
			<tr>
				<td class="title"><label>Password</label></td>
				<td><input type="password" name="txtPassword" value="<?php if(!isset($msg))echo set_value('txtUsername')?>"/><?php echo form_error('txtPassword');?></td>
			</tr>
			<tr>
				<td class="title"><label>Tipe</label></td>
				<td><input type="text" name="txtTipe" readonly="readonly" value="<?php echo $tipe;?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
			</tr>
		</table>
	</content>
</article>