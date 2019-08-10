<pre><?php
require_once __DIR__ . '/vendor/autoload.php';

$csv = new ParseCsv\Csv('export.csv');

$_data = array();

foreach($csv->data as $data){
    try {
        $date = new DateTime($data['created_at']);
    } catch (Exception $e) {
    }
    $week = $date->format("W");
    $year = $date->format("Y");

    $_data[$week]['week_no'] = $week;
    $_data[$week]['year'] = $year;

    if ($data['onboarding_perentage'] <= 100){
        $_data[$week]['step-1'] += 1;
    }

    if ($data['onboarding_perentage'] > 20 && $data['onboarding_perentage'] <= 100){
        $_data[$week]['step-2'] += 1;
    }

    if ($data['onboarding_perentage'] > 40 && $data['onboarding_perentage'] <= 100){
        $_data[$week]['step-3'] += 1;
    }

    if ($data['onboarding_perentage'] > 50 && $data['onboarding_perentage'] <= 100){
        $_data[$week]['step-4'] += 1;
    }

    if ($data['onboarding_perentage'] > 60 && $data['onboarding_perentage'] <= 100){
        $_data[$week]['step-5'] += 1;
    }

    if ($data['onboarding_perentage'] > 70 && $data['onboarding_perentage'] <= 100){
        $_data[$week]['step-6'] += 1;
    }

    if ($data['onboarding_perentage'] > 90 && $data['onboarding_perentage'] <= 100){
        $_data[$week]['step-7'] += 1;
    }

    if ($data['onboarding_perentage'] == 100){
        $_data[$week]['step-8'] += 1;
    }


}
    $_data = array_merge($_data);
    print_r($_data);
?>
</pre>
