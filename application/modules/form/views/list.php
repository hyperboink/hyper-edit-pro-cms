<div class="form-top px-4 py-4 row">
    <div class="page-title col-md-9 pl-0">
        <h3 class="mb-0">
            <i class="fa fa-columns mr-2" aria-hidden="true"></i>
            <span class="page-title-text">Forms</span>
        </h3>
    </div>


    <div class="col-md-3 pr-0 text-right">
        <a href="<?=base_url()?>form/create" class="btn btn-info float-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span>Create</span>
        </a>
    </div>
</div>

<div class="card-table-list card mb-4 rounded-0" data-base-url="<?=base_url()?>">
    <!-- <div class="card-header">
        <div class="float-left mt-2">
            <i class="fa fa-columns" aria-hidden="true"></i>
            Forms
        </div>
        <a href="<?=base_url()?>form/create" class="btn btn-info float-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Create
        </a>
    </div> -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="text-right mb-2">
                
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Shortcode</th>
                        <th>Date Created</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Shortcode</th>
                        <th>Date Created</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if(isset($forms) && count($forms)):?>
                        <?php foreach($forms as $form):?>
    						<tr>
    	                        <td width="200"><a href="<?=base_url()?>form/edit/<?=$form['id']?>"><?=$form['name']?></a></td>
                                <td width="100">{<?=$form['shortcode']?>}</td>
    	                        <td width="140"><span class="date"><?=$form['created_at']?></span></td>
                                <td width="100" class="action text-center">
                                    <a href="<?=base_url()?>form/edit/<?=$form['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <span>|</span>
                                    <a class="text-danger" href="<?=base_url()?>form/delete/<?=$form['id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </td>
    	                    </tr>
                        <?php endforeach?>
                    <?php else:?>
                        <tr>
                            <td colspan="3">No Items</td>
                        </tr>
                    <?php endif?>
                </tbody>
            </table>
        </div>
    </div>
</div>