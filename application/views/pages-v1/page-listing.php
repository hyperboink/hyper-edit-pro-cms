<style>
	table{
		border-collapse: collapse;
	}
	td{
		padding: 10px;
	}
</style>


<table border="1">
	<tbody>
		<tr>
			<td>Title</td>
			<td>Slug</td>
			<td>Date Created</td>
			<td>Action</td>
		</tr>
		{pages}
			<tr>
				<td>{title}</td>
				<td>{slug}</td>
				<td>{created_at}</td>
				<td>
					<a href="<?=base_url()?>pagesv1/delete/{id}">delete</a>
				</td>
			</tr>
		{/pages}
		
	</tbody>
</table>