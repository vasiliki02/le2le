<?php

$des = '<p><img align="absmiddle" src="http://img02.taobaocdn.com/imgextra/i2/1809177149/TB2d56VaFXXXXbGXXXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img03.taobaocdn.com/imgextra/i3/1809177149/TB2Rib1aFXXXXXjXXXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img02.taobaocdn.com/imgextra/i2/1809177149/TB2LLrZaFXXXXaEXXXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img02.taobaocdn.com/imgextra/i2/1809177149/TB2Nw_SaFXXXXXHXpXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img04.taobaocdn.com/imgextra/i4/1809177149/TB2SuDUaFXXXXcRXXXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img02.taobaocdn.com/imgextra/i2/1809177149/TB2A9rZaFXXXXaBXXXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img02.taobaocdn.com/imgextra/i2/1809177149/TB2v5nOaFXXXXbwXXXXXXXXXXXX_!!1809177149.gif"><img align="absmiddle" src="http://img03.taobaocdn.com/imgextra/i3/1809177149/TB2QiHRaFXXXXacXpXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img01.taobaocdn.com/imgextra/i1/1809177149/TB2WsTSaFXXXXXPXpXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img01.taobaocdn.com/imgextra/i1/1809177149/TB2jc_SaFXXXXX4XpXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img01.taobaocdn.com/imgextra/i1/1809177149/TB2ZuL1aFXXXXXxXXXXXXXXXXXX-1809177149.jpg"><img align="absmiddle" src="http://img02.taobaocdn.com/imgextra/i2/1809177149/TB2UofUaFXXXXbWXXXXXXXXXXXX-1809177149.jpg"></p>';
preg_replace_callback('/src="(.*?)"/is', 'des_img_replace_callback' , $des);

print_r($des);

function des_img_replace_callback($matches)
{
    return 1;
}