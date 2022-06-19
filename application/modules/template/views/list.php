<div class="form-top px-4 py-4 row">
    <div class="col-md-9 pl-0">
        <h3 class="mb-0"><i class="fa fa-file-o mr-2" aria-hidden="true"></i> Pages</h3>
    </div>


    <!-- <div class="col-md-3 text-right">
        <a class="btn btn-secondary" href="" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
    </div> -->
    
</div>

<div class="card-table-list card mb-4 rounded-0">
    <!-- <div class="card-header">
        <i class="fa fa-file-o mr-1"></i>
        Pages
    </div> -->
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
	                        <td><a href="<?=base_url()?>template/edit/<?=$page['id']?>"><?=$page['title']?></a></td>
	                        <td width="300"><span class="date"><?=$page['created_at']?></span></td>
                        <td width="10"><a href="<?=base_url()?>template/edit/<?=$page['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
	                    </tr>

                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>