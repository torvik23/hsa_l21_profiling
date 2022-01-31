<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '-1');

require_once './vendor/autoload.php';

use App\Util\RandomNumberSetGenerator;
use Danon\IntervalTree\Interval\NumericInterval;
use Danon\IntervalTree\IntervalTree;

$datasetSize = (int) (explode('=', $argv[1] ?? null)[1] ?? 10);
$lowPoint = 1;
$highPoint = $datasetSize;
$numberSetGenerator = new RandomNumberSetGenerator($datasetSize);
$dataset = $numberSetGenerator->generateUnique();
$tree = new IntervalTree();
foreach ($dataset as $value) {
    $tree->insert(new NumericInterval($lowPoint, $highPoint), $value);
}
spx_profiler_start();
foreach ($dataset as $value) {
    $tree->remove(new NumericInterval($lowPoint, $highPoint), $value);
}
spx_profiler_stop();
unset($tree, $numberSetGenerator);
