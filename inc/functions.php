<?php
function get_item_html($id,$item) {
  $output = "<a href='" . $item["href"] . "'><div class='square bg' style='background-image: url(" . '../img/' . $item["img"] . "); background-position:" . $item["position"]. ";' aria-label='" . $item["aria-label"] . "'></div></a>";
  return $output;
}

