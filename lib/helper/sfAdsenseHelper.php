<?php 

function get_adsense_block($name)
{
  if ($options = sfConfig::get('app_adsense_'.$name))
  {
    return get_js_adsense($options);
  }
  
  if (sfConfig::get('app_adsense_fail_silently'))
  {
    return '';
  }
  else 
  {
    throw new sfException(sprintf('There is no "%s" adsense block', $name));  
  }
  
}

function is_string_option($option, $name)
{
  return !is_numeric($option) || in_array($name, array('slot'));
}

function get_js_adsense($options, $script = 'http://pagead2.googlesyndication.com/pagead/show_ads.js')
{
  $js_adsense = <<<EOF
<script type="text/javascript">
<!--

EOF;

  foreach ($options as $name => $option) 
  {
    $js_adsense .= '  google_ad_'.$name.' = ';
    $js_adsense .= is_string_option($option, $name)?'"'.$option.'"':$option;
    $js_adsense .= ";\n";
    
  }
  
  $js_adsense .= <<<EOF
//-->
</script>

<script type="text/javascript" src="$script"></script>
EOF;

  return $js_adsense;
}

function include_adsense_block($name)
{
  echo get_adsense_block($name);
}
