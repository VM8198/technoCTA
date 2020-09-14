<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Sector Listing
                </div>
                
				 <button type="submit" class="btn green download"><?php echo $this->Html->link('Download', array( 'controller' => 'sectors', 'action' => 'admin_sectorListExport')); ?> </button>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
                <div style="color:red;text-align: center;font-size: 18px;"><?php echo $this->Session->flash(); ?> </div>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>

                        <tr>
                            <th style="text-align:center" >S.No.</th>
                            <th style="text-align:center" >Sector Name</th>
                            <th style="text-align:center" colspan="2">Action</th>

                        </tr>

                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="9" class="rounded-foot-left"><em><?php echo $this->element('admin_paging_links'); ?></em></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sectorList as $result) {
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['Sector']['sector_name']; ?></td>
                                <td><a href="<?php echo $this->html->url(array('controller' => 'sectors', 'action' => 'admin_editSector', $result['Sector']['id'])) ?>"><?php echo $this->html->image('user_edit.png', array('title' => 'Edit')); ?></a></td>
                                <td> <?php
                                    echo $this->Html->link('<i class="glyphicon glyphicon-trash"></i>', array(
                                        'controller' => 'sectors',
                                        'action' => 'admin_deleteSector',
                                        $result['Sector']['id']
                                            ), array(
                                        'escape' => false,
                                        'alt' => 'delete',
                                        'title' => 'Delete',
                                        'confirm' => 'Are you sure?',
                                        'style' => 'color: #428bca;'
                                    ));
                                    ?>
                                </td>						   
                            </tr>
                            <?php $i++;
                        }
                        ?>

                    </tbody>
                </table>

            </div>                    
        </div>
    </div>
</div>
