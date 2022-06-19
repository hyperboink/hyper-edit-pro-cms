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
			<td>File Name</td>
			<td>Date Created</td>
			<td>Action</td>
		</tr>
		{pages}
			<tr>
				<td>{raw}</td>
				<td>{filename}</td>
				<td>{status}</td>
				<td>
					<a href="<?=base_url()?>pagesv2/delete/{id}">delete</a>
				</td>
			</tr>
		{/pages}
		
	</tbody>
</table>