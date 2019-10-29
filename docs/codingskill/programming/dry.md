# Don't repeat yourself

## Don't return during loop

Bad code
```php
private function isEmptyDir($dir)
{
    $handle = opendir($dir);
    while (FALSE !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            closedir($handle);
            return FALSE;
        }
    }
    closedir($handle);
    return TRUE;
}
```
Good code
```php
private function isEmptyDir($dir)
{
    $result = TRUE;
    $handle = opendir($dir);
    while (FALSE !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $result = FALSE;
            break;
        }
    }
    closedir($handle);
    return $result;
}
```