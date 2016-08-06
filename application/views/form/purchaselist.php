<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>
    Purchase
  </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header"><h3 class="box-title">Purchase</h3></div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="biro" class="col-xs-4 control-label">Periode</label>
                  <div class="col-xs-4">
                    <input type="hidden" id="param" value="purchase/index">
                    <select class="form-control" onchange="periode()" id="bulan" name="bulan">
                    <?php foreach ($bulan as $key => $value){ ?>
                      <option <?php echo ($param['bulan'] == ($key+1)) ? 'selected="selected"' : '' ; ?> value="<?php echo ($key+1); ?>"><?php echo $value; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select class="form-control" onchange="periode()" id="tahun" name="tahun">
                    <?php foreach ($tahun as $key => $value){ ?>
                      <option <?php echo ($param['tahun'] == $value['tahun']) ? 'selected="selected"' : '' ; ?> value="<?php echo $value['tahun']; ?>"><?php echo $value['tahun']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-body table-responsive" style="padding: 25px;">
              <table border="0" class="list1 table table-hover table-striped">
                <thead>
                  <tr>
                    <th class="text-center" width="5%">#</th>
                    <th class="text-center" width="15%">Tanggal</th>
                    <th class="text-center" width="%">Nama Purchase</th>
                    <th class="text-center" width="%">Biro</th>
                    <th class="text-center" width="%">Refrensi</th>
                    <th class="text-center" width="%">Status</th>
                    <th class="text-center" width="%">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list as $key => $value){ ?>
                  <tr class="">
                    <td class=""><?php echo ($key+1); ?></td>
                    <td class="text-center"><?php echo date("d F Y",strtotime($value['tanggal'])); ?></td>
                    <td class=""><?php echo $value['purchasing']; ?></td>
                    <td class=""><?php echo $value['biro']; ?></td>
                    <td class="text-center"><?php echo $value['ref']; ?></td>
                    <td class="text-center" id="<?php echo $value['id'] ?>ntb">
                      <?php if($value['status'] == 0){ ?>
                      <button class="ntb btn btn-circle btn-danger" id="ntb<?php echo $value['id'] ?>" onclick="status(<?php echo $value['id'] ?>);">Belum Dianggarkan</button>
                      <?php } else { echo 'Sudah Dianggarkan' ; } ?>
                    </td>
                    <td class="text-left">
                      <div class="btn-group">
                        <div class="btn-group">
                          <button aria-expanded="false" type="button" title="Report" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <?php foreach ($link as $key => $val) { ?>
                              <li><a class="text-left" onclick="window.location='<?php echo base_url().'report/'.$val[1].'/'.$value['id']; ?>'"><i class="fa fa-file"></i>&nbsp;<?php echo $val[0]; ?></a></li>
                            <?php
                              if ($key == 1 && $value['type'] == 1) {
                                break;
                              }
                              if ($key == $value['level']) {
                                break;
                              }
                            } ?>
                          </ul>
                        </div>
                      </div>
                      <?php if(empty($id)){
                        if($value['status'] == 0 && empty($value['ket'])){ ?>
                      <button type="button" class="btn btn-xs btn-info btn-circle" title="Harga Baru" onclick="window.location='<?php echo base_url().'purchase/form/'.$value['id']; ?>'" id="edit<?php echo $value['id'];?>"><i class="fa fa-pencil-square-o"></i></button>
                      <?php }} ?>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        <!-- /.box-body -->
          <div class="box-footer">
            <div class="box-footer text-right">
              <button type="button" onclick="window.location='<?php echo base_url(); ?>purchase/form'" class="btn btn-success btn-circle" title="Tambah Data"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      <!-- /.box -->
      </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->