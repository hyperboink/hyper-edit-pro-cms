<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Pages
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($pages as $page):?>

						<tr>
	                        <td><a href="<?=base_url()?>template/page/<?=$page['id']?>"><?=$page['title']?></a></td>
	                        <td width="300"><?=$page['created_at']?></td>
	                        <td width="10"><a href="<?=base_url()?>template/page/<?=$page['id']?>">Edit</a></td>
	                    </tr>

                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>