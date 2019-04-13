<?
/**
 * @param $arr
 */
function dump($arr)
{
    ?>
    <pre><?
    print_r($arr);
    ?></pre><?
}

/**
 * @param string $time - дата в формате 'гггг-дд-мм'
 * @return bool|string
 */
function dateNormalView($time)
{
    $daysDiff = date('d.m.Y') - date('d.m.Y', $time);
    if ($daysDiff == 0) {
        return 'сегодня ';
    } elseif ($daysDiff == 1) {
        return 'вчера ';
    } else return false;
}

?>