<?php 
function flex_block_columns($xs_cols, $sm_cols, $md_cols, $lg_cols) {
  $columns = array();
  array_push($columns, "col-xs-{$xs_cols}");
  array_push($columns, "col-sm-{$sm_cols}");
  array_push($columns, "col-md-{$md_cols}");
  array_push($columns, "col-lg-{$lg_cols}");

  return implode(' ', $columns);
}
