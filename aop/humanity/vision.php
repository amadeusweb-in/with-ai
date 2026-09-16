<?php
$sheet = getSheet(__DIR__ . '/data/vision.tsv', 'sequence');
$format = htmlUX::keyOf(htmlUX::artHAuto2) .
	'<h3>%heading%</h3>
<h4 class="h6">%subheading%</h4>
<img src="%site-base%%mainSite%%section%/%nodeSlug%/%nodeItem%/assets/stages/%sno%.png" class="img-fluid" /> JUSTBR<hr />
&bull; %item1% JUSTBR
&bull; %item2% JUSTBR
&bull; %item3% JUSTBR<hr />
%below% JUSTBR<hr />
eg: %example%'
	. htmlUX::keyOf(htmlUX::artClose);

$result = [tagUX::h2Plain('VISION of ' . humanize('aop'), cssUX::CenterContainer),
	htmlUX::keyOf(htmlUX::artAllHAuto)];

foreach ($sheet->group as $sno => $items) {
	$vars = ['sno' => $sno];
	foreach ($items as $item)
		$vars[$sheet->getValue($item, 'key')] = $sheet->getValue($item, 'text');

	$result[] = replaceItems($format, $vars, WRAPREPLACE);
}

$result[] = htmlUX::keyOf(htmlUX::artAllClose);
$result[] = cbCloseAndOpen();
$result[] = getCodeSnippet('principles');

$result[] = '<img src="%site-base%%mainSite%%section%/%nodeSlug%/%nodeItem%/assets/dawn-footer.jpg" class="img-fluid" />';

echo replaceHtml(htmlUX::replaceAll(implode(NEWLINE, $result)));

/*
Footer	DAWN	1	A BRIGHTER HUMANITY
Footer	Tagline	1	Different people. Shared values. A brighter future.
Footer	Common Planet	1	Real People. Lasting Change.
Footer	Closing	1	Together we can.
Footer	Core progression	1	Better people → Stronger communities → A kinder, more peaceful planet
*/
